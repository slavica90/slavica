<h1> Ova se site knigi za kategorijata <?php echo $kategorija->category_name?></h1>
 <?php if($knigi != NULL) {?>

  <?php foreach ($knigi as $kniga){?>
  <p><?php echo $kniga->id;?></p>
  <p><?php echo $kniga->title;?></p>
  <p><?php echo $kniga->year;?></p>
  <p><?php echo $kniga->image_url;?></p>
 
  <hr/>
  <?php } ?>
  <?php }else {?>
   <div class="flash-notice">Nema knigi vo ovaa kategorija!</div>
  <?php } ?>

  
