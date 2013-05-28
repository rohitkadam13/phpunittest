<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_request')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_request); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_criticality')); ?>:</b>
	<?php echo CHtml::encode($data->request_criticality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_type')); ?>:</b>
	<?php echo CHtml::encode($data->request_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason')); ?>:</b>
	<?php echo CHtml::encode($data->reason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accepted_by')); ?>:</b>
	<?php echo CHtml::encode($data->accepted_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('system_type')); ?>:</b>
	<?php echo CHtml::encode($data->system_type); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('approximate_hours')); ?>:</b>
	<?php echo CHtml::encode($data->approximate_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>