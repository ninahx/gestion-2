<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Proformat_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function update_etat($id_proformat, $id_etat_validation) {
        // Update the proformat with the provided state ID
        $this->db->set('etat_validation', $id_etat_validation); // Set to the desired state
        $this->db->where('id_proformat', $id_proformat);
        return $this->db->update('proformat'); // Update the proformat table
    }

    public function reject_proformat($id_proformat) {
        // Get the ID for the state where nom_etat = 'Rejeté'
        $this->db->select('id_etat_validation');
        $this->db->where('nom_etat', 'Rejeté'); // Condition to find the ID
        $query = $this->db->get('etat_validation');
    
        if ($query->num_rows() > 0) {
            // (Your existing code...)
    
            if ($this->db->update('proformat')) {
                $this->session->set_flashdata('success', 'Proformat rejeté avec succès.');
                return true; // Return true on success
            } else {
                $this->session->set_flashdata('error', 'Erreur lors de la mise à jour du proformat.');
                return false;
            }
        } else {
            $this->session->set_flashdata('error', 'L\'état de validation "Rejeté" est introuvable.');
            return false;
        }
    }
    

    public function get_all_proformats() {
        $query = $this->db->query("
            SELECT 
                p.id_proformat,
                p.date_du_proformat,
                p.description,
                p.nom,
                ev.nom_etat AS etat_validation  -- Join to get the name of the validation state
            FROM 
                proformat p
            LEFT JOIN 
                etat_validation ev ON p.etat_validation = ev.id_etat_validation
        ");
        
        return $query->result_array(); // Returns results as an associative array
    }

    public function get_proformat_details($id_proformat) {
        $query = $this->db->query("
            SELECT 
                dp.id AS id_detail,  -- Change to match the actual column name
                pr.nom AS produit,
                dp.quantite_commandee AS quantite,  -- Match the actual column name
                dp.prix_unitaire AS prix  -- Match the actual column name
            FROM 
                details_proformat dp
            LEFT JOIN 
                produits pr ON pr.id_produit = dp.id_produit
            WHERE 
                dp.id_proformat = ?
        ", array($id_proformat));
        
        return $query->result_array(); // Returns details as an associative array
    }
}

?>