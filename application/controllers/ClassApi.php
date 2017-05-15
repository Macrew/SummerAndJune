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
class ClassApi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('ClassApi_Model'); 
    }
	/*
	*
	*	Add Class by Instructor
	*
	*/
    public function addClass_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Update Class by Instructor
	*
	*/
    public function updateClass_post()
    {
          /* code goes here */
    }
	

	/*
	*
	*	Delete a by an Instructor
	*
	*/
    public function deleteClassByInstructor_delete()
    {
          /* code goes here */
    }
	
	/*
	*
	*	Search class by Student
	*
	*/
    public function searchClassByStudent_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Join a class by Student
	*
	*/
    public function joinClassByStudent_post()
    {
         /* code goes here */
    }
	/*
	*
	*	Cancel a class by Instructor
	*
	*/
    public function cancelClassByInstructor_post()
    {
         /* code goes here */
    }
	/*
	*
	*	Cancel a class by Student
	*
	*/
    public function cancelClassByStudent_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Start Class by an Instructor
	*
	*/
    public function startClassByInstructor_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	End Class by an Instructor
	*
	*/
    public function endClassByInstructor_post()
    {
          /* code goes here */
    }
	
	/*
	*
	*	Set Payment after complete class by Instructor
	*
	*/
    public function setClassPaymentByInstructor_post()
    {
         /* code goes here */
    }

}
