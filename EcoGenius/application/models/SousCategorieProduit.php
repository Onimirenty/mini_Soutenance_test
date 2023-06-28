<?php
    if( !defined('BASEPATH') ) exit('No direct script access allowed') ;

    class SousCategorieProduit extends CI_Model
    {
        function selectParId($id){
            $query=$this->db->query(" select * from sousCategorieProduit where idSousCategorieProduit=".$id);
            return $query->result_array() ;
        }

        function select(){
            $query=$this->db->query(" select * from sousCategorieProduit where idSousCategorieProduit=".$id);
            return $query->result_array() ;
        }
    }

?>