<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoriqueProduitController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function historiqueProduit() {
        // Récupérer l'historique des matières premières
        $this->db->select('m.nom AS mouvement, mp.nommatierepremiere, hmp.date, hmp.quantite');
        $this->db->from('historiquematierepremiere hmp');
        $this->db->join('mouvement m', 'm.idmouvement = hmp.idmouvement');
        $this->db->join('matierepremiere mp', 'mp.idmatierepremiere = hmp.idmatierepremiere');
        $querymatierepremiere = $this->db->get();
        
        // Récupérer l'historique des sous-catégories de produits
        $this->db->select('m.nom AS mouvement, scp.nomsouscategorieproduit, hscp.date, hscp.quantite');
        $this->db->from('historiquesouscategorieproduit hscp');
        $this->db->join('mouvement m', 'm.idmouvement = hscp.idmouvement');
        $this->db->join('souscategorieproduit scp', 'scp.idsouscategorieproduit = hscp.idsouscategorieproduit');
        $querySouscategorieproduit = $this->db->get();
        
        // Charger la vue pour afficher l'historique des produits
        $data['historiquematierepremiere'] = $querymatierepremiere->result();
        $data['historiqueSouscategorieproduit'] = $querySouscategorieproduit->result();
        $this->load->view('historiqueProduit', $data);
    }
    public function index()
    {
        $this->load->model('HistoriqueProduitModel');
        $data['historiqueProduit'] = $this->HistoriqueProduitModel->getHistoriqueProduit();
        $this->load->view('historiqueProduit', $data);
    }
    
    public function ajouterHistorique()
    {
        if ($this->input->post()) {
            $data = array(
                'idMatierePremiere' => $this->input->post('id_matiere_premiere'),
                'date' => $this->input->post('date'),
                'quantite' => $this->input->post('quantite'),
                'idMouvement' => $this->input->post('id_mouvement')
            );
            $this->load->model('HistoriqueModel');
            $this->HistoriqueModel->insertHistorique($data);
            
            redirect('historiqueproduit');
        } else {
            $this->load->view('ajouterHistorique');
        }
    }

}
