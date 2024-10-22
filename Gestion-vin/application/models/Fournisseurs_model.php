<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fournisseurs_model extends CI_Model {

    public function get_all_fournisseurs() {
        return $this->db->get('Fournisseurs')->result();
    }

    public function get_fournisseur($id) {
        return $this->db->get_where('Fournisseurs', ['Id_Fournisseur' => $id])->row();
    }

    public function insert_fournisseur($data) {
        return $this->db->insert('Fournisseurs', $data);
    }

    public function update_fournisseur($id, $data) {
        return $this->db->update('Fournisseurs', $data, ['Id_Fournisseur' => $id]);
    }

    public function delete_fournisseur($id) {
        return $this->db->delete('Fournisseurs', ['Id_Fournisseur' => $id]);
    }
}
?>
