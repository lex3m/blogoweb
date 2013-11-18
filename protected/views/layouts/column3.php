<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 first">
    <?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
</div>
<div class="span-14">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
        if(!Yii::app()->user->isGuest) {
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Операции',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>array(
                    array('label'=>'Список Записей', 'url'=>array('index')),
                ),
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
        }
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>