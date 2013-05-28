<?php

class ChangeLogController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ChangeLog;
		
		Yii::log('Entering in the new create change log', 'info');
  
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ChangeLog']))
		{
			Yii::log('Create change log form fields enetered', 'info');
			$model->attributes=$_POST['ChangeLog'];
			Yii::log('validating change log form', 'info');
			if($model->save())
			{
				Yii::log('successfully new change log request created : redirecting to dashboard ', 'info');
				$this->redirect(array('admin'));
			}
			else 
			{
				Yii::log('Operation failed : invalid details', 'info');
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		Yii::log('Entering in the update function', 'info');
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ChangeLog']))
		{
			Yii::log('ChangeLog form fields eneterd', 'info');
			$model->attributes=$_POST['ChangeLog'];
			Yii::log('Validating ChangeLog form fields', 'info');
			if($model->save())
			{
				Yii::log('ChangeLog form save successfully', 'info');
				$this->redirect(array('admin'));
			}
			else
			{
				Yii::log('Error: invalid data', 'info');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		Yii::log('Entering in the delete function', 'info');
		
		if(Yii::app()->request->isPostRequest)
		{
			Yii::log('Validating rquest: record is their in db or not.', 'info');
			$objChangeLog = $this->loadModel($id);
			if ($objChangeLog)
			{
				Yii::log('successfully deleted record.', 'info');
				// we only allow deletion via POST request
				$objChangeLog->delete();
			}
			else 
			{
				Yii::log('record not found with id '.$objChangeLog->id, 'info');
			}

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
		{
			Yii::log('400: Invalid request. Please do not repeat this request again.'.$objChangeLog->id, 'info');
			//throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{           
		$dataProvider=new CActiveDataProvider('ChangeLog');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{            
		$model=new ChangeLog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ChangeLog']))
			$model->attributes=$_GET['ChangeLog'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=ChangeLog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='change-log-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
