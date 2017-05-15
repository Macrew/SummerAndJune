<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

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
class InstructorApi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('InstructorApi_Model'); 
    }
	
	/*
	*
	*	Student Login
	*
	*/
	
    public function instructorLogin()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Student Signup
	*
	*/
    public function instructorSignup()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Save Instructor Basic Info
	*
	*/
    public function saveInstructorBasicInfo_post()
    {
         /* code goes here */
    }
	/*
	*
	*	Update Instructor Basic Info
	*
	*/
    public function updateInstructorBasicInfo_post()
    {
         /* code goes here */
    }

	/*
	*
	*	Save Instructor's Credit Card Details
	*
	*/
    public function saveInstructorPaypalDetails_post()
    {
         /* code goes here */
    }

	/*
	*
	*	Update Instructor's Credit Card Details
	*
	*/
    public function updateInstructorPaypalDetails_post()
    {
          /* code goes here */
    }
	
	/*
	*
	*	Verify Instructor's Credit Card Details
	*
	*/
    public function verifyInstructorPaypalDetails_post()
    {
         /* code goes here */
    }
	
	
	
	/*
	*
	*	Get all details for a Instructor
	*
	*/
    public function instructorAllDetails_get()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Get all Payment for Instructor by class
	*
	*/
    public function getAllPaymentForInstructor_get()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Get All Classes for an Instructor
	*
	*/
    public function getAllInstructorClasses_get()
    {
         /* code goes here */
    }
}
