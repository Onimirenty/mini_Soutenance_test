<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProduitController extends CI_Controller
{

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
    public function deletion()
    {
        $this->load->model('DaoModel');
        $dato = $this->input->post('data');
        $dato = trim($dato, "\"");
        $dato = stripslashes($dato);
        $idtab = json_decode($dato, true);

        if (isset($idtab['idProduit'], $idtab['idCategorieProduit'], $idtab['idSousCategorieProduit'])) {
            $idProduit = $idtab['idProduit'];
            $idCategorieProduit = $idtab['idCategorieProduit'];
            $idSousCategorieProduit = $idtab['idSousCategorieProduit'];
            $idPhoto =$idtab["idPhotoProduit"];
            $this->DaoModel->deleteRowByIdPlus("photoproduit","photoproduit",$idPhoto);
            $this->DaoModel->deleteRowByIdPlus("souscategorieproduit","souscategorieproduit", $idSousCategorieProduit);
            $this->DaoModel->deleteRowByIdPlus("categorieproduit","categorieproduit", $idCategorieProduit);
            $this->DaoModel->deleteRowByIdPlus("produit","produit", $idProduit);

            $query = $this->DaoModel->query('SELECT * FROM v_produitsouscategorie');
            $data['produits'] = $query;
            $this->load->view('produit', $data);
        } else {
            echo "UwU";
            $this->DaoModel->showTabContentAsError($dato);
        }
    }


    public function modification()
    {

    }
}