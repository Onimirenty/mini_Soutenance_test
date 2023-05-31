<?php
    if( !defined('BASEPATH') ) exit('No direct script access allowed') ;

    class PhotoSousCategorieProduit extends CI_Model
    {
        function selectParId($id){
            $query=$this->db->query(" select * from photoSousCategorieProduit where idSousCategorieProduit=".$id);
            return $query->result_array() ;
        }
       
    }

?>