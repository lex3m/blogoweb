<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Записи'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список Записей', 'url'=>array('index')),
	array('label'=>'Управление Записями', 'url'=>array('admin')),
);
?>

<h1>Создать Запись</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>