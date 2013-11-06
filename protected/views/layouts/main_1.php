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
  

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/mosaic.1.0.1.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-stickybox/js/stickysidebar.jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-stickybox/js/jquery.easing.1.3.js"></script>
  
   
 
  <script type="text/javascript">
      $(function () {
       $("#side").stickySidebar({
          timer: 400, 
          easing: "easeInOutQuad"
});

    });
   
  </script>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
      <div id="logo1"><img src="images/logo_book_1.png" alt="logo_book" /></div>
      <div id="address1"> 421 e Drachman <br/>
          Tuscon AZ USA<br/>
          tel.85705-7598 <br/>
          fax.85705-7598 <br/>
          info@mybook.com
           
      </div>
      
    </div>
    <div id="knigi">aaaa</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'ParniID', 'url'=>array('/user/parni')),
        array('label'=>'Korisnici', 'url'=>array('/user/index')),
        array('label'=>'Knigi', 'url'=>array('/book/index')),
        array('label'=>'Knigi po korisnik', 'url'=>array('/book/knigikorisnik')),
        array('label'=>'Site Knigi', 'url'=>array('/book/listaknigi')),
        array('label'=>'Book Reviews', 'url'=>array('/review/index')),
//        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
        
			),
		)); ?>
	</div><!-- mainmenu -->

<div class="clear"></div>
<div id="maincontainer">
    
     <?php if(Yii::app()->user->hasFlash('new_user')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('new_user'); ?>
      </div>
    <?php endif; ?>
      
      <?php echo $content; ?>
  
</div>
  

	<div class="clear"></div>

	<div id="footer">
     <div id="footer1">
       <div id="firstfooter">
       Connect Socially with us: <br/>
       </div>
       <!-- <div style="font-size:16px; width: 800;">
          Connect Socially with MyBook
       </div> -->
       
       <div id="socialfooter" style="padding-left: 140px;">
          <div class="socialbuttons">  <img src="images/googleplus.png"/> <span style="font-size: 14px;">Google</span> </div>
          <div class="socialbuttons">  <img src="images/facebook.png"/> <span style="font-size: 14px;">Facebook</span> </div>
          <div class="socialbuttons">  <img src="images/twiter.png"/> <span style="font-size: 14px;">Twiteer </span> </div>
         <div class="socialbuttons">   <img src="images/pinterest.png"/> <span style="font-size: 14px;">Pinterest</span> </div>
        </div>
    </div>
    <div id="footer2">
		Copyright &copy; <?php echo date('Y'); ?> by Slavica.
		All Rights Reserved.
		<?php echo Yii::powered(); ?>
    </div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
