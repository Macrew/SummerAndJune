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
			$this->load->view('header');
			$this->load->view('instructor_dashboard');
			$this->load->view('footer');
		}
		else
		{
			redirect(base_url(),'refresh');
		}
    }
	
	/*
	*
	*	Edit Profile page for Instructor
	*
	*/
	public function editProfile()
    {
		$user_session = $this->session->userdata('logged_in');
		$this->load->view('header');
        $this->load->view('instructor_profile');
		$this->load->view('footer');
	}
	
	/*
	*
	*	Show all classes page for Instructor
	*
	*/
	public function classes()
    {
		$user_session = $this->session->userdata('logged_in');
		$this->load->view('header');
        $this->load->view('instructor_classes');
		$this->load->view('footer');
	}
	/*
	*
	*	Add Class page for Instructor
	*
	*/
	public function addClass()
    {
		$user_session = $this->session->userdata('logged_in');
		$this->load->view('header');
        $this->load->view('add_class');
		$this->load->view('footer');
	}
	
	/*
	*
	*	Edit Messages page for Instructor
	*
	*/
	public function messages()
    {
		$user_session = $this->session->userdata('logged_in');
		$this->load->view('header');
        $this->load->view('instructor_messages');
		$this->load->view('footer');
	}
	
	/*
	*
	*	Settings page for Instructor
	*
	*/
	public function settings()
    {
		$user_session = $this->session->userdata('logged_in');
		$this->load->view('header');
        $this->load->view('instructor_settings');
		$this->load->view('footer');
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
