<?php

class SiteController extends Controller
{
  public $defaultAction = 'login';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	   //check if user is already login
     if (!Yii::app()->user->isGuest){
       $this->redirect(Yii::app()->createUrl('/changeLog/admin'));
     }
     
     	Yii::log('Entering the login action', 'info');
     
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			Yii::log('login credentials entered','info');
			
			$model->attributes=$_POST['LoginForm'];
			
			Yii::log('Username : '.$model->username, 'info');
			Yii::log('validating login credentials', 'info');
		
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) 
			{
				Yii::log('successful login : redirecting to dashboard ', 'info');
				$this->redirect(Yii::app()->createUrl('/changeLog/admin'));
			} 
			else 
			{
				echo 'here';
				Yii::log('Login failed : invalid details', 'info');
			}     
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	 public function actionPasswordReset()
	 {
	   //check if user is already login
     if (!Yii::app()->user->isGuest){
       $this->redirect(Yii::app()->createUrl('/changeLog/admin'));
     }
     
     if ($_POST)
     {
       if ($_POST['user_email'] && $_POST['user_pwd']) {
       
          $user_email = $_POST['user_email'];
          $user_pwd = $_POST['user_pwd']; 
          $objChangeLogUser = ChangeLogUser::model()->findByAttributes(array('email'=>$user_email));
          
          if ($objChangeLogUser) {
                $objChangeLogUser->password = md5($user_pwd);
                $objChangeLogUser->save();
                Yii::app()->user->setFlash('msg', 'Password has been changed successfully!');
          }
          else {
            Yii::app()->user->setFlash('msg', 'You are not registered user!');
          }
       }
       else {
          Yii::app()->user->setFlash('msg', 'Email and password can not be empty!');
       }
     }
     
     $this->render('passwordreset',array());
	 }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}