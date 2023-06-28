<?php if(!defined('BASEPATH'))  exit('No direct script access allowed');
class accueilModel extends CI_Model
{
    public function getTousLesProduitsParSousCategorieProduit($nomcategorieproduit)
    {
        if ($nomcategorieproduit == null) {
            $sql = "select * from viewTousLesProduitsParSousCategorieProduit";
        } else {
            $sql = "select * from viewTousLesProduitsParSousCategorieProduit where nomcategorieproduit = " + $nomcategorieproduit;
        }
        $result = $this->db->query($sql);
        $response = array();
        foreach ($result->result_array() as $row) {
            $response[] = $row;
        }
        return $response;
    }
    public function getToutesLesPhotosParIdsouscategorieProduit($idsouscategorieproduit)
    {
        if ($idsouscategorieproduit == 0) {
            $sql = "select * from photoProduit";
        } else {
            $sql = "select * from photoProduit where idSousCategorieProduit = " + $idsouscategorieproduit;
        }
        $result = $this->db->query($sql);
        $response = array();
        foreach ($result->result_array() as $row) {
            $response[] = $row;
        }
        return $response;
    }
    public function getTousLesProduits()
    {
        $sql = "select * from produit"; 
        $result = $this->db->query($sql);
        $response = array();
        foreach ($result->result_array() as $row) {
            $response[] = $row;
        }
        return $response;
    }
    public function getCategorieProduitParProuduit($idProduit)
    {
        if ($idProduit == 0) {
            $sql = "select * from categorieProduit";
        } else {
            $sql = "select * from categorieProduit where idProduit = " + $idProduit; 
        }
        $result = $this->db->query($sql);
        $response = array();
        foreach ($result->result_array() as $row) {
            $response[] = $row;
        }
        return $response;
    }
}
