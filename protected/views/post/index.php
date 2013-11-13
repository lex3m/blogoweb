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

<h1>Записи</h1>

<?php if(!empty($_GET['tag'])): ?>
    <h1>Записи с тегом <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}",
)); ?>