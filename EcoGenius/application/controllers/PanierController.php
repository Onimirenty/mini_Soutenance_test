<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanierController extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');
		if (!$this->session->has_userdata('elements')) {
			$elements = array(
				array('Nom' => 'Produit 1', 'Prix' => 25),
				array('Nom' => 'Produit 2', 'Prix' => 30),
				array('Nom' => 'Produit 3', 'Prix' => 28),
				array('Nom' => 'Produit 4', 'Prix' => 28)
			);
			echo "hello";
			$this->session->set_userdata('elements', $elements);
		}
    }

	public function panier()
	{
		$this->load->library('session');

		$this->load->view('panier');
		// $data['content'] = 'panier';
		// $this->load->view('templateView',$data);
	}


	// public function supprimer() {
	// 	$this->load->library('session');
	// 	$key = intval($_GET['key']);
	// 	$tableau = $_SESSION['elements'];
	
	// 	unset($tableau[$key]);
	
	// 	$tableau = array_values($tableau);
	
	// 	$_SESSION['elements'] = $tableau;
								 
	// 	redirect('PanierController/panier');
	// }

	public function supprimer() {
		$this->load->library('session');
		$key = intval($_GET['key']);
		$tableau = $_SESSION['elements'];
	
		unset($tableau[$key]);
	
		$tableau = array_values($tableau);
	
		$_SESSION['elements'] = $tableau;  
	
		// // Mettre à jour le tableau dans le localStorage
		// $panierJSON = json_encode($tableau);
		// echo "<script>localStorage.setItem('panier', $panierJSON);</script>";
	
		redirect('PanierController/panier');
	}
	
	

	public function recuperer() {
        $donneesJson = $this->input->get('donnee');
        $tableau = json_decode($donneesJson, true);
        $data['tableau'] = $tableau;
        $this->load->view('confirmation', $data);  
	}

	

}
