<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personnel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Personnel_model');
        $this->load->helper('url');
    }

    // Méthode par défaut qui affiche le formulaire
    public function index() {
        $this->load->view('create-personnel');
    }

    // Méthode pour gérer l'affichage du formulaire (optionnelle, peut être combinée avec index)
    public function form_personnel() {
        $this->load->view('create-personnel');
    }
}
?>
