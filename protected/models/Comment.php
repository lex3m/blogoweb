<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property integer $create_time
 * @property string $author
 * @property string $email
 * @property string $url
 * @property integer $post_id
 *
 * The followings are the available model relations:
 * @property Post $post
 */
class Comment extends CActiveRecord
{
    const STATUS_PENDING = 1;
    const STATUS_APPROVED = 2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, author, email', 'required'),
			array('author, email, url', 'length', 'max'=>128),
            array('email', 'email'),
            array('url','url'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, content, status, create_time, author, email, url, post_id', 'safe', 'on'=>'search'),
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
			'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Комментарий',
			'status' => 'Статус',
			'create_time' => 'Дата создания',
			'author' => 'Автор',
			'email' => 'E-mail',
			'url' => 'Веб-сайт',
			'post_id' => 'Запись',
            'category_id' => 'Категория',
		);
	}

    /**
     * @return bool
     */
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
                $this->create_time=time();
            return true;
        }
        else
            return false;
    }

    /**
     * @param Post the post that this comment belongs to. If null, the method
     * will query for the post.
     * @return string the permalink URL for this comment
     */
    public function getUrl($post=null)
    {
        if($post===null)
            $post=$this->post;
        return $post->url.'#c'.$this->id;
    }

    /**
     * @return string the hyperlink display for the current comment's author
     */
    public function getAuthorLink()
    {
        if(!empty($this->url))
            return CHtml::link(CHtml::encode($this->author),$this->url);
        else
            return CHtml::encode($this->author);
    }

    public function approve()
    {
        $this->status = self::STATUS_APPROVED;
        $this->update(array('status'));
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

		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('author',$this->author,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>Yii::app()->params['onPage'],
            ),
		));
	}

    /**
     * @return integer the number of comments that are pending approval
     */
    public function getPendingCommentCount()
    {
        return $this->count('status='.self::STATUS_PENDING);
    }

    /**
     *
     */
    public function findRecentComments($limit=10)
    {
        return $this->with('post')->findAll(
            array(
                'condition'=>'t.status='.self::STATUS_APPROVED,
                'order'=>'t.create_time DESC',
                'limit'=>intval($limit),
            )
        );
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
