<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Записи',
//);
//
//$this->menu=array(
//	array('label'=>'Создание Записи', 'url'=>array('create')),
//	array('label'=>'Управление Записями', 'url'=>array('admin')),
//);

?>

<?php if(!empty($_GET['tag'])): ?>
    <h1 id="catHead">Записи с тегом <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php if(!empty($_GET['category_id'])): ?>
    <h1 id="catHead">Категория <i><?php echo Category::getCategoryById($_GET['category_id']); ?></i></h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}",
)); ?>