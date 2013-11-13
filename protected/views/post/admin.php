<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Записи'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список Записей', 'url'=>array('index')),
	array('label'=>'Создание Записи', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#post-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление Записями</h1>

<p>
Можно использовать оператор сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале каждой строки запроса для уточнения параметоров запроса.
</p>

<?php echo CHtml::link('Расширеный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'content',
		'tags',
		'status',
		'create_time',
		/*
		'update_time',
		'author_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
