<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CodeModel extends CI_Model 
{
    public function getClientAvecAchatParMois(){
        $sql=$this->db->query("SELECT client.idclient , client.nom,  extract(month FROM achat.dateAchat) AS mois , sum(achat.montant) AS totalAchat
        FROM client 
        JOIN achat  ON client.idclient= achat.idClient
        GROUP BY client.idClient , client.nom,  extract(month FROM achat.dateAchat)
        ORDER BY client.nom ,extract(month FROM achat.dateAchat)");
        // $sql=sprintf( $sql);
        // $this->db->query($sql);  
        return $sql->result();
    }

    
    
    
    
}