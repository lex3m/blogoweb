<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Категории'=>array('index'),
	'Управление',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление категориями</h1>

<?php echo CHtml::link(CHtml::button('Создать категорию'), array('create')); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id',
            'type'=>'raw',
            'filter'=>false,
        ),
		'name',
		'description',
        array(            // display 'author.username' using an expression
            'name'=>'parent_cat_id',
            'value'=>'Category::getCategoryById($data->parent_cat_id)',
            'filter'=>false,
        ),
        array(
            'class'=>'CButtonColumn',
            'template' => '{update} {delete}'
        ),
	),
)); ?>
