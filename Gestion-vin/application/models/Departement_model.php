<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement_model extends CI_Model {

    public function get_all_departement() {
        return $this->db->get('departement ')->result();
    }

    public function get_departement($id) {
        return $this->db->get_where('departement ', ['id_departement' => $id])->row();
    }

    public function insert_departement($data) {
        return $this->db->insert('departement ', $data);
    }

    public function update_departement($id, $data) {
        return $this->db->update('departement ', $data, ['id_departement' => $id]);
    }

    public function delete_departement($id) {
        return $this->db->delete('departement ', ['id_departement' => $id]);
    }
}
?>
