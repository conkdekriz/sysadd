<?php

class mdl_index extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');     
    }
    public function index(){
        
        
    }
}
?>
