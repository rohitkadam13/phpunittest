<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'request_criticality'); ?>
		<?php
        $arrRequestCriticality = ChangeLog::getSearch(ZHtml::enumItem($model, 'request_criticality'));
        echo $form->dropDownList( $model,'request_criticality', $arrRequestCriticality); 
    ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accepted_by', array('label'=>'Assigned Individual')); ?>
		<?php
        $arrAcceptedBy = ChangeLog::getSearch(ZHtml::enumItem($model, 'accepted_by'));
        echo $form->dropDownList( $model,'accepted_by', $arrAcceptedBy); 
    ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'system_type', array('label'=>'System Type')); ?>
		<?php
        $arrAcceptedBy = ChangeLog::getSearch(ZHtml::enumItem($model, 'system_type'));
        echo $form->dropDownList( $model,'system_type', $arrAcceptedBy); 
    ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'request_type', array('label'=>'Request Type')); ?>
		<?php
        $arrAcceptedBy = ChangeLog::getSearch(ZHtml::enumItem($model, 'request_type'));
        echo $form->dropDownList( $model,'request_type', $arrAcceptedBy); 
    ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'srs_update'); ?>
		<?php
        $arrAcceptedBy = ChangeLog::getSearch(ZHtml::enumItem($model, 'srs_update'));
        echo $form->dropDownList( $model,'srs_update', $arrAcceptedBy); 
    ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->