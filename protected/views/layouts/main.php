<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

<!--    <link href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/dcaccordion.css" rel="stylesheet" type="text/css" />-->

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/tinymce/tinymce.min.js" ></script>

<!--    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
<!--    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<!--    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->

<!--    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
<!--    <script type='text/javascript' src='--><?php //echo Yii::app()->request->baseUrl; ?><!--/assets/js/jquery.cookie.js'></script>-->
<!--    <script type='text/javascript' src='--><?php //echo Yii::app()->request->baseUrl; ?><!--/assets/js/jquery.hoverIntent.minified.js'></script>-->
<!--    <script type='text/javascript' src='--><?php //echo Yii::app()->request->baseUrl; ?><!--/assets/js/jquery.dcjqaccordion.2.7.min.js'></script>-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index')),
                array('label'=>'Записи', 'url'=>array('/post/index')),
				array('label'=>'О нас', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Обратная связь', 'url'=>array('/site/contact')),
				array('label'=>'Авторизация', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<a href="http://vk.com/lexxus" target="_blank">Алексей Федоренко</a> &copy;  <?php echo date('Y'); ?> <br/>
		Все права защищены.<br/>
		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<!--<script>-->
<!--    $(function() {-->
<!--        $( "#left-menu" ).menu();-->
<!--    });-->
<!--</script>-->
</body>
</html>
