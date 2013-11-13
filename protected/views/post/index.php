<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Записи',
);

$this->menu=array(
	array('label'=>'Создание Записи', 'url'=>array('create')),
	array('label'=>'Управление Записями', 'url'=>array('admin')),
);
?>

<h1>Posts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
