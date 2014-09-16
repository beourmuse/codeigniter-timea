<?php

class Page extends CI_Model {

    // Constructor is optional
    // Only needed if you want to load a resource globally
    function __construct()
    {
        // REQUIRED! Without this we destroy the parent model class
        parent::__construct();

        // Connect to DB
    	$this->load->database();
    }

    // Function to get page data
    public function getPageData( $pageName ) {

    	// Select from table where Page_Name = $pageName
        // get where:
        // arg1 = name of table
        // arg2 = array with keys as column names, and values as value to look for
    	$query = $this->db->get_where('pages', ['Page_Name'=>$pageName]);

    	// Return the result as an associative array
    	return $query->row_array();

    }
}