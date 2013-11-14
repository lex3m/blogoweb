<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="post">
    <div class="title">
        <?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
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
        <b>Теги:</b>
        <?php echo implode(', ', $data->tagLinks); ?>
        <br/>
        <?php echo CHtml::link('Просмотреть', $data->url); ?> |
        <?php echo CHtml::link("Комментарии ({$data->commentCount})",$data->url.'#comments'); ?> |
        Последнее обновление <?php echo date('d/m/Y в H:i', $data->update_time); ?>
    </div>
</div>
