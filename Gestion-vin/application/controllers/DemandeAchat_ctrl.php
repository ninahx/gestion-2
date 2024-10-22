<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DemandeAchat_ctrl extends CI_Controller {
    public function __construct() {
        parent::__construct();
 
        $this->load->model('DemandeAchat_model'); 
    }

    public function index() {
        $data['demandes'] = $this->DemandeAchat_model->get_all_demandes(); 
        $this->load->view('demandeliste', $data); // Load the view with the demandes data
    }

  

}
