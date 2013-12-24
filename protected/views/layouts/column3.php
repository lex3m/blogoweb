<?php ///* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<!--    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
<!--    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/dcaccordion.css" rel="stylesheet" type="text/css" />
        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookie.js'></script>
        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.hoverIntent.minified.js'></script>
        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dcjqaccordion.2.7.min.js'></script>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/skins/grey.css" rel="stylesheet" type="text/css">
<script>
    $(document).ready(function($) {
        $('#left-menu').dcAccordion({
            eventType: 'click',
            autoClose: true,
            saveState: true,
            disableLink: true,
            showCount: false,
            menuClose: true,
            speed: 'fast'
        });
    });
</script>
<div class="span-6 first">
    <div id="sidebar">
        <div class="grey">
            <?php Category::getMenu(0,0); ?>
        </div>
    </div>
</div>
<div class="span-13">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
        <?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
        <?php if($this->beginCache('tagCloud', array('duration'=>3600))) {?>
            <?php $this->widget('TagCloud', array('maxTags'=>Yii::app()->params['tagCloudCount']));?>
        <?php $this->endCache(); } ?>
        <?php $this->widget('RecentComments', array('maxComments'=>Yii::app()->params['recentCommentCount']));?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>