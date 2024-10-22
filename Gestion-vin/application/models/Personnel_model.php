<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personnel_model extends CI_Model {

    public function get_all_personnel() {
        return $this->db->get('Personnel')->result();
    }

    public function get_personnel($id) {
        return $this->db->get_where('Personnel', ['Id_Personnel' => $id])->row();
    }

    public function insert_personnel($data) {
        return $this->db->insert('Personnel', $data);
    }

    public function update_personnel($id, $data) {
        return $this->db->update('Personnel', $data, ['Id_Personnel' => $id]);
    }

    public function delete_personnel($id) {
        return $this->db->delete('Personnel', ['Id_Personnel' => $id]);
    }
}
?>
