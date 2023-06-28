<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class LoginSign extends CI_Model{
        
        public function login($mail,$password){
            $requete="SELECT * FROM client WHERE mail='%s' and motDePasse='%s'";
            $requete=sprintf($requete,$mail,$password);
            $query=$this->db->query($requete);
            if($query->num_rows()==1){
                return $query->row();
            }else{
                return false;
            }
        }

        public function inscription($nom,$prenom,$dateDeNaissance,$numero,$mail,$sexeId,$motDePasse){
            $requete="insert into client(nom,prenom,dateDeNaissance,numero,mail,sexeId,motDepasse) values('%s','%s','%s','%s','%s',%d,'%s')";
            $requete=sprintf($requete,$nom,$prenom,$dateDeNaissance,$numero,$mail,$sexeId,$motDePasse);
            $this->db->query($requete);
        }

        public function getAllSexe(){
            $requete="SELECT * FROM sexe";
            $query=$this->db->query($requete);
            $data=array();
            foreach($query->result_array() as $row)
            {
                $data[]=$row;
            }
            return $data;
        }
    }
?>