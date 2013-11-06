<?php
/* @var $this ReviewController */
/* @var $model Review */
/* @var $form CActiveForm */
?>
 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">-->
<!--</script>-->
 <style>

#review-form {
position: relative;
width: 240px;
height: 135px;
padding: 0.4em;
}
#review-form h3 {
margin: 0;
padding: 0.4em;
text-align: center;
}
</style>
<script>
$(function() {
 
// run the currently selected effect
function runEffect() {
// get effect type from
var selectedEffect = "blind";
// most effect types need no options passed by default
var options = {};
// some effects have required parameters
if ( selectedEffect === "scale" ) {
options = { percent: 0 };
} else if ( selectedEffect === "size" ) {
options = { to: { width: 200, height: 60 } };
}
// run the effect
$( ".form1" ).toggle( selectedEffect, options, 500 );
 
};
// set effect from select menu value
$( "#hide" ).click(function() {
  //$('#hide').hide();
runEffect();
return false;
});
});
</script>

<!--<script type="text/javascript">
 // $.noConflict();
$(document).ready(function(){
  $("#hide").click(function(){
    $("#review-form").hide();
  });
  $("#show").click(function(){
    $("#review-form").show();
  });
});
</script>-->
<?php if(Yii::app()->user->id != NULL) { ?>
<button id="hide">Write Review</button>
<div class="form1" style="display:none">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-form',
  'action'=>Yii::app()->createUrl('review/novoreview', array('idkniga'=>$_GET['id'])),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


  <p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($review); ?>

	<div class="row">
		<?php echo $form->labelEx($review,'title'); ?>
		<?php echo $form->textField($review,'title',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($review,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($review,'description'); ?>
		<?php echo $form->textField($review,'description',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($review,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php } else { ?>
 <p> Please Log in if you want to review this book!!! </p>   
 <button id="hide">Log In</button>
 <div class="form1" style="display:none">
  <?php $this->renderPartial('//site/login',array('model'=>new LoginForm));?>
 </div>
<?php }?>