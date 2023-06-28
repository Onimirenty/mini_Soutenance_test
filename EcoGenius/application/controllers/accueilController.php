<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class accueilController extends CI_Controller {

	public function index()
	{
		$this->load->model('accueilModel');
		$data['tousLesProduitsParSousCategorieProduit'] = $this->accueilModel->getTousLesProduitsParSousCategorieProduit(null); 
		$data['toutesLesPhotosParIdsouscategorieProduit'] = $this->accueilModel->getToutesLesPhotosParIdsouscategorieProduit(0);
		$data['lesProduits'] = $this->accueilModel->getTousLesProduits(); 
		$data['lesCategorieProduitParProduit'] = $this->accueilModel->getCategorieProduitParProuduit(0); 
	    $data['content']="accueilView";
        $this->load->view("templateView",$data);
	}	
	public function process() {
        if ($this->input->post('value')) {
            $value = $this->input->post('value');

            // Use the value in PHP
            // Example: Echo the value
            echo $value;
        }
    }/* 
    public function anotherMethod() {
        // Access the stored value from the session
        $produitAcheter = $this->session->userdata('produitAcheter');
        // Use the stored value as needed
        echo $produitAcheter['description'];
        echo $produitAcheter['nomsouscategorieproduit'];
    }	  */
	public function garderValeurAEnvoyer() {
		if (isset($_POST['produit'])) {
			$produit = json_decode($_POST['produit'], true);
			if (!$this->session->has_userdata('elements')) {
				echo " tsia";
				$this->session->set_userdata('elements', $produit);
			}else{
				echo "eny";
				$this->session->set_userdata('elements', $produit);
			}
		}
		$data['content']="Panier";

		$this->load->view("templateView",$data);
		// Utilisez le tableau $produit comme nécessaire
	}
}
