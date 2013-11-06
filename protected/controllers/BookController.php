<?php

class BookController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','knigikorisnik','listaknigi','knigikategorija', 'starnumber'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('slavica'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('slavica'),
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
   $review = new Review;
  $sql = "SELECT * FROM " . Book::model()->tableName()  . " WHERE image_url <> '' ORDER BY RAND() LIMIT 5";
  $randomknigi = Book::model()->findAllBySql($sql);
 
  $prosek=Book::model()->getRating($id);
  $model=new Book;

    
    $kniga=new Book;
    $kniga=$this->loadModel($id);
    $dataProvider=$kniga->review; // pole od objekti od tipot Review
    		
  $this->render('view',array(
			'model'=>$this->loadModel($id),
      'knigi'=>$randomknigi,
      'prosek'=>$prosek,
      'review'=>$review,
    'dataProvider'=>$dataProvider,
		));
  }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Book;
    $user_names=array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
    $users = User::model()->findAll();
foreach($users as $user){
       $user_names[$user->id]=$user->name;
       
     }
    
     
	if(isset($_POST['Book']))
	{ 
//    var_dump($_POST['Book']['year']);
//    exit();
    
    //var_dump($_POST['rating']);
    //  exit();
    $idNaKategorii=$_POST['chbox'];
    $model->rating=$_POST['rating'];
   $model->attributes=$_POST['Book'];
   $fileImage=CUploadedFile::getInstance($model,'image_url');
   $path = 'images/upload/'.time().$fileImage;
   $model->image_url = $path;
			if($model->save()){
         $fileImage->saveAs($path);
         $idNewBook=$model->id;
         
//         CategoryBook::model()->deleteAll('book_id=:book_id', array(":book_id"=>$idNewBook)); //ovaa kaj update da se prefrle
         foreach ($idNaKategorii as $idNaKategorija){
           $novZapis=new CategoryBook; //kreirame nov zapis od tabelata CategoryBOOK
           $novZapis->book_id=$idNewBook;
           $novZapis->category_id=$idNaKategorija;
           $novZapis->save();
         }
				$this->redirect(array('view','id'=>$model->id));
      }
		}

		$this->render('create',array(
			'model'=>$model,
      'iminjakorisnici'=>$user_names,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
  	$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
       $users = User::model()->findAll();
foreach($users as $user){
       $user_names[$user->id]=$user->name;
       
     }
     
		if(isset($_POST['Book']))
		{
      $_POST['Book']['image_url'] = $model->image_url;
      $idNaKategorii=$_POST['chbox'];
      $model->attributes=$_POST['Book'];
      $fileImage=CUploadedFile::getInstance($model,'image_url');
       if(!is_null($fileImage)){
         $path = 'images/upload/'.time().$fileImage;
          $model->image_url = $path;
       }

      
      if($model->save()){
        // dokolku uspesno e zacuvan objektot vo baza togas so SaveAs se zacuvuva slikata na server
        if(!empty($fileImage)){
          
          $fileImage->saveAs($path);
        }
        
         $idNewBook=$model->id;
          CategoryBook::model()->deleteAll('book_id=:book_id', array(":book_id"=>$idNewBook)); //ovaa kaj update da se prefrle
         foreach ($idNaKategorii as $idNaKategorija){
           $novZapis=new CategoryBook; //kreirame nov zapis od tabelata CategoryBOOK
           $novZapis->book_id=$idNewBook;
           $novZapis->category_id=$idNaKategorija;
           $novZapis->save();
         }
				$this->redirect(array('view','id'=>$model->id));
      }
   	}

		$this->render('update',array(
			'model'=>$model,
      'iminjakorisnici'=>$user_names,
      
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Book');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Book('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Book']))
			$model->attributes=$_GET['Book'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Book the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Book::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Book $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='book-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
  
   public function actionKnigikorisnik()
	{
     $users = User::model()->findAll();
     $id_users = array();
     $user_names=array();
     foreach($users as $user){
       $id_users[] = $user->id;
       $user_names[$user->id]=$user->name;
     }
    if (isset($_POST['userid'])){
      $id=$_POST['userid'];
      $books=Book::model()->findAll('user_id = :user_id', array(':user_id'=>$id ) );
    }
    else
    {
       $id=NULL;
    $books=NULL;
    }
    
		$this->render('knigikorisnik',array(
			'knigi'=>$books,
      'iduser'=>$id,
      'idja' => $id_users,
      'iminja'=>$user_names,
		));
    
    
 
	}
  
   public function actionListaknigi()
	{
     $this->layout='//layouts/main';
      $books=Book::model()->findAll( ); 
    		$this->render('listaknigi',array(
			'knigi'=>$books,
   ));
    
    
 
	}
  
   public function actionKnigikategorija($id)
	{
      
    $kategorija=Category::model()->findByPk($id);
    $books=$kategorija->books;
		$this->render('knigikategorija',array(
			'knigi'=>$books,
      'kategorija'=>$kategorija,
      
		));
    
    
 
	}
  
  public function actionStarnumber(){
    
     if(isset($_POST['rate'])&& (!Book::model()->checkCoockieExists($_POST['id']))){
       $values_cookie=Book::model()->getCookieArray();
       array_push($values_cookie, $_POST['id']);
       $cookie_string=serialize($values_cookie);
       $cookie = new CHttpCookie('ratingcookie', $cookie_string); //kreiranje novo cookie
       $cookie->expire = time()+60*60*24*180;
       Yii::app()->request->cookies['ratingcookie'] = $cookie;
       
       
       $novrating = new Ratings(); //kreirame nov zapis od tabelata Ratings
       $novrating->star_number=$_POST['rate'];
       $novrating->book_id=$_POST['id'];
       if($novrating->save()){
         $updatedAverage=Book::model()->getRating($_POST['id']);
         echo json_encode(array('msg'=>'Uspeshno glasanje', 'updatedAverage'=>$updatedAverage));
       }else{
         echo json_encode(array('msg'=>'!Uspeshno glasanje'));
       }
        Yii::app()->end();
      
    }
 else {
      echo json_encode(array('msg'=>'Imate glasano'));
    }
   
  }
  
public function actionCreatereview()
	{
		$review=new Review;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Review']))
		{
			$review->attributes=$_POST['Review'];
			if($review->save())
				$this->redirect(array('view','id'=>$review->id));
		}

		$this->render('view',array(
			'review'=>$review,
		));
	}
  
    
}
