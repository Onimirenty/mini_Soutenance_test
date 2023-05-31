<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function produit()
    {
        $query = $this->db->get('v_produitsouscategorie');
        $data['produits'] = $query->result();
        $this->load->view('produit', $data);
    }        
}
