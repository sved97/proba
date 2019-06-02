<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Korisnik
 *
 * @author Dell
 */
class Korisnik extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Oglas');
        $this->load->model('Oglas_Putnici');
        $this->load->model('ModelKorisnik');
        $this->load->model('ModelObavestenje');
    }
    public function obavestiMe($idKor,$mestoDo,$mestoOd,$datum) {
        
        
        $this->ModelObavestenje->dodajObavestenje($idKor,$mestoDo,$mestoOd,$datum);
        
    }
    public function pretraga() {
        $podaci=[];
        $mestoDo = $this->input->get("MestoDo");
        $mestoOd = $this->input->get("MestoOd");
        $datum = $this->input->get("Datum");
       // if ($mestoDo == NULL && $mestoDo == NULL && $datum == NULL) {} PROVERA DA LI NIJE UNETO NI JEDNO POBLJE?
      
       $podaci['oglasi']  = $this->Oglas->pretrazi($mestoOd,$mestoDo,$datum);
       $podaci['controller']="Korisnik";
       $idKorisnik = $this->session->userdata("korisnik")->idKorisnik;
       //$idKorisnik = 2;
       
       if (empty($podaci['oglasi']) ){  
            if($datum=="")
                $datum="31-1-9999";
            $this->load->view("neuspela_pretraga.php",[
                'idKorisnik' => $idKorisnik,
                'mestoDo' => $mestoDo,
                'mestoOd' => $mestoOd,
                'datum' => $datum
            ]);
       }
       else { 
           $oglasi = $podaci['oglasi'];
           $vlasnici=[];
           foreach($oglasi as $oglas){
               $vlasnik = $this->ModelKorisnik->dohvatiKorisnika($oglas->idVlasnikOglasa);
               array_push($vlasnici,$vlasnik );
           } 
           $podaci['vlasnici']=$vlasnici;
         
           $this->load->view("oglasi.php",$podaci);
           
       }
       
    }
    
    public function prikaziOglas($idOgl) {
        $podaci=[];
        $oglas = $this->Oglas->dohvatiOglas($idOgl);
        $niz = $this->Oglas_Putnici->dohvatiPutnikeOglasa($oglas->idOglas);
        $putnici = [];
        foreach ($niz as $putnik) {
            array_push($putnici,$this->ModelKorisnik->dohvatiKorisnika($putnik->idPutnik));
        }
        $podaci['oglas']=$oglas;
        $podaci['putnici']=$putnici;
        //ovde ide header za ulogovanog korisnika
       
        $this->load->view("prikazOglasa.php",$podaci);
    }
    
    public function prikaziDodavanjeOglasa() {
        $this->load->view("dodavanjeOglasa.php");
    }
    
    public function prikaziProfil ($idKor) {
        
        $korisnik = $this->ModelKorisnik->dohvatiKorisnika($idKor);
        $this->load->view("profilKorisnika.php",['korisnik' => $korisnik]);
    }
    public function rezervisi($idOglas,$brMesta) {
        
        if ($brMesta>0) {
            $this->Oglas->rezervisi_mesto($idOglas,$brMesta);
            $idPutnik = $this->session->userdata("korisnik")->idKorisnik;
            //$idPutnik = 2;
            $this->Oglas_Putnici->dodajPutnika($idOglas,$idPutnik);
            
        }
    }
    public function obavestenja() {
        $idKorisnik = $this->session->userdata("korisnik")->idKorisnik;
       // $idKorisnik = 2;
        $obavestenja = $this->ModelObavestenje->mojaObavestenja($idKorisnik);
        if(empty($obavestenja))
            $this->load->view('nemaObavestenja.php');
        else {
            $this->load->view('prikazObavestenja.php',['obavestenja' => $obavestenja]);
        }
        
    }
    public function dodajOglas() {
       $idVlasnik = $this->session->userdata("korisnik")->idKorisnik;
       $podaci = ['MestoDo' => $this->input->post("MestoDo"),
                  'MestoOd' => $this->input->post("MestoOd"),
                  'VrPolaska' => $this->input->post("VremePolaska"),
                  'Cena' => (float)$this->input->post("Cena"),
                  'BrMesta' => (int)$this->input->post("BrMesta"),
                  'idVlasnikOglasa' => $idVlasnik,
                  'Datum' => $this->input->post("Datum")];
       $this->Oglas->napraviOglas($podaci);
       $datum = DateTime::createFromFormat('m-d-Y', $podaci['Datum'])->format('Y-m-d');
       $podaci['Datum']=$datum;
       $prijave = $this->ModelObavestenje->dohvatiPrijavljene($podaci); //opsluzi one kojima se poklapa Do,Od,Datum
       if (!empty($prijave)) {
           foreach ($prijave as $prijava) {
               $this->ModelObavestenje->opsluziPrijavu($prijava->idPrijava);
           }
       }
       $datum ="0000-00-00";
       $podaci['Datum'] = $datum;
       $prijave = $this->ModelObavestenje->dohvatiPrijavljene($podaci);
       if (!empty($prijave)) {
           foreach ($prijave as $prijava) {
               $this->ModelObavestenje->opsluziPrijavu($prijava->idPrijava);
           }
       }
        
    }
    public function prikaziPretragu() {
        
        $this->load->view('prikazPretrage.php');
    }
    //jasminov deo
    
     public function prikazipromenu($tekst=null){
        
        $podaci=[];
        $podaci['poruka']=$tekst;
        $this->load->view('promeni_lozinku.php', $podaci);
    }
    
    public function promenilozinku(){
        
        $sifra= $this->session->userdata('korisnik')->Sifra;
       if($sifra != $this->input->post('stara_sifra'))
               {
           $this->prikazipromenu('Stara sifra je pogresna');
       }
       if($this->input->post('nova_sifra')==$this->input->post('nova_sifra_ponovo')){
          
           $this->ModelKorisnik->promenisifru($this->input->post('nova_sifra'));
          
       }
       else{
           $this->prikazipromenu('Nova sifra i ponovljena sifra se ne slazu');
       }
        
    }
    public function prikaziregistraciju(){
        
        $this->load->view("registracija.php");
    }
    
    public function registracija(){
        
          $this->form_validation->set_rules('ime',"Ime", "required");
            $this->form_validation->set_rules('prezime',"Prezime", "required");
              $this->form_validation->set_rules('mesto',"Mesto boravka", "required");
                $this->form_validation->set_rules('rodj',"Datum Rodjenja", "required");
                  $this->form_validation->set_rules('username',"Korisnicko ime", "required");
                    $this->form_validation->set_rules('pol',"Pol", "required");
                      $this->form_validation->set_rules('username',"Korisnicko ime", "required");
                        $this->form_validation->set_rules('username',"Korisnicko ime", "required");
                          $this->form_validation->set_rules('password',"Sifra", "required");
                             $this->form_validation->set_message("required","Polje {field} je ostalo prazno.");
         
                              if ($this->form_validation->run() == FALSE){ 
                                  $this->prikaziregistraciju();
                                  }
 
    }
}
