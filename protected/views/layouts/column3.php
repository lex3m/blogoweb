<?php ///* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!--        <link href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/dcaccordion.css" rel="stylesheet" type="text/css" />-->
<!--        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
<!--        <script type='text/javascript' src='--><?php //echo Yii::app()->request->baseUrl; ?><!--/assets/js/jquery.cookie.js'></script>-->
<!--        <script type='text/javascript' src='--><?php //echo Yii::app()->request->baseUrl; ?><!--/assets/js/jquery.hoverIntent.minified.js'></script>-->
<!--        <script type='text/javascript' src='--><?php //echo Yii::app()->request->baseUrl; ?><!--/assets/js/jquery.dcjqaccordion.2.7.min.js'></script>-->
<script>
    $(document).ready(function($) {
        $( "#left-menu" ).menu();
//        $('#left-menu').dcAccordion({
//            eventType: 'hover',
//            autoClose: false,
//            saveState: true,
//            disableLink: true,
//            showCount: true,
//            menuClose: true,
//            speed: 'fast'
//        });
    });
</script>
<div class="span-5 first">
    <div id="sidebar">
        <?php //$this->widget('CategoryMenu');?>
        <?php Category::getMenu(0,0); ?>
    </div>
</div>
<div class="span-14">
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
        <?php
//            $this->beginWidget('zii.widgets.CPortlet', array(
//                'title'=>'Меню',
//            ));
            /*$this->widget('zii.widgets.CMenu', array(
                'items'=>array(
                    // Important: you need to specify url as 'controller/action',
                    // not just as 'controller' even if default acion is used.
                    array('label'=>'Home', 'url'=>array('site/index')),
                    array('label'=>'Products', 'url'=>array('product/index'), 'items'=>array(
                        array('label'=>'New Arrivals', 'url'=>array('product/new', 'tag'=>'new'), 'items'=>array(
                            array('label'=>'Bestsellers', 'url'=>array('product/bestseller', 'tag'=>'popular')),
                        )),
                        array('label'=>'Most Popular', 'url'=>array('product/index', 'tag'=>'popular')),
                    )),
                    array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                ),
            ));*/
//            $this->endWidget();
        ?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>