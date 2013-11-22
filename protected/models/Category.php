<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $parent_cat_id
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('name', 'length', 'max'=>128),
			array('description', 'length', 'max'=>256),
            array('parent_cat_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description', 'safe', 'on'=>'search'),
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
            'categories' => array(self::BELONGS_TO, 'Category', 'parent_cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Категория',
            'description' => 'Описание',
            'parent_cat_id' => 'Родительская категория',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
            'pagination'=>array(
                'pageSize'=>20,
            ),
			'criteria'=>$criteria,
		));
	}

    /**
     * @param $level
     * @return string
     */
    private static function _makeNbsp($level)
    {
        $str = '';
        for ($i = 0; $i < $level; $i++)
        {
            $str .= ' - ';
        }

        return $str;
    }

    private static $_items = array();

    /**
     * @param $parentID
     * @param $lvl
     */
    private static function makeTree($parentID, $lvl)
    {

        $categories = self::model()->findAll(
            array(
                'condition'=>'parent_cat_id=:parentID',
                'params'=>array(':parentID'=>$parentID),
                'order'=>'name',
            )
        );

        foreach ($categories as $category) {
            $id = $category->id;
            $lvl++;
            self::$_items[$category->id] = self::_makeNbsp($lvl) . $category->name;
            // echo "<option value=".$id.">". self::_makeNbsp($lvl) . $category->name . "</option>";
            self::makeTree($id, $lvl);
            $lvl--;
        }
    }

    /**
     * @return array
     */
    public static function getTree()
    {
        if (empty(self::$_items))
             self::makeTree(0, 0);

        return self::$_items;
    }

    /**
     * @param $parentId
     * @param $lvl
     */
    private static function deleteTree($parentId, $lvl)
    {
        $categories = self::model()->findAll(
            array(
                'condition'=>'parent_cat_id=:parentID',
                'params'=>array(':parentID'=>$parentId),
            )
        );
        foreach($categories as $category) {
            $lvl++;
            $category->delete();
            Post::model()->deleteAll('category_id='.$category->id);
            self::deleteTree($category->id, $lvl);
            $lvl--;
        }
    }


    public static function getMenu($pid, $level)
    {

        $categories = self::model()->findAll(
            array(
                'condition'=>'parent_cat_id=:parentID',
                'params'=>array(':parentID'=>$pid),
                'order'=>'name',
            )
        );
        if ($level == 0)
            echo "<ul id='left-menu'>";
        else
            echo "<ul>";
        foreach ($categories as $category) {
            $level++;
            $id = $category->id;
            echo "<li>";
            echo CHtml::link($category->name, Yii::app()->createUrl('post/index', array(
                'category_id' => $category->id,
                'name' => $category->name,
            )));
            self::getMenu($id, $level);
            $level--;
        }
        echo "</ul>";

    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return Yii::app()->createUrl('post/index', array(
            'category_id' => $this->id,
        ));
    }

    /**
     * @param $id
     * @return category name or null if category is base
     */
    public static function getCategoryById($id)
    {
        $category = self::model()->findByPk($id);
        if($category===null)
            return null;
        return $category->name;

    }

    /**
     * Function working after parent Delete
     */
    protected function afterDelete()
    {
        parent::afterDelete();

        //delete all subcategories
        self::model()->deleteTree($this->id, 0);

    }

    /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
