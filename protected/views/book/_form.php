<?php
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
  $(document).ready(function() {
    $("#createbookid").click(function(e){    
    if($(".checkbox_bookcreate:checkbox:checked").length > 0){
       return true;
   }else {
     
        $("#checkboxinfo").text("Choose some category!");
        $(".flash-notice").show();
       e.preventDefault();
       return false;
   }
    });
    
  });
  
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
  'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
    <?php echo $form->labelEx($model,'user_id'); ?>
    <?php echo CHtml::activeDropDownList($model, 'user_id', $iminja);?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
      <?php echo $form->labelEx($model,'year'); ?>
      <?php 
         $form->widget('zii.widgets.jui.CJuiDatePicker', array(
             'model'=>$model,
             'attribute'=>'year',
             'name'=>$model->year,    // This is how it works for me.
             'value'=>$model->year,
             'options'=>array('dateFormat'=>'yy-mm-dd',
//               'altFormat'=>'dd-mm-yy', 
                        'changeMonth'=>'true', 
                        'changeYear'=>'true', 
                        'yearRange'=>'1920:2010', 
                        'showOn'=>'both'),
        'htmlOptions'=>array('size'=>'10', 'readonly'=>'readonly')
   ));
  ?>
	</div>
  
  <div class="row">
		<?php echo $form->labelEx($model, 'image_url'); ?>
    <?php echo $form->fileField($model, 'image_url'); ?>
    <?php echo $form->error($model, 'image_url'); ?>
	</div> 
  
  <div class="row">
    <?php $categorylist=Category::model()->findAll(); ?>
    <?php foreach($categorylist as $singlecategory){?>
    <label>
    <input type="checkbox" name="chbox[]" value="<?php echo $singlecategory->id ?>" class="checkbox_bookcreate" />
    <?php echo $singlecategory->category_name; ?>
    </label>
    <?php } ?>
  </div> 
  
  <div class="row">
     <?php $this->widget('CStarRating',array(
    'model'=>$model,
    'attribute'=>'rating',
    'name'=>'rating',
    'value'=>3,
)); ?>
  </div>
 
  <div class="flash-notice" style="display: none;">
<p id="checkboxinfo"></p>
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Create',array('id'=>'createbookid', 'name'=>'submit_kopce')); ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->