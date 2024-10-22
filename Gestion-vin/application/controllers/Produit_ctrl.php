<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit_ctrl extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Produits_model');
    }
	public function index(){     
		$data['produits'] = $this->Produits_model->get_all_produits(); 
		$this->load->view('produits',$data);
	}
}
