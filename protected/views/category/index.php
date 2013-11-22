<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Категории',
);

?>

<h1>Категории</h1>

<?php echo CHtml::link(CHtml::button('Создать категорию'), array('create')); ?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
