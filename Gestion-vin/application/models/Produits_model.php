<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produits_model extends CI_Model {

    public function __construct() {
        parent::__construct(); 
        $this->load->database();
    }

    // Récupère tous les produits
    public function get_all_produits() {
        return $this->db->get('produits')->result(); // Renvoie un tableau d'objets de produits
    }

    // Récupère un produit spécifique par ID
    public function get_produit($id) {
        return $this->db->get_where('produits', ['Id_Produit' => $id])->row(); // Renvoie un objet produit
    }

    // Insère un nouveau produit dans la base de données
    public function insert_produit($data) {
        return $this->db->insert('produits', $data); // Insère les données du produit
    }

    // Met à jour un produit existant par ID
    public function update_produit($id, $data) {
        return $this->db->update('produits', $data, ['Id_Produit' => $id]); // Met à jour le produit avec les nouvelles données
    }

    // Supprime un produit par ID
    public function delete_produit($id) {
        return $this->db->delete('produits', ['Id_Produit' => $id]); // Supprime le produit spécifié
    }
}
?>
