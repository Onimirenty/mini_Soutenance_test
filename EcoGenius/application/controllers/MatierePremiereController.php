<?php
public class MatierePremiereController extends CI_Controller{
    public function index(){
        $this->load->model('matierePremiereModel');
        $this->matierePremiereModel->getAllMatierePremiere();
        $data['content']='MatierePremiereView';
        $this->load->view('templates',$data);
    }
    public function formInsertMatierePremiere(){
        $this->load->model('matierePremiereModel');
        $data['unite']=$this->matierePremiereModel->getAllUnite();
        $data['content']='MatierePremiereForm';
        $this->load->view('templates',$data);
    }
    public function insertMatierePremiere(){
        $nom=$this->input->get("nom");
        $photo=$this->input->get("photo");
        $prixUnitaire = $this->input->get("prixUnitaire");
        $unite = $this->input->get("unite");

        $this->load->model('matierePremiereModel');
        $this->matierePremiereModel->insert($nom,$photo,$prixUnitaire,$unite);
        

    }
    public function formUpdateMatierePremiere(){
        $id = $this->input->get("idMatierePremiere");

        $this->load->model('matierePremiereModel');
        $data['unite'] = $this->matierePremiereModel->getAllUnite();
        $data['matiere'] = $this->matierePremiereModel->getMatierePremiereById($id);
        $data['content'] ='MatierePremiereUpdate';
        $this->load->view('templates',$data);
    }
    public function updateMatierePremiere(){
        $id = $this->input->get("idMatierePremiere");
        $nom=$this->input->get("nom");
        $photo=$this->input->get("photo");
        $prixUnitaire = $this->input->get("prixUnitaire");
        $unite = $this->input->get("unite");

        $this->matierePremiereModel->updateMatierePremiere($id,$nom,$photo,$prixUnitaire,$unite);

    }
    public function deleteMatierePremiere(){
        $id = $this->input->get("idMatierePremiere");
        $this->matierePremiereModel->deleteMatierePremiere($id);

    }

}

?>