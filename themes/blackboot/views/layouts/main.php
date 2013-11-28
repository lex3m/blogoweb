<?php
	Yii::app()->clientscript
        ->registerCoreScript( 'jquery' )
        ->registerScriptFile( Yii::app()->request->baseUrl . '/js/helper.js', CClientScript::POS_END )
		// use it when you need it!
		/*
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
		->registerCoreScript( 'jquery' )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )
		*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="language" content="en" />
<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Le styles -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<!-- Le fav and touch icons -->

<!-- Custom css -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

</head>

<body>
	<div class="navbar navbar-inverse navbar-static-top" id="first-navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo Yii::app()->request->baseUrl; ?>"><?php echo Yii::app()->name ?></a>
				<div class="nav-collapse pull-right">
					<?php $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass' => 'active',
						'items'=>array(
							array('label'=>'Главная', 'url'=>array('/post/index')),
							array('label'=>'О авторе', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Контакты', 'url'=>array('/site/contact')),
							array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); ?>
					
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

    <div class="navbar navbar-static-top" id="second-navbar">
        <div class="navbar-inner">
            <div class="container">
                <ul id="soc-net" class="pull-left">
                    <li>
                        <a href="http://www.facebook.com/alexei.fedorenko" target="_blank" title="Я в Facebook">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/facebook.png" width="24" height="24" alt="Facebook">
                        </a>
                    </li>
                    <li>
                        <a href="skype:lex.x-3m">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/skype.png" width="24" height="24" alt="Skype">
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/rss.png" width="24" height="24" alt="RSS">
                        </a>
                    </li>
                </ul>
                <form class="navbar-search pull-right" action="<?php echo Yii::app()->request->baseUrl; ?>">
                    <input type="text" class="search-query" placeholder="Поиск" name="q" value="">
                </form>
            </div>
        </div>
    </div>

	<div class="cont">
        <div class="container">
          <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'tagName'=>'ul',
                    'separator'=>' <span class="divider">/</span> ',
                    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                    'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
                    'htmlOptions'=>array ('class'=>'breadcrumb')
                )); ?>
            <!-- breadcrumbs -->
          <?php endif?>
            <?php echo $content ?>
        </div><!--/.container-->
	</div>
	<div class="footer">
	  <div class="container">
		<div class="row pull-left">
			<div id="footer-menu" >
			    <?php echo CHtml::link('Главная', Yii::app()->createUrl('post/index'), array('id'=>'home')); ?> |
                <?php echo CHtml::link('О авторе', Yii::app()->createUrl('site/page', array(
                    'view' => 'about',
                )), array('id'=>'about')) ?> |
                <?php echo CHtml::link('Контакты', Yii::app()->createUrl('site/contact'), array('id'=>'contact')) ?>
			</div> <!-- /span6 -->
		 </div> <!-- /row -->
          <div class="row pull-right">
              <div id="footer-terms">
                  2013 &copy; <a href="http://vk.com/lexxus" target="_blank"> Алексей Федоренко </a>
              </div> <!-- /.span6 -->
          </div> <!-- /row -->
	  </div> <!-- /container -->
	</div>

<?php
$clickJS = <<<MENU
/*
$("#setCookie").on('click', function( e ) {
    $.cookie('test', 'test');
    alert('cookie set');
});

$("#getCookie").on('click', function( e ) {
    alert('cookie get ' + $.cookie('test'));
});

$("#deleteCookie").on('click', function( e ) {
    $.cookie('test', null);
    alert('cookie deleted');
});
*/

//alert( getCookie("leftMenu") );
if (getCookie("leftMenu") !== 'undefined') {
    $("#left-menu a[href$='" + getCookie("leftMenu") + "']").addClass("active");
//  $("a.active").parents("a.dcjq-parent").addClass("active");
    $("a.active").parents("ul").show();
}

  $("#left-menu a").on('click', function( e ) {
        if ($(this).attr("href") !== '#') {
            if (getCookie("leftMenu") !== 'undefined') {
                 deleteCookie("leftMenu");
                 alert(getCookie("leftMenu"))
            }
            setCookie("leftMenu", $(this).attr("href"));
        }
  });



var loc = location.pathname.split("/");
if (location.hostname !== 'blogoweb.net') {
    if (!loc[2]) {
        $('#footer-menu').find('#home').addClass('active');
        //alert(1)
        if (getCookie("leftMenu") !== 'undefined')
            deleteCookie("leftMenu");
    } else {
        $('#footer-menu a[href^="/' + loc[1] +
            '/' + loc[2]
            + '/' + loc[3] + '"]').addClass('active');
    }
} else {
    if (!loc[2]) {
        $('#footer-menu').find('#home').addClass('active');
        if (getCookie("leftMenu") !== 'undefined')
            deleteCookie("leftMenu");
    } else {
        $('#footer-menu a[href^="/' + loc[1] +
            '/' + loc[2] + '"]').addClass('active');
    }
}
MENU;
    Yii::app()->getClientScript()->registerScript('menu', $clickJS);

?>
</body>
</html>
