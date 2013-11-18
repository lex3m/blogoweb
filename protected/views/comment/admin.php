<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список Комментариев', 'url'=>array('index')),
);

?>

<h1>Управление Комментариями</h1>

<p>
    Можно использовать оператор сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    или <b>=</b>) в начале каждой строки запроса для уточнения параметоров запроса.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'columns'=>array(
        array(
            'name'=>'id',
            'type'=>'raw',
            'filter'=>false,
        ),
        array(
            'name'=>'content',
            'type'=>'raw',
            'value'=>'CHtml::encode(substr($data->content, 0, 50))'
        ),
        array(
            'name'=>'status',
            'value'=>'Lookup::item("CommentStatus",$data->status)',
            'filter'=>Lookup::items('CommentStatus'),
        ),
        array(
            'name'=>'author',
            'type'=>'raw',
        ),
        array(            // display 'author.username' using an expression
            'name'=>'post_id',
            'value'=>'$data->post->title',
            'filter'=>false,
        ),
        array(            // display 'author.username' using an expression
            'name'=>'category_id',
            'value'=>'$data->post->category->name',
            'filter'=>false,
        ),
        array(
            'name'=>'create_time',
            'value'=>'date("d/m/Y в H:i", $data->create_time)',
            'filter'=>false,
        ),
        array(
            'class'=>'CButtonColumn',
            'template' => '{update} {delete}',
        ),
	),
)); ?>
