<?php
$this->breadcrumbs=array(
	'Change Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ChangeLog', 'url'=>array('index')),
	array('label'=>'Create ChangeLog', 'url'=>array('create')),
	array('label'=>'Update ChangeLog', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ChangeLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChangeLog', 'url'=>array('admin')),
);
?>

<h1>View ChangeLog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date_of_request',
		array(
		  'name'=>'request_criticality',
		  'type'=>'raw',
		  'value'=>ucFirst(str_replace("_", " ", $model->request_criticality))
    ),
		array(
		  'name'=>'request_type',
		  'type'=>'raw',
		  'value'=>ucFirst(str_replace("_", " ", $model->request_type))
    ),
		'reason',
		array(
		  'name'=>'accepted_by',
		  'type'=>'raw',
		  'value'=>ucFirst(str_replace("_", " ", $model->accepted_by))
    ),
		array(
		  'name'=>'system_type',
		  'type'=>'raw',
		  'value'=>ucFirst(str_replace("_", " ", $model->system_type))
    ),
		'approximate_hours',
		'created',
		'modified',
	),
)); ?>
