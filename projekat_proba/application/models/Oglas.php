<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Oglas
 *
 * @author Dell
 */
class Oglas extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    public function dohvatiOglas($id) {
        
        $this->db->where('idOglas',$id);
        $query = $this->db->get('oglas');
        
        return $query->row();
    }
    
    public function rezervisi_mesto($idOglas,$brMesta) {
        $newValues = [ 'BrMesta' => $brMesta-1];
        $this->db->where('idOglas',$idOglas);
        $this->db->update('oglas',$newValues);
        
    }
    public function napraviOglas($podaci) {
        
       $datum = DateTime::createFromFormat('m-d-Y', $podaci['Datum'])->format('Y-m-d');
       $this->db->select_max('idOglas');
       $query = $this->db->get('oglas');
       $result = $query->row();
       $idOglasa = $result->idOglas +1;
       
       $newValues = ['MestoDo' => $podaci['MestoDo'],
                  'MestoOd' => $podaci['MestoOd'],
                  'VremePolaska' => $podaci['VrPolaska'],
                  'Cena' => $podaci['Cena'],
                  'BrMesta' => $podaci['BrMesta'],
                  'idVlasnikOglasa' => 4,
                  'idOglas' => $idOglasa,
                  'Datum' => $datum];
       $this->db->insert('oglas',$newValues);
    }
    public function pretrazi ($mestoOd,$mestoDo,$datum ) {
        
        if ($mestoDo != NULL && $mestoOd != NULL && $datum != NULL) { //uneta su sva tri parametra
            $this->db->where('MestoDo',$mestoDo);
            $this->db->where('MestoOd',$mestoOd);
            $this->db->where('Datum',$datum);
            $query = $this->db->get('oglas');
            
            return $query->result();
        }else if ($mestoDo != NULL && $mestoOd != NULL ){    //uneti parametri su MestoDo i MestoOd para
            $this->db->where('MestoDo',$mestoDo);
            $this->db->where('MestoOd',$mestoOd);
            $query = $this->db->get('oglas');
            
            return $query->result();
        } else if ($mestoDo != NULL ){ //uneti parametar je samo MestoDo
            $this->db->where('MestoDo',$mestoDo);
            $query = $this->db->get('oglas');
            
            return $query->result();
        } else if ($mestoOd != NULL ) { //uneti parametar je samo MestoOd
            $this->db->where('MestoOd',$mestoOd);
            $query = $this->db->get('oglas');
            
            return $query->result();
        } else {                        //uneti parametar je samo Datum
            $this->db->where('Datum',$datum);
            $query = $this->db->get('oglas');
            
            return $query->result();
        }
        
    }
    //put your code here
}
