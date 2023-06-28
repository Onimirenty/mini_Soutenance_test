<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}	
	
	public function accueil()
	{
		$this->load->view('accueil');
	}
	
	public function signUp()
	{
		$this->load->model("LoginSign");
		$data['listeSexe']=$this->LoginSign->getAllSexe();
		$this->load->view('signUp',$data);
	}
	
	public function verificationLogin(){
        $mail=$this->input->post('mail');
        $password=$this->input->post('password');
        $this->load->model("LoginSign");
        $result=$this->LoginSign->login($mail,$password);
        
        if($result!=false){
			$this->session->set_userdata('utilisateur', $result);
			redirect('Welcome/accueil');
        }else{
            redirect('Welcome/index');
        }
    }
	
	public function inscription(){
        $nom=$this->input->post('nom');
        $prenom=$this->input->post('prenom');
        $dateDeNaissance=$this->input->post('dateDeNaissance');
        $numero=$this->input->post('numero');
        $mail=$this->input->post('mail');
        $sexeId=$this->input->post('sexeId');
        $motDePasse=$this->input->post('motDePasse');
        $this->load->model("LoginSign");
        $this->LoginSign->inscription($nom,$prenom,$dateDeNaissance,$numero,$mail,$sexeId,$motDePasse);
		redirect('Welcome/accueil');
	}


	//detail produit//
		public function detailProduit(){
			$id_Sous_Categorie=1;
			$data= array();
			$data['detail_produit'] = $this->sousCategorieProduit->selectParId($id_Sous_Categorie);
			$data['image_produit'] = $this->photoSousCategorieProduit->selectParId($id_Sous_Categorie);
			$this->load->view('detailProduit' , $data);
		}
	//detail produit//



	//panier/////////////////////////////////////////////////////////////////////////////////////////
		public function panier()
		{
			$this->load->view('Panier');
		}

		public function supprimer() {
			$key = $_GET['key'];
			$tableau = $_GET['tableau'];
			unset($tableau[$key]);
			$tableau = array_values($tableau);
			
			// Mettre à jour les quantités dans le localStorage
			$quantites = array_column($tableau, 'Quantite');
			echo "<script>localStorage.setItem('panier', '" . json_encode($quantites) . "');</script>";
			
			$data['tableau'] = $tableau;
			$this->load->view('Panier', $data);
		}	
		
		public function confirmer() {
			// Récupérer les données JSON du panier
			$panierDataJson = $this->input->raw_input_stream;
			$panierData = json_decode($panierDataJson, true);

			// Traiter les données du panier selon vos besoins
		
			// Charger la vue et transmettre les données du panier
			$data['panierData'] = $panierData;
			$this->load->view('confirmation_view', $data);
		}	
	//panier/////////////////////////////////////////////////////////////////////////////////////////
		

}
