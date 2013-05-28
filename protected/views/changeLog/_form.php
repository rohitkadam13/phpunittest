<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'change-log-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_request'); ?>
		<?php //echo $form->textField($model,'date_of_request'); ?>
		<?php 
		      $date = ($model->date_of_request) ? date("Y-m-d", strtotime($model->date_of_request)) : date("Y-m-d");
          $this->widget('zii.widgets.jui.CJuiDatePicker',array(
          'model'=>$model,
          'name'=>'ChangeLog[date_of_request]',
          'value'=>$date,
          // additional javascript options for the date picker plugin
          'options'=>array(
              'showAnim'=>'fold',
              'dateFormat'=>'yy-mm-dd',
          ),
          'htmlOptions'=>array(
              //'style'=>'height:20px;'
          ),
        ));
    ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'request_criticality'); ?>
		<?php echo $form->dropDownList( $model,'request_criticality',ZHtml::enumItem($model, 'request_criticality') ); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'request_type'); ?>
		<?php echo $form->dropDownList( $model,'request_type',ZHtml::enumItem($model, 'request_type') ); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reason'); ?>
		<?php echo $form->textArea($model, 'reason', array('maxlength' => 300, 'rows' => 6, 'cols' => 50)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'dependency'); ?>
		<?php echo $form->textArea($model, 'dependency', array('maxlength' => 300, 'rows' => 6, 'cols' => 50)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'optional'); ?>
		<?php echo $form->textArea($model, 'optional', array('maxlength' => 300, 'rows' => 6, 'cols' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accepted_by'); ?>
		<?php echo $form->dropDownList( $model,'accepted_by',ZHtml::enumItem($model, 'accepted_by') ); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'system_type'); ?>
		<?php echo $form->dropDownList( $model,'system_type',ZHtml::enumItem($model, 'system_type') ); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'approximate_hours'); ?>
		<?php echo $form->textField($model,'approximate_hours',array('size'=>10,'maxlength'=>30)); ?>
		<?php //echo $form->dropDownList( $model,'approximate_hours', ChangeLog::getList('HOURS')); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'srs_update'); ?>
		<?php echo $form->dropDownList( $model,'srs_update',ZHtml::enumItem($model, 'srs_update') ); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
$(document).ready(function() {
    $("#ChangeLog_approximate_hours").keydown(function(event) 
    {
      // Backspace, tab, enter, end, home, left, right,decimal(.)in number part, decimal(.) in alphabet
      // We don't support the del key in Opera because del == . == 46.
      var controlKeys = [8, 9, 13, 35, 36, 37, 39,110,190];
      // IE doesn't support indexOf
      var isControlKey = controlKeys.join(",").match(new RegExp(event.which));
      // Some browsers just don't raise events for control keys. Easy.
      // e.g. Safari backspace.
      if (!event.which || // Control keys in most browsers. e.g. Firefox tab is 0
          (49 <= event.which && event.which <= 57) || // Always 1 through 9
          (96 <= event.which && event.which <= 106) || // Always 1 through 9 from number section 
          (48 == event.which && $(this).attr("value")) || // No 0 first digit
          (96 == event.which && $(this).attr("value")) || // No 0 first digit from number section
          isControlKey) 
      { // Opera assigns values for control keys.
        return;
      } 
      else 
      {
        event.preventDefault();
      }
  });
});
</script>