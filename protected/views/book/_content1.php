<div class="main_tab_menu">
  <div class="main_tab_menu1">
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'title',
		'year',
    'image_url',
    ),
   'htmlOptions' => array(
          'style'=>'width:741px;'),
)); ?>
    
 	<?php
//var_dump(Yii::app()->request->cookies['ratingcookie']);
   
  
  $this->widget('CStarRating',array(
	    'name'=>'star_rating_ajax',
    'htmlOptions' => array(
        'id'=>'raty',
        ),    
	    'callback'=>'
	        function(){
	                $.ajax({
	                    type: "POST",
                      dataType: "json",
	                    url: "'.Yii::app()->createUrl('book/starnumber').'",
                      data: {
                          rate: $(this).val(),
                          id:'. $model->id .',
                      },
	                    success: function(data){ // data e podatokot sto se vraka so json
                              $("#mystar_voting").html(data.msg);
                              $("#prosekdiv").html(data.updatedAverage);
                              $("#raty").children().first().rating("readOnly", true);
                              $("#raty").children().first().rating("select", data.updatedAverage);
                       }})}',
            'minRating'=>1,
            'maxRating'=>5,	      
            'starCount'=>5,
            'value'=>(string)((int)$model->getRating($model->id)),
            //'attribute'=>'$model->ratings->',
            'model'=>$model,
            'readOnly'=> $model->checkCoockieExists($model->id),
	  ));
	echo "<br/>";
	echo "<div id='mystar_voting'></div>";
	?>  
    
   <div id="prosekdiv"> <p> <?php echo $prosek  ?> </p> </div>
          
    
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







<?php
//$form = $this->beginWidget(
//    'CActiveForm',
//    array(
//        'id' => 'upload-form',
//        'enableAjaxValidation' => false,
//        'htmlOptions' => array(
//          'enctype' => 'multipart/form-data',
//          'style'=>'width:740px;'),
//     )
//);
//$this->endWidget();
//
//foreach ($model->category as $kategorija){
//      echo $kategorija->category_name . '<br>';
//      echo $kategorija->description . '<br>';
//    }
//
?>