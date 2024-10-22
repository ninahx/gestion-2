<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etat_validation_model extends CI_Model {

    public function get_all_etats() {
        return $this->db->get('Etat_Validation')->result();
    }

    public function get_etat($id) {
        return $this->db->get_where('Etat_Validation', ['Id_Etat_Validation' => $id])->row();
    }

    public function insert_etat($data) {
        return $this->db->insert('Etat_Validation', $data);
    }

    public function update_etat($id, $data) {
        return $this->db->update('Etat_Validation', $data, ['Id_Etat_Validation' => $id]);
    }

    public function delete_etat($id) {
        return $this->db->delete('Etat_Validation', ['Id_Etat_Validation' => $id]);
    }
}
?>
