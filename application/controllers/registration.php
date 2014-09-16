<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	// Constructor
	public function __construct() {

		// remember to call the parent constructor!!!
		parent::__construct();

		// Library to help with validation of form
		$this->load->library('form_validation');

	}

	// Index method runs automatically if no other method is called
	public function index() {

		// Form helper
		$this->load->helper('form');


		// Rules for validation
		// Set rule for usename
		// arg1 = name of form element
		// arg2 = Part of Error Message
		// arg3 = list of validation steps separated by pipes. First to last
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[40]|callback_usernameCheck|is_unique[users.Username]|alpha_dash');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[60]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[8]|max_length[60]|matches[password]');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');

		// Get page data
		$pageData = $this->page->getPageData('registration');

		// Header
		$this->load->view('templates/header', $pageData);

		// Run the validation process
		// If FALSE is returned then validation failed
		if ($this->form_validation->run() == FALSE)
		{
			// Show registration form again
			$this->load->view('registration');
		}
		else
		{
			// Load the model
			$this->load->model('Registration_Model');

			// Do registration
			$this->Registration_Model->registerAccount();

			//$this->load->view('formsuccess');
			echo 'success';
		}

		// Footer
		$this->load->view('templates/footer');

	}

	public function usernameCheck( $value ) {

		// Check if the username is 'admin'
		if( $value == 'admin' ) {

			// Validation failed
			// Prepare message and return false
			$this->form_validation->set_message('usernameCheck', 'Did you seriously think that "admin" is an unused account?');
			return false;

		} else {

			// Validation passed
			// return true
			return true;

		}

		}


	}

