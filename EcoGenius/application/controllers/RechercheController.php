<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RechercheController extends CI_Controller {
    //recherche detaille
    public function rechercheDetaille(){
        $idProduit=$this->input->get('idProduit');
        $prix1=$this->input->get('prix1');
        $prix2=$this->input->get('prix2');
        $description=$this->input->get('description');
        $idCategorieProduit=$this->input->get('idCategorieProduit');

        $rechercheDetaille=$this->RechercheModel->rechercheDetaille($idProduit, $prix1, $prix2, $description, $idCategorieProduit);
        
        $photos=array();
        
        for($i=0;$i<count($rechercheDetaille);$i++)
        {
            $photos[]=$this->RechercheModel->getAphoto($rechercheDetaille['idSousCategorieProduit']);
        }

        $data['rechercheDetaille']=$rechercheDetaille;
        $data['photos']=$photos;

        $this->load->view('RechercheView',$data);	
    }

    //recherche simple
    public function rechercheSimple(){
        $nomProduit=$this->input->get('nomProduit');

        $rechercheDetaille=$this->RechercheModel->rechercheSimple($nomProduit);
        
        $photos=array();
        
        for($i=0;$i<count($rechercheDetaille);$i++)
        {
            $photos[]=$this->RechercheModel->getAphoto($rechercheDetaille['idSousCategorieProduit']);
        }

        $data['rechercheDetaille']=$rechercheDetaille;
        $data['photos']=$photos;

        $this->load->view('RechercheView',$data);
    }

    //go to page recherche avance
    public function goToRechercheAvance(){
        $listProduit=$this->RechercheModel->getAllProduit();
        $listCategorieProduit=$this->RechercheModel->getAllCategorieProduit();

        $data['listCategorieProduit']=$listCategorieProduit;
        $data['listProduit']=$listProduit;

        $this->load->view('RechercheAvanceView',$data);	
    }
}
