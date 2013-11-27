<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Комментарии',
);

$this->menu=array(
	array('label'=>'Управление Комментариями', 'url'=>array('admin')),
);
?>

<h1>Комментарии</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
