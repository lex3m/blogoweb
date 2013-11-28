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
<!--    <input type="button" id="setCookie" value="set cookie">-->
<!--    <input type="button" id="getCookie" value="get cookie">-->
<!--    <input type="button" id="deleteCookie" value="delete cookie">-->
<?php if(!empty($_GET['tag'])): ?>
    <h1>Записи с тегом <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php if(!empty($_GET['category_id'])): ?>
    <h1>Категория <i><?php echo Category::getCategoryById($_GET['category_id']); ?></i></h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}",
)); ?>