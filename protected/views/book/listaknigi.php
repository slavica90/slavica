
		
		
		<script type="text/javascript">  
			
			jQuery(function($){
					
			
				
				$('.bar').mosaic({
					animation	:	'slide',	//fade or slide
					anchor_y	:	'bottom'		//Vertical anchor position
				});
				
				    
		    });
		    
		</script>

<?php if($knigi != NULL) {?>
 <?php foreach ($knigi as $kniga){?>
<div class="slika">
    <div class="mosaic-block bar">
			<a href="google.com" target="_blank" class="mosaic-overlay">
				<div class="details">
					<h4> <?php echo $kniga->title;?></h4>
				</div>
			</a>
			<div class="mosaic-backdrop">
         <?php if($kniga->image_url) {?>
        <img src="<?php echo $kniga->image_url;?>" alt="<?php echo $kniga->title;?>" width="200" height="150" />
      <?php } else { ?>
         <img src="images/no_photo.png" alt="<?php echo $kniga->title;?>"/>
       <?php } ?>
      </div>
		</div>
  
    <div>
      <div class="naslovkniga">
        <?php echo $kniga->year;?>
      </div>
      <div class="korisnikidkniga" >
        
        <?php echo "User: ". $kniga->user->name;?>
      </div>
    </div>
  
   <div id="prikazikategori">
      <a href="<?php echo Yii::app()->createUrl('category/kategoriikniga',array('id'=>$kniga->id) )?>"> KATEGORII </a>
    </div>
  </div>
    <?php } ?>
    <?php } ?>

  
		
				