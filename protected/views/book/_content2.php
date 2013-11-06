<div class="main_tab_menu">
  <div class="main_tab_menu1">
   
    <div>
   <?php $this->renderPartial('review_form', array('review'=>$review));?>
      </div>
    <div class="listreview" style="margin-top:41px;">
<?php $this->renderPartial('_view1', array(	'dataProvider'=>$dataProvider )); ?>
  </div>
  </div>
  <div class="main_tab_menu2">
    <div class="oursuggestion">
      Our Suggestion
    </div>
    <?php foreach ($knigi as $kniga){ ?>
    <div class="suggested_book">
      <div class="suggested_book1">
        <img src="<?php echo $kniga->image_url; ?>" style="width:80px;">
      </div>
       <div class="suggested_book2">
         <?php echo $kniga->title; ?>
      </div>
      
    </div>
    <?php } ?>
  </div>
</div>