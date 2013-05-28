<?php
$this->breadcrumbs=array(
	'Change Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ChangeLog', 'url'=>array('index')),
	array('label'=>'Create ChangeLog', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('change-log-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Change Logs</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'change-log-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		array(
		  'name'=>'date_of_request',
		  'type'=>'raw',
		  'value'=>'date("Y-m-d", strtotime($data->date_of_request))'
    ),
		array(
		  'name'=>'request_criticality',
		  'type'=>'raw',
		  'value'=>'ucFirst($data->request_criticality)'
    ),  
		array(
		  'name'=>'request_type',
		  'type'=>'raw',
		  'value'=>'ucFirst(str_replace("_", " ", $data->request_type))'
    ),
    array(
		  'name'=>'system_type',
		  'type'=>'raw',
		  'value'=>'ucFirst(str_replace("_", " ", $data->system_type))'
    ),
		array(
		  'name'=>'Assigned Individual',
		  'type'=>'raw',
		  'value'=>'ucFirst($data->accepted_by)'
    ),
    'reason',
		'approximate_hours', 
		array(
		  'name'=>'srs_update',
		  'type'=>'raw',
		  'value'=>'ucFirst($data->srs_update)'
    ),
		/*
		
		'approximate_hours',
		'created',
		'modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
<b>Total Hours:- <?php echo ChangeLog::getList('TOTAL-HOURS') ?></b>
