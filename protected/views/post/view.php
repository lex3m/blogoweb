<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Записи'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список Записей', 'url'=>array('index')),
	array('label'=>'Создание Записи', 'url'=>array('create')),
	array('label'=>'Обновление Записей', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление Записей', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены что хочете удалить эту запись?')),
	array('label'=>'Управление Записями', 'url'=>array('admin')),
);
?>

<h1>View Post #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'tags',
		'status',
		'create_time',
		'update_time',
		'author_id',
	),
)); ?>
