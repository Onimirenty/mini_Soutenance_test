<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    //achat par mois par client//
			public function achat(){
				$this->load->model('CodeModel');
				$data['client']=$this->CodeModel->getClientAvecAchatParMois();
				$this->load->view('clientView',$data);
			}

			public function appuyer(){
				$this->load->view('voirListeClient');
			}
	//achat par mois par client//

}