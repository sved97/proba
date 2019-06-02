<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelKorisnik
 *
 * @author Dell
 */
class ModelKorisnik extends CI_Model{
    public $korisnik;
    public $admin;
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvatiKorisnika($idKorisnik) {
        
        $this->db->where('idKorisnik',$idKorisnik);
        $query = $this->db->get('korisnik');
        return $query->row();
    }
     public function dohvatiKorisnickoIme($user){
        $result=$this->db->where("KorisnickoIme", $user)->get('korisnik');
        $this->korisnik=$result->row(); 
    if($this->korisnik !=NULL){
        return true;
    }
    else{
         $result=$this->db->where("KorisnickoIme", $user)->get('admin');
        $this->admin=$result->row(); 
           if($this->admin !=NULL){
           return true;
           
           }
        return false;   
    }
        
        
    }
    public function promenisifru($nova){
        
        $data = array(
        'Sifra' => $nova
        );
        $this->db->where('idKorisnik', $this->session->userdata('korisnik')->idKorisnik);
        $this->db->update('korisnik', $data);
    }


    public function proveriPassword($sifra){
         if($this->admin !=NULL){
             return $this->admin->Sifra==$sifra;
         }
        return $this->korisnik->Sifra==$sifra;
        
    }
    //put your code here
}
