<?php

class Registration_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    function registerAccount() {

        // Load the password hashing library
        require APPPATH.'libraries/password.php';


        // Hash the password
        $hashedPassword = password_hash( $this->input->post('password'), PASSWORD_BCRYPT );

    	// Prepare data for database
    	$data = [
    		'Username' 	=> $this->input->post('username'),
    		'Password' 	=> $hashedPassword,
    		'Email'		=> $this->input->post('email')
    	];

    	// Insert into DB
    	$this->db->insert('users', $data);

    }
}