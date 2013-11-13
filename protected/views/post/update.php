<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Записи'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Обновление',
);

$this->menu=array(
	array('label'=>'Список Записей', 'url'=>array('index')),
	array('label'=>'Создание Записи', 'url'=>array('create')),
	array('label'=>'Просмотр Записей', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление Записями', 'url'=>array('admin')),
);
?>

<h1>Update Post <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>