<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->title,
);

?>

<?php  
 $this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
       // 'Static tab'=>'Static content',
        'Overview'=>$this->renderPartial('_content1',array('model'=>$model, 'knigi'=>$knigi,'prosek'=>$prosek,),true),
        'Reviews'=>$this->renderPartial('_content2',array('model'=>$model, 'knigi'=>$knigi,'review'=>$review,'dataProvider'=>$dataProvider),true),
       // 'Ajax tab'=>array('ajax'=>array('ajaxContent','view'=>'_content2')),
    ),
    'options'=>array(
        'collapsible'=>true,
        'selected'=>1,
    ),
    'htmlOptions'=>array(
        'style'=>'width:765px;'
      
    ),
  'themeUrl'=>Yii::app()->request->baseUrl.'/css',
  'theme'=>'widget', 
  //'cssFile' => Yii::app()->request->baseUrl. '/css/tab_widget.css'
));
?>