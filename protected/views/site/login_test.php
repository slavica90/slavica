<?php $this->pageTitle=Yii::app()->name . ' - Login'; ?>

<h1>Login</h1>


<div>
  
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
  
<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($form); ?>

<div>
<?php echo CHtml::activeLabel($form,'email'); ?>
<?php echo CHtml::activeTextField($form,'email') ?>
</div>

<div>
<?php echo CHtml::activeLabel($form,'password'); ?>
<?php echo CHtml::activePasswordField($form,'password') ?>
</div>

<div>
<?php echo CHtml::submitButton('Login'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->
