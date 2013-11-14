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
			'name' => 'Name',
			'description' => 'Description',
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
			'criteria'=>$criteria,
		));
	}

    /**
     * @param $level
     * @return string
     */
    private function _makeNbsp($level)
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
     * @param $tag
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
        /*
        $connection = Yii::app()->db;

        $sql = "SELECT id,name FROM tbl_category WHERE parent_cat_id=".intval($parentID)." ORDER BY name";

        $command = $connection->createCommand($sql);

        $dataReader = $command->query();

        while (($row = $dataReader->read()) !== false) {
            $id = $row["id"];
            $lvl++;
            echo "<".$tag." value=".$row['id'].">". self::_makeNbsp($lvl) . $row["name"] . "</".$tag.">";
            self::showTree($id, $lvl, $tag);
            $lvl--;
        }
        */
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
