<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview();
    }
	
    public function index() {
	    $this->load->view('import');	
	  
	}
	 
	 
	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */