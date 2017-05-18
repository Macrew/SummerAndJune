<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
	'social_profile_id' => $result->social_profile_id,
	'user_role' => $user_role,
	'email' => $result->email,
	'first_name' => $result->first_name,
	'last_name' => $result->last_name,
 */
class Instructor extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->helper('url'); 
		$this->load->database(); 
		$this->load->model('Common_Model');
		//$this->load->model('StudentApi_model'); 
    }
	
	/*
	*
	*	Instructor Dashboard
	*
	*/
	 public function dashboard()
    {
       /*  $url = 'http://macrew.info/summerandjune/dev/example/users';
		$result = curlGet($url);
		echo '<pre>'; print_r(json_decode($result, true)); */
		$user_session = $this->session->userdata('logged_in');
		
		if(isset($user_session) && $user_session['user_role'] == 1){
			$socialProfileId = $user_session['social_profile_id'];
			$userId = $user_session['user_id'];
			$accountStatus = $this->Common_Model->getValue('sj_users','id','status',$userId);
			if($accountStatus == 0)
			{
				$this->load->view('header');
				$this->load->view('instructor_dashboard');
				$this->load->view('footer');
			}
			else
			{
				redirect('instructor/activateaccount','refresh');
			}
			
		}
		else
		{
			redirect(base_url(),'refresh');
		}
    }
	
	/*
	*
	*	Activate account by set all data for Instructor
	*
	*/
	public function activateAccount()
    {
		$user_session = $this->session->userdata('logged_in');
		$data['user_session'] = $user_session;
		 // echo '<pre>'; print_r($user_session); die;
		 if(isset($user_session) && $user_session['user_role'] == 1){
			$userId = $user_session['user_id'];
			$profileImageUrl = $this->Common_Model->getUsermeta($userId, 'user_profile_image');
			$explodeUrl = explode('sz=', $profileImageUrl->meta_value);
			$imageUrl = $explodeUrl[0].'sz=200';
			$data['profile_image_url'] = $profileImageUrl->meta_value;
			
			//get logged in User data by instructorAllDetails API 
			$url = base_url().'/instructorApi/instructorAllDetails/id/'.$userId;
			$result = curlGet($url);
			$getUserData = json_decode($result, true);
			$data['user_data'] = $getUserData;
			$data['experience'] = $this->getExperienceInstructor();
			$data['education'] = $this->getEducationInstructor();
			$this->load->view('header');
			$this->load->view('instructor_account_activation', $data);
			$this->load->view('footer');
		 }
		 else
		{
			redirect(base_url(),'refresh');
		}
	}
	/*
	*
	*	Get all Experience for Instructor
	*
	*/
    public function getExperienceInstructor()
    {
		$user_session = $this->session->userdata('logged_in');
		$data['user_session'] = $user_session;
		$userId = $user_session['user_id'];
         //get logged in User data by instructorAllDetails API 
		$url = base_url().'/instructorApi/getExperienceInstructor/id/'.$userId;
		$result = curlGet($url);
		$getUserData = json_decode($result, true);
		return $getUserData;
    }
	
	/*
	*
	*	Get all Education for Instructor
	*
	*/
    public function getEducationInstructor()
    {
        $user_session = $this->session->userdata('logged_in');
		$data['user_session'] = $user_session;
		$userId = $user_session['user_id'];
         //get logged in User data by instructorAllDetails API 
		$url = base_url().'/instructorApi/getEducationInstructor/id/'.$userId;
		$result = curlGet($url);
		$getUserData = json_decode($result, true);
		return $getUserData;
    }
	
	
	/*
	*
	*	Edit Profile page for Instructor
	*
	*/
	public function editProfile()
    {
		
		//Get profile form data
		$user_id 		= $this->input->post('user_id');
		$firstName 		= $this->input->post('fname');
		$middleName 	= $this->input->post('mname');
		$lastName 		= $this->input->post('lname');
		$phone 			= $this->input->post('phone');
		$address1 		= $this->input->post('address1');
		$address2 		= $this->input->post('address2');
		$state 			= $this->input->post('state');
		$country 		= $this->input->post('country');
		$zip 			= $this->input->post('zip');
		$experience 	= $this->input->post('experience');
		$exp_start_date = $this->input->post('exp_start_date');
		$exp_end_date 	= $this->input->post('exp_end_date');
		$certificate 	= $this->input->post('certificate');
		$exprowid 		= $this->input->post('exprowid');
		
		$education 		= $this->input->post('education');
		$edu_start_date = $this->input->post('edu_start_date');
		$edu_end_date 	= $this->input->post('edu_end_date');
		$edurowid 	= $this->input->post('edurowid');
		$expCount =  count($experience);
		
		for ($x = 0; $x < $expCount; $x++) {
			
			if($exprowid[$x] == 0)
			{
				$expArray = array(
					'instructor_id'=>$user_id,
					'type'=>0,
					'Name'=>$experience[$x],
					'start_date'=>$exp_start_date[$x],
					'end_date'=>$exp_end_date[$x],
					'certificate'=>$certificate[$x],
					'certificate_image'=>$certificate[$x]
			
				);
				$this->Common_Model->insert('sj_instructor_exp_edu',$expArray);
			}
			else
			{
				$expArray = array(
					'Name'=>$experience[$x],
					'start_date'=>$exp_start_date[$x],
					'end_date'=>$exp_end_date[$x],
					'certificate'=>$certificate[$x],
					'certificate_image'=>$certificate[$x]
			
				);
				$rid = $exprowid[$x];
				$this->Common_Model->update('sj_instructor_exp_edu',$expArray, array('id'=>$rid));
			}
			
		}
		
		$eduCount =  count($education);
		for ($n = 0; $n < $eduCount; $n++) {
			
			if($edurowid[$n] == 0)
			{
				$eduArray = array(
					'instructor_id'=>$user_id,
					'type'=>1,
					'Name'=>$education[$n],
					'start_date'=>$edu_start_date[$n],
					'end_date'=>$edu_end_date[$n]
				);
				$this->Common_Model->insert('sj_instructor_exp_edu',$eduArray);
			}
			else
			{
				$eduArray = array(
					'Name'=>$education[$n],
					'start_date'=>$edu_start_date[$n],
					'end_date'=>$edu_end_date[$n]
				);
				$rowid = $edurowid[$n];
				$this->Common_Model->update('sj_instructor_exp_edu',$eduArray, array('id'=>$rowid));
			}
			
		}
		
		
		$user_session 	= $this->session->userdata('logged_in');
		$userId 		= $user_session['user_id']; //get logged in user id from session
		$data = array(
			'first_name' 	=> $firstName,
			'middle_name' 	=> $middleName,
			'last_name' 	=> $lastName,
			'phone' 		=> $phone,
			'address_1' 	=> $address1,
			'address_2' 	=> $address2,
			'state' 		=> $state,
			'country' 		=> $country,
			'zip' 			=> $zip,
			'userId' 		=> $userId,
			);
			//Save data into database using API
		$url = base_url().'/instructorApi/saveInstructorBasicInfo';
		$result = curlPost($url,$data);
		$data['user_session'] = $user_session;
		$this->load->view('header');
        $this->load->view('instructor_profile', $data);
		$this->load->view('footer');
	}
	
	/*
	*
	*	Show all classes page for Instructor
	*
	*/
	public function classes()
    {
		$data['user_session'] = $this->session->userdata('logged_in');
		$this->load->view('header');
        $this->load->view('instructor_classes',$data);
		$this->load->view('footer');
	}
	/*
	*
	*	Add Class page for Instructor
	*
	*/
	public function addClass()
    {
		$data['user_session'] = $this->session->userdata('logged_in');
		$this->load->view('header');
        $this->load->view('add_class', $data);
		$this->load->view('footer');
	}
	
	/*
	*
	*	Save Class
	*
	*/
	public function addClassSubmit()
    {
		//echo '<pre>'; print_r($this->input->post()); die('here');
		$data = $this->input->post();
		$url = base_url().'/classApi/addClass';
		$result = curlPost($url,$data);
		
		$this->load->view('header');
        $this->load->view('add_class', $data);
		$this->load->view('footer');
	}
	
	/*
	*
	*	Edit Messages page for Instructor
	*
	*/
	public function messages()
    {
		$data['user_session'] = $this->session->userdata('logged_in');
		$this->load->view('header');
        $this->load->view('instructor_messages',$data);
		$this->load->view('footer');
	}
	
	/*
	*
	*	Settings page for Instructor
	*
	*/
	public function settings()
    {
		$data['user_session'] = $this->session->userdata('logged_in');
		$this->load->view('header');
        $this->load->view('instructor_settings', $data);
		$this->load->view('footer');
	}
	
	/*
	*
	*	Upload profile image for Instructor
	*
	*/
	public function uploadImage()
	{
		$user_session = $this->session->userdata('logged_in');
		$userId = $user_session['user_id'];
		$target_dir = DOCUMENT_ROOT . "assets/images/profile/"; //constant declare in  constant.php in config folder

		$target_file = $target_dir . basename($_FILES["user_img"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		
			$check = getimagesize($_FILES["user_img"]["tmp_name"]);
			if($check !== false) {
				$return['msg'] = "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$return['msg'] = "File is not an image.";
				$uploadOk = 0;
			}
	
		// Check file size
		if ($_FILES["user_img"]["size"] > 10000000) {
			$return['msg'] =  "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		
		$imageFileType = strtolower($imageFileType);
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			$return['msg'] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		
			if($imageFileType=="jpg" || $imageFileType=="jpeg" )
			{
				$uploadedfile = $_FILES["user_img"]["tmp_name"];
				$src = imagecreatefromjpeg($uploadedfile);
            }else if($imageFileType=="png")
			{
				$uploadedfile = $_FILES["user_img"]["tmp_name"];
				$src = imagecreatefrompng($uploadedfile);
            }else
			{
				$uploadedfile = $_FILES["user_img"]["tmp_name"];
				$src = imagecreatefromgif($uploadedfile);
            }
			list($width,$height)=getimagesize($uploadedfile);

			$newwidth=450;
			$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);
			imagejpeg($tmp,$target_file,100); //file name also indicates the folder where to save it to
			imagedestroy($src);
			imagedestroy($tmp);
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$return['type'] = 'fail';
			// if everything is ok, try to upload file
			} 
			else 
			{
				$url = base_url().'/instructorApi/uploadImage';
				$fileUrl = base_url().'assets/images/profile/'.$_FILES["user_img"]["name"];
				$params = array('key'=>'user_profile_image','fileUrl'=>$fileUrl,'userId'=>$userId);
				$result = curlPost($url,$params);
				$return['msg'] =  $_FILES["user_img"]["name"];
				//$return['result'] = $result;
				$return['type'] = 'success';
			}
		echo json_encode($return);
	}
	
	/*
	*
	*	Upload certificate image for Instructor
	*
	*/
	public function uploadCertificateImage()
	{
		$user_session = $this->session->userdata('logged_in');
		$userId = $user_session['user_id'];
		$target_dir = DOCUMENT_ROOT . "assets/images/certificate/"; //constant declare in  constant.php in config folder
		//echo '<pre>'; print_r($_FILES); die('yes');
		$target_file = $target_dir . basename($_FILES["certificate_image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		
			$check = getimagesize($_FILES["certificate_image"]["tmp_name"]);
			if($check !== false) {
				$return['msg'] = "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$return['msg'] = "File is not an image.";
				$uploadOk = 0;
			}
	
		// Check file size
		if ($_FILES["certificate_image"]["size"] > 10000000) {
			$return['msg'] =  "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		
		$imageFileType = strtolower($imageFileType);
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			$return['msg'] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		
			if($imageFileType=="jpg" || $imageFileType=="jpeg" )
			{
				$uploadedfile = $_FILES["certificate_image"]["tmp_name"];
				$src = imagecreatefromjpeg($uploadedfile);
            }else if($imageFileType=="png")
			{
				$uploadedfile = $_FILES["certificate_image"]["tmp_name"];
				$src = imagecreatefrompng($uploadedfile);
            }else
			{
				$uploadedfile = $_FILES["certificate_image"]["tmp_name"];
				$src = imagecreatefromgif($uploadedfile);
            }
			list($width,$height)=getimagesize($uploadedfile);

			$newwidth=450;
			$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);
			imagejpeg($tmp,$target_file,100); //file name also indicates the folder where to save it to
			imagedestroy($src);
			imagedestroy($tmp);
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$return['type'] = 'fail';
			// if everything is ok, try to upload file
			}
			
		echo json_encode($return);
	}
	
	
	
    public function getData()
    {
        $url = 'http://macrew.info/summerandjune/dev/example/users';
		$result = curlGet($url);
		echo '<pre>'; print_r(json_decode($result, true));
    }
	
	public function postData()
    {
        $url = 'http://macrew.info/summerandjune/dev/example/users';
		$params = array('name'=>'Mam','email'=>'manoj@gmail.com');
		$result = curlPost($url,$params);
		echo '<pre>'; print_r(json_decode($result, true));
    }
	
	public function deleteData()
    {
        $url = 'http://macrew.info/summerandjune/dev/example/users/id/';
		$id = 7;
		$params = array('name'=>'Mam','email'=>'manoj@gmail.com');
		$result = curlDelete($url,$id);
		echo '<pre>'; print_r($result);
    }
}
