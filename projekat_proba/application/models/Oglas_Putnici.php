<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Oglas_Putnici
 *
 * @author Dell
 */
class Oglas_Putnici extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function dodajPutnika($idOglas,$idPutnik) {
        
        $newValues = [ 'idOglas' => $idOglas,
                       'idPutnik' => $idPutnik];
        $this->db->insert('oglas_putnici',$newValues);
    }
    
    public function dohvatiPutnikeOglasa($idOglas) {
        
        $this->db->where('idOglas',$idOglas);
        $query = $this->db->get('oglas_putnici');
        return $query->result();
    }
    //put your code here
}
