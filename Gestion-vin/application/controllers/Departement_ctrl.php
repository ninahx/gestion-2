<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement_ctrl extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Departement_model'); 
		$this->load->model('DemandeAchat_model'); 
		
    }
	public function index()
	{
		$data['departements'] = $this->Departement_model->get_all_departement(); 
        $this->load->view('form_demande', $data); // Charge la vue pour le formulaire
	
	}
	public function insertDemande() {
        // Récupérer les données du formulaire
        $demande_data = array(
            'datededemande' => $this->input->post('dateTime'),
            'iddepartement' => $this->input->post('IdDepartement'),
            'etat_validation' => 1
        );

        // Insérer la demande d'achat et obtenir son ID
        $id_demande = $this->DemandeAchat_model->insert_demande($demande_data);

        // Préparer les détails de la demande
        $details = array();
        $produits = $this->input->post('produit');
        $quantites = $this->input->post('quantite');

        for ($i = 0; $i < count($produits); $i++) {
            $details[] = array(
                'iddemandeachat' => $id_demande,
                'idproduit' => $produits[$i],
                'qte' => $quantites[$i]
            );
        }

        if ($this->DemandeAchat_model->insert_details($details)) {
            $data['departements'] = $this->Departement_model->get_all_departement(); 
            $data['succes'] = "dgfdg";
            $this->load->view('form_demande', $data);
        } else {
            show_error('Une erreur s\'est produite lors de l\'insertion des détails.');
        }
    }
}
