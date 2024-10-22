<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DemandeAchat_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_demande($data) {

        $this->db->insert('demande_achat', $data);
        
        return $this->db->insert_id();
    }
    public function insert_details($details) {
        return $this->db->insert_batch('detaildemande', $details); 
    }

    // Function to list all 'demande achat'
    public function get_all_demandes() {
        // Selecting fields from demande_achat table and joining with Etat_Validation and Departement tables
        $this->db->select('da.id_demandeachat, da.datededemande, ev.nom_etat AS etat_validation, dep.nom AS nom_departement');
        $this->db->from('demande_achat da');
        $this->db->join('etat_validation ev', 'da.etat_validation = ev.id_etat_validation');
        $this->db->join('departement dep', 'da.iddepartement = dep.id_departement');
        $query = $this->db->get();

        // Return the result as an array of objects
        return $query->result();
    }

    
    
    
    



}
