<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Setting;
use app\models\Group;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * UserController implements the CRUD actions for User model.
 */
class PostController extends Controller
{
	  public $enableCsrfValidation = false;
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
    	  // params
    	  $formats = "html";
    	  $status = Yii::$app->request->get("status");
    	  $name = Yii::$app->request->get("name");
    	  $group_id = Yii::$app->request->get("group_id");
    	  $sort = Yii::$app->request->get("sort", "desc");
    	  $sort_by = Yii::$app->request->get("sort_by", "login");

    	  //
    	  $limit = 10;
    	  
    	  // find
    	  $query = User::find()->logged();
    	  if($status != null)
    	      $query->status($status);

				if(strlen($name) > 0)
    	      $query = $query->like($name);
    	  
    	  if($group_id != null)
    	      $query = $query->in_group($group_id);
    	      
    	   $query->orderBy($sort_by." ".$sort);

    	  $models = $query->all();
    	  
    	  // page
    	  //$user_count = clone $query;
    	  //$user_pages = new Pagination(['totalCount' => $user_count->count()]);
        
        //
        $list_user_status = User::listStatus();
        $list_group_id = Group::listId();

        return $this->render('index', [
            'models' => $models,
            'sort' => $sort,
            'status' => $status,
            'group_id' => $group_id,
            'name' => $name,
            'sort_by' => $sort_by,
            'list_user_status' => $list_user_status,
            'list_group_id' => $list_group_id,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {
        return $this->render('view');
    }
    
    /**
     * New User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
		public function actionNew()
		{
					$model = new User();
			
						return $this->render('create', [
                'model' => $model,
            ]);
		}

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        
        $model->language = Setting::default_language();
        $model->mail_notification = Setting::default_notification_option();
        /*
        $log_file = fopen("log.txt", "a+");
        
        fwrite($log_file, Yii::$app->request->method."\n");
        fwrite($log_file, Yii::$app->request->queryString."\n");
        
        $post_str = serialize(Yii::$app->request->post('User'));
        fwrite($log_file, $post_str."\n");
        
        fclose($log_file);
        */
        
        //
        //$model->attributes = Yii::$app->request->post('User');
        
        //
        if($model->load(Yii::$app->request->post()))
        {
        	  $model_is_ok = true;
        		/*
		      	//
		      	$model->admin = 1;
		      	$model->status = 1;
		      	$model->last_login_on = '2016-02-05';
		      	$model->auth_source_id = 1;
		      	$model->created_on = '2016-02-06';
		      	$model->updated_on = '2016-02-06';
		      	$model->type = "admin";
		      	$model->identity_url = 'ETL';
		      	$model->salt = "ttt";
		      	$model->must_change_passwd = 1;
		      	$model->passwd_changed_on = '2016-02-06';
		      	
		        //
		        $model->language = Setting::default_language();
		        $model->mail_notification = Setting::default_notification_option();
		        */
		        
		        $generate_password = $app->request->post('User[generate_password]');
		        if($generate_password)
		        {
		        	$password = $model->generatePassword();
		        	$model->hashed_password = $password;
		        }
		        else
		        {
		        	$password = $app->request->post('User[password]');
		        	$password_confirmation = $app->request->post('User[password_confirmation]');
		        	
		        	if($password == $password_confirmation)
		        	{
		        		$model->hashed_password = $password;
		        	}
		        	else
		        	{
		        		$model_is_ok = false;
		        	}
		        }
        	
        	  if($model_is_ok == true && $model->save()){
        	  	return $this->redirect(['view', 'id' => $model->id]);
        	  } else {
        	  }
        }
        
        /*
        $errors = $model->getErrors();
        $txt = json_encode($errors);
        
        $log_file = fopen("log.txt", "a+");
        fwrite($log_file, $txt."\n");
        
        fclose($log_file);
        */
        
        $languages = [0 => 'zh-cn', 1 => 'en'];
        $mail_notifications = [0 => 'my following projects', 1 => 'projects assigned to me', 2 => 'projects created by me', 3 => 'nothing', 4 => 'all notification'];
        $time_zones = ['American Samoa' => '(GMT-11:00) American Samoa',
            'Beijing' => '(GMT+08:00) Beijing',
        ];
		    
				return $this->render('create', [
            'model' => $model,
            'languages' => $languages,
            'mail_notifications' => $mail_notifications,
            'time_zones' => $time_zones,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if($model->load(Yii::$app->request->post()))
        {
        	if($model->save())
        	{
        		return $this->redirect(['view', 'id' => $model->id]);
        	}
        }

        $languages = [0 => 'zh-cn', 1 => 'en'];
        $mail_notifications = [0 => 'my following projects', 1 => 'projects assigned to me', 2 => 'projects created by me', 3 => 'nothing', 4 => 'all notification'];
        $time_zones = ['American Samoa' => '(GMT-11:00) American Samoa',
            'Beijing' => '(GMT+08:00) Beijing',
        ];
        
        return $this->render('update', [
                'model' => $model,
		            'languages' => $languages,
		            'mail_notifications' => $mail_notifications,
		            'time_zones' => $time_zones,
            ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionStatus($id)
    {
    	  $status = Yii::$app->request->get("status");
    	  
    	  if($status != null && $status > 0)
    	  {
        	$model = $this->findModel($id);
        	
        	if($model != null)
        	{
        		$model->status = $status;
        		$model->save();
        	}
        }

        return $this->redirect(['index']);
    }
    
    public function actionPost()
    {
    }
    
    public function actionSubscriber()
    {
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function find_user()
    {
    	// param
    	$id = 5;
    	return User::find($id);
    }
}
