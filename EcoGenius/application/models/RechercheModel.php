<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class RechercheModel extends CI_Model{
        public function rechercheDetaille($idProduit, $prix1, $prix2, $description, $idCategorieProduit)
        {
            $requete="select idProduit, nomProduit,idCategorieProduit,nomCategorieProduit,idSousCategorieProduit,nomSousCategorieProduit,description,prix from viewRecherche where idProduit=%d and %d<prix and prix<%d and description like '%s%s%s' and idCategorieProduit=%d";
            $requete=sprintf($requete,$idProduit, $prix1, $prix2,"%",$description,"%", $idCategorieProduit);
            $query=$this->db->query($requete);

            $data=array();

            foreach($query->result_array() as $row)
            {
                $data[]=$row;
            }

            return $data;
        }
        
        public function rechercheSimple($nomProduit)
        {
            $requete="";
            if(is_int($nomProduit))
            {
                $requete="select * from viewRecherche where prix=%d or nomProduit like '%s%s%s' or description like '%s%s%s' or nomCategorieProduit like '%s%s%s' or nomSousCategorieProduit like '%s%s%s'";
                $requete=sprintf($requete,$nomProduit,"%",$nomProduit,"%","%",$nomProduit,"%","%",$nomProduit,"%","%",$nomProduit,"%");
            }
            else
            {
                $requete="select * from viewRecherche where nomProduit like '%s%s%s' or description like '%s%s%s' or nomCategorieProduit like '%s%s%s' or nomSousCategorieProduit like '%s%s%s'";
                $requete=sprintf($requete,"%",$nomProduit,"%","%",$nomProduit,"%","%",$nomProduit,"%","%",$nomProduit,"%");
            }
            $query=$this->db->query($requete);

            $data=array();

            foreach($query->result_array() as $row)
            {
                $data[]=$row;
            }

            return $data;
        }

        public function getAphoto($idSousCategorieProduit)
        {
                $requete="select * from photoProduit where idSousCategorieProduit=%d limit 1";
                $requete=sprintf($requete,$idSousCategorieProduit);
            $query=$this->db->query($requete);

            $data=array();

            foreach($query->result_array() as $row)
            {
                $data[]=$row;
            }

            if(count($data)>0)
                return $data[0];
            else
                return null;
        }

        public function getAllProduit()
        {
                $requete="select * from produit";
            $query=$this->db->query($requete);

            $data=array();

            foreach($query->result_array() as $row)
            {
                $data[]=$row;
            }

            return $data;
        }

        public function getAllCategorieProduit()
        {
                $requete="select * from categorieProduit";
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