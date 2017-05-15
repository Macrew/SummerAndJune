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
 */
class Student extends CI_Controller {

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
	*	Student Login
	*
	*/
	
	public function login(){

		$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        // $this->load->library('facebook', array(
            // 'appId' => '730357273809516',
            // 'secret' => '187a48b9bf3e2f910864b07d8d8aee04',
            // ));
		$user = $this->facebook->getUser();
        
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = site_url('welcome/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('login'), 
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->view('login',$data);

	}

    public function logout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        redirect('login');
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
