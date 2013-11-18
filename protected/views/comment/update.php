<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	'Редактирование комментария №'.$model->id,
);

$this->menu=array(
	array('label'=>'Список Комментариев', 'url'=>array('index')),
	array('label'=>'Управление Комментариями', 'url'=>array('admin')),
);
?>

<h1>Редактирование комментария №<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>