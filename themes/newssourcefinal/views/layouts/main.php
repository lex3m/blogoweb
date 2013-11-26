<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $this->pageTitle ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/css/print.css" media="print" />

	<style type="text/css" media="screen">
		h1.fontface {font: 32px/38px 'MichromaRegular', Arial, sans-serif;letter-spacing: 0;}
		p.style1 {font: 18px/27px 'MichromaRegular', Arial, sans-serif;}
		@font-face {
			font-family: 'MichromaRegular';
			src: url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.eot');
			src: url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.eot?#iefix') format('embedded-opentype'),
			url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.woff') format('woff'),
			url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.ttf') format('truetype'),
			url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.svg#MichromaRegular') format('svg');
			font-weight: normal;
			font-style: normal;
		}
	</style>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
</head>
<body>


	  <header>
 <div class="container1">
    <!--start title-->
    <h1 class="fontface" id="title"><?php echo Yii::app()->name ?></h1>
	<!--end title-->
  </div>
    
	</header>
	<!--end header-->
 
	<nav>
		<div class="menu">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contact', 'url'=>array('/site/contact')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
		</div>
    </nav>
	<div id="wrapper"><!-- #wrapper -->
	<section id="main"><!-- #main content and sidebar area -->

		<aside id="sidebar1"><!-- sidebar1 -->
				<br><br><br>
					
				
					<img src="<?php echo Yii::app()->theme->baseUrl ?>/images/ad125.jpg" alt="" /><br /><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/ad125.jpg" alt="" /><br /><br />
						<h3>Latest News </h3><br>
					<ul>
						<li><a href="#">6.5 Mag Quake Rocks Mexican Coast</a></li>
						<li><a href="#">Cain Denies Allegations</a></li>
						<li><a href="#">Snowstorm Leaves N.E. In Dark</a></li>
						<li><a href="#">Plane Disaster Averted in N.J. </a></li>
						<li><a href="#">Employers May Drop Plans Once Health Law Starts</a></li>
						<li><a href="#">Obama Orders FDA to Reduce Drug Shortages</a></li>
						<li><a href="#">Hillary Clinton's Mother Dies at 92</a></li>
						<li><a href="#">10 Sickened in Conn. by Carbon Monoxide Exposure</a></li>
						<li><a href="#">Iran Seeks U.S. Apology Over Murder Plot Claims </a></li>
						<li><a href="#">Greek Bailout Referendum Sparks Outrage</a></li>
						<li><a href="#">Man dies in N.Y. gym fight after Tasered by police </a></li>
						<li><a href="#">Kansas City missing baby case becoming a circus, critics say</a></li>
					</ul>
			

		</aside><!-- end of sidebar1 -->
        

			<section id="content"><!-- #content -->

				<article class="group1">
					<?php echo $content ?>
				</article>

			<article class="group3">
							<h2><a href="#">First Interesting Section Title</a></h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. <a href="#">Duis sagittis ipsum</a>. Sed cursus ante dapibus diam. </p> 
						
						</article>
						
        		<article class="group3">
							<h2><a href="#">Second Section or Article Title</a></h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.  </p>
						</article>
						<article class="group3">
							<h2><a href="#">First Interesting Section Title</a></h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. <a href="#">Duis sagittis ipsum</a>. Sed cursus ante dapibus diam. Sed nisi.</p> 

						</article>
					
					<?php /*
        		<article class="group2">						<br><br>
							<h2><a href="#">Second Section or Article Title</a></h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Usu pericula argumentum repudiandae ea, ut vis deserunt oportere, assum nominavi percipitur ei ius. Nam timeam atomorum philosophia te, ut eum amet laoreet pertinax, an duo error aperiri reformidans. Et alii quas partiendo mei, wisi quaestio convenire et vix.</p>
						</article>
						
						<div class="newsbox">
<h2> Occupy Wallstreet Movement- Going Global</h2>
 <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/occupy1.jpg" class="floatimgleft">
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit
 amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

<a href="#" class="button"> Read More </a>
    </div>
	*/ ?>
</section>

		<aside id="sidebar2"><!-- sidebar2 -->
				<h3>Did You Know?</h3>
					<ul>
						<li><a href="#">Curabitur sodales</a></li>
						<li><a href="#">Sed dignissim</a></li>
						<li><a href="#">Fusce nec</a></li>
						<li><a href="#">Nulla quis</a></li>
						<li><a href="#">Curabitur sodales</a></li>
						<li><a href="#">Sed dignissim</a></li>
						<li><a href="#">Fusce nec</a></li>
						<li><a href="#">Nulla quis</a></li>
					</ul>
				<br>
<br>
				<h3>We're Social Too!</h3><br>
					
					<img src="<?php echo Yii::app()->theme->baseUrl ?>/images/facebook_32.png">
					<img src="<?php echo Yii::app()->theme->baseUrl ?>/images/twitter_32.png">
					<img src="<?php echo Yii::app()->theme->baseUrl ?>/images/youtube_32.png">
				
<br>
<br><br>
<br>
				<h3>Video Blog </h3><br>
					<ul>
						<li><a href="#">10.29.11</a></li>
						<li><a href="#">10.28.11</a></li>
						<li><a href="#">10.27.11</a></li>
						<li><a href="#">10.26.11 </a></li>
						<li><a href="#">10.25.11</a></li>
						<li><a href="#">10.24.11</a></li>
						<li><a href="#">10.23.11</a></li>
						<li><a href="#">More..</a></li>
						</ul>
					

				

				<h3> Links</h3>
					<ul>
						<li><a href="#">Link 1</a></li>
						<li><a href="#">Link 2</a></li>
						<li><a href="#">Link 3</a></li>
						<li><a href="#">Link 4</a></li>
						<li><a href="#">Link 5</a></li>
						<li><a href="#">Link 6</a></li>
						<li><a href="#">Link 7</a></li>
						<li><a href="#">Link 8</a></li>
					</ul>

		</aside><!-- end of sidebar -->

	</section><!-- end of #main content and sidebar-->
</div>
		<footer>
		<div class="container1">
		<section id="footer-area">

			<section id="footer-outer-block">
					<aside class="footer-segment">
							<h4>News</h4>
								<ul>
									<li><a href="#">U.S.</a></li>
									<li><a href="#">Local</a></li>
									<li><a href="#">World</a></li>
								</ul>
					</aside><!-- end of #first footer segment -->

					<aside class="footer-segment">
							<h4>About Us</h4>
								<ul>
									<li><a href="#">Corporate HQ</a></li>
									<li><a href="#">Staff</a></li>
									<li><a href="#">History</a></li>
								</ul>
					</aside><!-- end of #second footer segment -->

					<aside class="footer-segment">
							<h4>Contact Us</h4>
								<ul>
									<li><a href="#">Customer Support</a></li>
									<li><a href="#">Divisions</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Job Opportunities</a></li>
								</ul>
					</aside><!-- end of #third footer segment -->
					
					<aside class="footer-segment">
							<h4>Blahdyblah</h4>
								<p>&copy; 2010 <a href="#">yoursite.com</a> Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
					</aside><!-- end of #fourth footer segment -->

			</section><!-- end of footer-outer-block -->

		</section><!-- end of footer-area -->
		</div>
	</footer>
<!-- Free template distributed by http://freehtml5templates.com -->
</body>
</html>
