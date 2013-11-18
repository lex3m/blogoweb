<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="post">
    <div class="title">

        <?php echo (Yii::app()->controller->action->id == 'index') ? CHtml::link(CHtml::encode($data->title), $data->url)
                    : CHtml::openTag('h2', array('style'=>'margin-bottom: 0.1em;')).CHtml::encode($data->title);?>
    </div>
    <div class="author">
       разместил <?php echo $data->author->username .' '. date('d/m/Y в H:i', $data->create_time); ?>
    </div>
    <div class="content">
        <?php
        $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
        echo $data->content;
        $this->endWidget();
        ?>
    </div>
    <div class="nav">
        <b>Категория:</b>
        <?php echo CHtml::link($data->category->name, $data->category->url); ?>
        <br/>
        <b>Теги:</b>
        <?php echo implode(', ', $data->tagLinks); ?>
        <br/>
        <?php  echo (Yii::app()->controller->action->id == 'index') ? CHtml::link('Просмотреть', $data->url)
                     : CHtml::link('Написать комментарий', $data->url.'#comment-form') ?> |
        <?php echo CHtml::link("Комментарии ({$data->commentCount})",$data->url.'#comments'); ?> |
        Последнее обновление <?php echo date('d/m/Y в H:i', $data->update_time); ?>
    </div>
</div>
