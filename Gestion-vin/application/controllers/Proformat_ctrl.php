<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Proformat_ctrl extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Proformat_model'); // Load the model
    }

    public function index() {
        $this->load->view('proformat');
    }

    public function liste() {
        $data['proformats'] = $this->Proformat_model->get_all_proformats(); // Retrieve proformats
        $this->load->view('listeProformat', $data); // Pass data to the view
    }

    public function reject_proformat($id_proformat) {
        // Call the model method to reject the proformat
        if ($this->Proformat_model->reject_proformat($id_proformat)) {
            $this->session->set_flashdata('success', 'Proformat rejeté avec succès.'); // Success message
        } else {
            // Handle error (e.g., show an error message)
            $this->session->set_flashdata('error', 'Erreur lors du rejet du proformat.'); // Error message
        }
        redirect('proformat_ctrl/liste'); // Redirect to the list page
    }
}

?>