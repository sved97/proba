<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelObavestenje
 *
 * @author Dell
 */
class ModelObavestenje extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvatiPrijavljene($podaci) {
       
        $this->db->where('Datum',$podaci['Datum']);
        $this->db->where('MestoOd',$podaci['MestoOd']);
        $this->db->where('MestoDo',$podaci['MestoDo']);
        $query = $this->db->get('prijava_za_obavestenje');
        
        return $query->result();
    }
    
    public function mojaObavestenja($idKorisnik) {
        $opsluzeno = 1;
        $this->db->where('idPrijavljenog',$idKorisnik);
        $this->db->where('Opsluzeno',$opsluzeno);
        $query = $this->db->get('prijava_za_obavestenje');
        
        return $query->result();
    }
    public function dodajObavestenje($idKorisnik,$mestoDo,$mestoOd,$datum){
        
        $this->db->select_max('idPrijava');
        $query = $this->db->get('prijava_za_obavestenje');
        $result = $query->row();
        $idPrijava = $result->idPrijava+1;
        $newDatum = DateTime::createFromFormat('m-d-Y', $datum)->format('Y-m-d');
        
        $opsluzeno = 0;
        $newValues = ['idPrijava' => $idPrijava ,
                      'MestoOd' => $mestoOd ,
                      'MestoDo' => $mestoDo,
                      'idPrijavljenog' => $idKorisnik,
                      'Datum' => $newDatum,
                      'Opsluzeno' => $opsluzeno ];
        $this->db->insert('prijava_za_obavestenje',$newValues);
    }
    public function opsluziPrijavu($idPrij) {
        $opsluzeno = true;
        $date = date('Y-m-d', time());
        $newValues = ['Opsluzeno' => $opsluzeno,
                      'Datum' => $date];
        $this->db->where('idPrijava',$idPrij);
        $this->db->update('prijava_za_obavestenje',$newValues);
    }
    //put your code here
}
