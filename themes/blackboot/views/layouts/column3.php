<?php ///* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php
Yii::app()->clientscript
    ->registerCssFile( Yii::app()->request->baseUrl . '/css/dcaccordion.css' )
    ->registerCssFile( Yii::app()->request->baseUrl . '/css/skins/graphite.css' )
    ->registerScriptFile( Yii::app()->request->baseUrl . '/js/jquery.cookie.js' )
    ->registerScriptFile( Yii::app()->request->baseUrl . '/js/jquery.hoverIntent.minified.js' )
    ->registerScriptFile( Yii::app()->request->baseUrl . '/js/jquery.dcjqaccordion.2.7.min.js' );

Yii::app()->clientScript->registerScript('left-menu', "
    $('#left-menu').dcAccordion({
        eventType: 'click',
        autoClose: true,
        saveState: false,
        disableLink: true,
        showCount: false,
        menuClose: true,
        speed: 'fast'
    });
    ", CClientScript::POS_READY);
?>

<div class="span2" id="left-align">
    <div id="sidebar">
        <div class="graphite">
            <?php Category::getMenu(0,0); ?>
        </div>
    </div>
</div>

<div class="span7">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>

<div class="span3">
	<div id="sidebar">
        <?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
        <?php if($this->beginCache('tagCloud', array('duration'=>3600))) {?>
            <?php $this->widget('TagCloud', array('maxTags'=>Yii::app()->params['tagCloudCount']));?>
        <?php $this->endCache(); } ?>
        <?php $this->widget('RecentComments', array('maxComments'=>Yii::app()->params['recentCommentCount']));?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>