<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $author_id
 * @property integer $category_id
 * @property string $seo_url
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property User $author
 */
class Post extends MyActiveRecord
{
    const STATUS_DRAFT = 1;
    const STATUS_PUBLISHED = 2;
    const STATUS_ARCHIVED = 3;

    private $_oldTags;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, status, category_id', 'required'),
			array('title, seo_url', 'length', 'max'=>128,
                'message'=>'Длина заголовка не должна превышать 128 символов.'),
            array('status', 'in', 'range'=>array(1,2,3),
                'message'=>'Статус должен быть в диапазоне от 1 до 3.'),
            array('tags', 'match', 'pattern'=>'/^[\p{L}\s,]+$/u',
                'message'=>'В тегах можно использовать только буквы и знак разделения тегов ,'),
            array('tags', 'normalizeTags'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('title, status', 'safe', 'on'=>'search'),
            array('seo_url','unsafe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'comments' => array(self::HAS_MANY, 'Comment', 'post_id',
                'condition' => 'comments.status='.Comment::STATUS_APPROVED,
                'order' => 'comments.create_time DESC'
            ),
            'commentCount' => array(self::STAT, 'Comment', 'post_id', 'condition'=>'status='.Comment::STATUS_APPROVED),
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
            'categoryCount' => array(self::STAT, 'Category', 'category_id'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок',
			'content' => 'Содержимое',
			'tags' => 'Теги',
			'status' => 'Статус',
			'create_time' => 'Дата создания',
			'update_time' => 'Дата обновления',
			'author_id' => 'Автор',
            'category_id' => 'Категория',
            'seo_url' => 'URL',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('author_id',$this->author_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>Yii::app()->params['onPage'],
            ),
		));
	}

    /**
     * @param $attribute
     * @param $params
     * @return normalize tags without spaces
     */
    public function normalizeTags($attribute, $params)
    {
        $this->tags = Tag::array2string(array_unique(Tag::string2array($this->tags)));
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return Yii::app()->createUrl('post/view', array(
           'id' => $this->id,
           'seo_url' => $this->seo_url,
        ));
    }

    /**
     * @return array a list of links that point to the post list filtered by every tag of this post
     */
    public function getTagLinks()
    {
        $links=array();
        foreach(Tag::string2array($this->tags) as $tag)
            $links[]=CHtml::link(CHtml::encode($tag), array('post/index', 'tag'=>$tag));
        return $links;
    }

    /**
     * @return bool
     */
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
            {
                $this->create_time=$this->update_time=time();
                $this->author_id=Yii::app()->user->id;
                $this->seo_url = $this->translit($this->title);
            }
            else
                $this->update_time=time();
            return true;
        }
        else
            return false;
    }

    /**
     * Update tags frequency
     */
    protected function afterSave()
    {
        parent::afterSave();
        Tag::model()->updateFrequency($this->_oldTags, $this->tags);
    }


    /**
     * This is invoked after loaded result
     */
    protected function afterFind()
    {
        parent::afterFind();
        $this->_oldTags = $this->tags;
    }

    /**
     * @return Db connection type or false if it is undefined
     */
    private function getDbConnectionType()
    {
        $str = Yii::app()->db->connectionString;
        $arr = explode(':', $str);
        if (!empty($arr))
            return $arr[0];
        else
            return false;
    }

    /**
     * This is invoked after the record is deleted.
     */
    protected function afterDelete()
    {
        parent::afterDelete();
        if (!$this->getDbConnectionType() ||
            $this->getDbConnectionType() != 'mysql' ||
            $this->getDbConnectionType() != 'pgsql') {
                Comment::model()->deleteAll('post_id='.$this->id);
        }
        Tag::model()->updateFrequency($this->tags, '');
    }

    /**
     * @param $comment
     * @return comment saved object
     */
    public function addComment($comment)
    {
        if(Yii::app()->params['commentNeedApproval'])
            $comment->status=Comment::STATUS_PENDING;
        else
            $comment->status=Comment::STATUS_APPROVED;
        $comment->post_id=$this->id;
        return $comment->save();
    }

    /**
     * trims text to a space then adds ellipses if desired
     * @param string $input text to trim
     * @param int $length in characters to trim to
     * @param bool $ellipses if ellipses (...) are to be added
     * @param bool $strip_html if html tags are to be stripped
     * @return string
     */
    function trimPost($input, $length, $ellipses = true, $strip_html = true) {
        //strip tags, if desired
        if ($strip_html) {
            $input = strip_tags($input);
        }

        //no need to trim, already shorter than trim length
        if (strlen($input) <= $length) {
            return $input;
        }

        //find last space within length
        $last_space = strrpos(substr($input, 0, $length), ' ');
        $trimmed_text = substr($input, 0, $last_space);

        //add ellipses (...)
        if ($ellipses) {
            $trimmed_text .= '...';
        }

        return $trimmed_text;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
