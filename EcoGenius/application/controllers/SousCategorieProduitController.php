<?php
public class SousCategorieProduitController extends CI_Controller{
    public function index(){
        $this->load->model("sousCategorieProduit");
        $data['produit'] = $this->sousCategorieProduit->getAllCategorie();
        $data['content'] = "sousCategorieProduitView";
        $this->load->view('templates',$data);
    }
    public function formSousCategorieProduit(){
        $this->load->model("sousCategorieProduit");
        $data['categories'] = $this->sousCategorieProduit->getAllCategorie();
        $data['content'] = "sousCategorieProduitForm";
        $this->load->view('templates',$data);
    }
    public function insertSousCategorieProduit(){
        
        $nom=$this->input->get("nom");
        $categorie=$this->input->get("categorie");
        $description=$this->input->get("description");
        $prixUnitaire=$this->input->get("prixUnitaire");
        $photo=$this->input->get("photo");

        $this->load->model("sousCategorieProduit");
        $this->sousCategorieProduit->insertSousCategorieProduit($nom,$categorie,$description,$prixUnitaire,$photo);
        
    }
    public function formUpdateSousCategorieProduit(){
        $this->load->model("sousCategorieProduit");
        $id=$this->input->get('id');

        $data['categories'] = $this->sousCategorieProduit->getAllCategorie();
        $data['produit']=$this->sousCategorieProduit->getSousCategorieById($id);
        $data['content'] = "sousCategorieProduitUpdate";
        $this->load->view('templates',$data);
    }
    public function updateSousCategorieProduit(){
        $this->load->model("sousCategorieProduit");

        $id=$this->input->get('id');
        $nom=$this->input->get("nom");
        $categorie=$this->input->get("categorie");
        $description=$this->input->get("description");
        $prixUnitaire=$this->input->get("prixUnitaire");
        $photo=$this->input->get("photo");
        
        $this->sousCategorieProduit->UpdateSousCategorieProduit($id,$nom,$categorie,$description,$prixUnitaire,$photo);


    }
    public function deleteSousCategorieProduit(){
        $this->load->model("sousCategorieProduit");
        $id=$this->input->get('id');
        $this->sousCategorieProduit->deleteSousCategorieProduit($id);
    }

}

?>