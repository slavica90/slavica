<?php if($kniga!=NULL){?>
<h1>Knigata so naslov <?php echo $kniga->title; ?> pripaga vo slednive kategorii: </h1>
<?php if($kategorii != NULL) {
foreach ($kategorii as $kategorija){?>
<p><?php echo $kategorija->id;?></p>
  <p><?php echo $kategorija->category_name;?></p>
  <p><?php echo $kategorija->description;?></p>

  <hr/>
  <?php } ?>
  <?php } else{ ?>
  <div class="flash-notice">Knigata so naslov <?php echo $kniga->title; ?> ne pripaga vo nitu edna kategorija</div>
  <?php } ?>
<?php }else { ?>
  <div class="flash-notice">Takva kniga ne postoi!!!</div>
<?php } ?>



