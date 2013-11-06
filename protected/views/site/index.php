<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
 <script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider();
});
</script>

<script type="text/javascript">
$(document).ready(function() {

	// Using default configuration
//	$("#foo1").carouFredSel();
	
	// Using custom configuration
	$("#foo2").carouFredSel({
		items				: 5,
    circular: false,
    infinite: false,
    auto 	: false,
//		direction			: "up",
		scroll : {
			items			: 5,
			easing			: "elastic",
			duration		: 1500,							
			pauseOnHover	: true
		},
    prev	: {	
		button	: "#foo2_prev",
		key		: "left"
	},
  next	: { 
		button	: "#foo2_next",
		key		: "right"
	},
	pagination	: "#foo2_pag"
	});	
});

</script>


<div  style="width:940px;">
<ul class="bxslider"> 
  <li><img src="<?php echo $baseUrl;?>/images/photo1.jpg" /></li>
  <li><img src="<?php echo $baseUrl;?>/images/photo2.jpg" /></li>
  <li><img src="<?php echo $baseUrl;?>/images/photo3.jpg" /></li>
</ul>
</div>
<div id="maincontainer">
  <div class="slider_title">
    <h1> FEATURED BOOKS </h1>
  </div>
  
  <div class="image_carousel">
	    <div id="foo2">
          <?php foreach($randomrow as $row){?>
              <img src="<?php echo $row->image_url; ?>" alt="slider_photo" width="140" height="140" />
          <?php } ?>
	        
	    </div>
	    <div class="clearfix"></div>
	    <a class="prev" id="foo2_prev" href="#"><span>prev</span></a>
	    <a class="next" id="foo2_next" href="#"><span>next</span></a>
<!--	    <div class="pagination" id="foo2_pag"></div>-->
	</div>
</div>
<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
