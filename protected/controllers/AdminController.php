<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AdminController extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/website',
	 * meaning using a single column layout. See 'protected/views/layouts/website.php'.
	 */
	public $layout='//layouts/admin';

	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		$rules[] = array(
			'allow', // allow admin user to perform all actions
            // 'expression'=>'Yii::app()->user->getState("role") == "admin"',
			'users'=>array('@'),
		);

		$rules[] = array(
			'deny',  // deny all users
			'users'=>array('*'),
		);

		return $rules;
	}	

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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $this->redirect(array('site/login'));                                    
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
				$this->render('pages-404-error', $error);
		}
	}

	public function actionForms(){
    	Yii::app()->session['menu']="forms";
		$this->render('forms');
	}
	
	public function actionUploadFormImages(){
		$result1 = $this->upload('form_image_input','./uploads/forms','jpg,jpeg,png,gif');
		$result2 = $this->upload('post_image_input','./uploads/posts','jpg,jpeg,png,gif');

		if( empty($result1[1]) && empty($result2[1]) ){
			echo json_encode(array('done',$result1[0],$result2[0]));
		}else{
			if( !empty($result1[1]) ){
				echo json_encode(array('done',"",$result2[0]));
			}elseif( !empty($result2[1]) ){
				echo json_encode(array('error',$result2[1]));
			}
		}
	}
	function upload($file_id, $folder="", $types="") {
	    if(!$_FILES[$file_id]['name']) return array('','No file specified');

	    $file_title = $_FILES[$file_id]['name'];
	    //Get file extension
	    $ext_arr = explode(".",basename($file_title));
	    $ext = strtolower($ext_arr[count($ext_arr)-1]); //Get the last extension

	    $all_types = explode(",",strtolower($types));
	    if($types) {
	        if(in_array($ext,$all_types));
	        else {
	            $result = "'".$_FILES[$file_id]['name']."' is not a valid file."; //Show error if any.
	            return array('',$result);
	        }
	    }

	    //Not really uniqe - but for all practical reasons, it is
	    $uniqer = substr(md5(uniqid(rand(),1)),0,5);
	    $file_name = $uniqer . '_' . $file_title;//Get Unique Name

	    //Where the file must be uploaded to
	    if($folder) $folder .= '/';//Add a '/' at the end of the folder
	    $uploadfile = $folder . $file_name;

	    $result = '';
	    //Move the file from the stored location to the new location
	    if (!move_uploaded_file($_FILES[$file_id]['tmp_name'], $uploadfile)) {
	        $result = "Cannot upload the file '".$_FILES[$file_id]['name']."'"; //Show error if any.
	        if(!file_exists($folder)) {
	            $result .= " : Folder don't exist.";
	        } elseif(!is_writable($folder)) {
	            $result .= " : Folder not writable.";
	        } elseif(!is_writable($uploadfile)) {
	            $result .= " : File not writable.";
	        }
	        $file_name = '';
	        
	    } else {
	        if(!$_FILES[$file_id]['size']) { //Check if the file is made
	            @unlink($uploadfile);//Delete the Empty file
	            $file_name = '';
	            $result = "Empty file found - please use a valid file."; //Show the error message
	        } else {
	            chmod($uploadfile,0777);//Make it universally writable.
	        }
	    }

	    return array($file_name,$result);
	}

	public function actionSaveInteractivePost(){

		$form = new Forms;
		$form->background_img = $_POST['background_img'];
		$form->title1 = $_POST['title1'];
		$form->title2 = $_POST['title2'];
		$form->button1_lbl = $_POST['button1_lbl'];
		$form->button1_img = $_POST['button1_img'];
		$form->title3 = $_POST['title3'];
		$form->button2_lbl = $_POST['button2_lbl'];
		$form->button2_img = $_POST['button2_img'];
		$form->video = $_POST['video'];
		$form->post_text = $_POST['post_text'];
		$form->post_image = $_POST['post_image'];

		if( $form->save() ){
			$url = str_replace("http://", "https://", Yii::app()->getBaseUrl(true).'/index.php?r=site/form&id='. $form->id);
			echo $url;
		}else{
			echo "error: ".print_r($form->getErrors());
		}
	}

	public function actionProfile(){
    	Yii::app()->session['menu']="profile";

		if( (isset($_GET['username']) && $_GET['username'] != "") || 
			(isset($_GET['email']) && $_GET['email'] != "") || 
			((isset($_GET['password']) && $_GET['password'] != "") && (isset($_GET['password_confirmation']) && $_GET['password_confirmation'] != "")) ){

			$user = Users::model()->findByPk(Yii::app()->user->id);
	    	if( isset($_GET['username']) && $_GET['username'] != "" ){
				$user->username = $_GET['username'];
			}
			if( isset($_GET['email']) && $_GET['email'] != "" ){
				$user->email = $_GET['email'];
			}
			if( (isset($_GET['password']) && $_GET['password'] != "") && 
				(isset($_GET['password_confirmation']) && $_GET['password_confirmation'] != "") && 
				($_GET['password'] == $_GET['password_confirmation']) ){
				$user->password = $_GET['password'];
				$user->password_confirmation = $_GET['password'];
			}
			if( $user->save() ){				
		        $this->redirect(array('admin/profile'));                  
			}else{
    	print_r($user->getErrors());die();

			}
		}

		$user = Users::model()->findByPk(Yii::app()->user->id);
		$this->render('profile', array('username'=>$user['username'], 'email'=>$user['email']));
	}

}