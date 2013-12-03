<?php
/* @var $this PostController */
/* @var $data Post */
?>
<?php
Yii::app()->clientscript
    ->registerCssFile( Yii::app()->request->baseUrl . '/css/social-likes.css' )
    ->registerScriptFile( Yii::app()->request->baseUrl . '/js/social-likes.min.js' );
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
    <?php if (Yii::app()->controller->action->id !== 'index'): ?>
        <ul class="social-likes">
            <li class="facebook" title="Поделиться ссылкой на Фейсбуке">Facebook</li>
            <li class="twitter" title="Поделиться ссылкой в Твиттере">Twitter</li>
            <li class="vkontakte" title="Поделиться ссылкой во Вконтакте">Вконтакте</li>
            <li class="plusone" title="Поделиться ссылкой в Гугл-плюсе">Google+</li>
        </ul>
    <? endif; ?>
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

        <?php if (Yii::app()->controller->action->id == 'index'): ?>
            <div class="post-footer">
                <?php echo CHtml::link('Читать далее <i class="icon-arrow-right"></i>',  $data->url)?>
            </div>
        <?php else: ?>
            <?php
            Yii::app()->clientScript->registerScript('social', "
                (function() {
                    if (window.pluso)if (typeof window.pluso.start == 'function') return;
                    if (window.ifpluso==undefined) { window.ifpluso = 1;
                        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                        s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                        s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                        var h=d[g]('body')[0];
                        h.appendChild(s);
                    }})();
            ", CClientScript::POS_READY);

            Yii::app()->clientScript->registerCss(1,"
              .pluso {
                z-index: 0 !important;
              }
              .pluso-more{
                visibility: hidden;
              }
            ");
            ?>
            <div class="pluso" data-background="transparent" data-options="big,square,line,horizontal,nocounter,theme=06" data-services="vkontakte,odnoklassniki,facebook,twitter,google"></div>
        <?php endif; ?>

</div>

