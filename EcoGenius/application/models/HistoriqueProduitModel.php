<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoriqueProduitModel extends CI_Model {

    public function getHistoriqueProduit() {
        $query = $this->db->get('historiquematierepremiere');
        return $query->result();
    }
}
