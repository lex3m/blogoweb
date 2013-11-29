<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="post entry-wrapper">
    <div class="post-meta clearfix">
        <div class="tale-box">&nbsp;</div>
        <div class="post-date">
            <?php echo date('d/m/Y', $data->update_time); ?>
        </div>
        <div class="post-tag" id="line">
            <span>Теги: </span>  <?php echo implode(', ', $data->tagLinks); ?>
        </div>
        <div class="post-category" id="line">
            <span>Категория: </span>
           <?php echo CHtml::link($data->category->name, Yii::app()->createUrl('post/index', array(
               'category_id' => $data->category->id,
               'name' => $data->category->name,
           ))); ?>
        </div>
    </div>
    <div class="post-teaser clearfix">
        <?php echo (Yii::app()->controller->action->id == 'index') ? CHtml::openTag('h1').CHtml::link(CHtml::encode($data->title), $data->url).CHtml::closeTag('h1')
                : CHtml::openTag('h2', array('style'=>'margin-bottom: 0.1em;')).CHtml::encode($data->title).CHtml::closeTag('h2');?>
<!--        <p><img style="float: left;" title="Несколько изображений к одной записи" src="http://belyakov.su/uploads/1_M_images/form1_1.jpg" alt="Несколько изображений к одной записи" width="300" height="353"></p>-->
        <p> <?php
            if (Yii::app()->controller->action->id == 'index')
                echo Post::model()->trimPost($data->content, 500);
            else
                echo $data->content;
            ?>
        </p>
    </div>
    <div class="post-footer">
        <?php echo (Yii::app()->controller->action->id == 'index') ? CHtml::link('Читать далее <i class="icon-arrow-right"></i>',  $data->url) : ""; ?>
    </div>
</div>

