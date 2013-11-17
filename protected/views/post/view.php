<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Записи'=>array('index'),
	$model->title,
);
$this->pageTitle=$model->title;

$this->menu=array(
	array('label'=>'Список Записей', 'url'=>array('index')),
	array('label'=>'Создание Записи', 'url'=>array('create')),
	array('label'=>'Обновление Записей', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление Записей', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены что хочете удалить эту запись?')),
	array('label'=>'Управление Записями', 'url'=>array('admin')),
);
?>

<h1>Просмотр Записи #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_view', array(
    'data'=>$model,
)); ?>

<div id="comments">
    <?php if($model->commentCount>=1): ?>
        <h3>
            <?php echo $model->commentCount > 1 ? $model->commentCount . ' комментарии (-ев)' : ' Один комментарий'; ?>
        </h3>

        <?php $this->renderPartial('_comments',array(
            'post'=>$model,
            'comments'=>$model->comments,
        )); ?>
    <?php endif; ?>

    <h3>Оставьте комментарий</h3>

    <?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php else: ?>
        <?php $this->renderPartial('/comment/_form',array(
            'model'=>$comment,
        )); ?>
    <?php endif; ?>

</div><!-- comments -->