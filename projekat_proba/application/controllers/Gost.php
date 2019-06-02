<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gost
 *
 * @author jale
 */
class Gost extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model("ModelKorisnik");
       
      /*  if (($this->session->userdata('korisnik')) != NULL) {
                redirect("Korisnik");
            
        }
        
            if ($this->session->userdata('korisnik')->admin !=null) {
                redirect("Admin");
           
        }*/
    }
    
    
   public function index(){
        
        $this->load->view('login.php');
        
        
    }
    
    public function login($poruka=null){
        $podaci=[];
        if ($poruka) {
            $podaci['poruka'] = $poruka;
        }
        $this->load->view('login.php',$podaci); //dva puta se verovatno ispisuje greska zato sto je i u index() i u ovoj metodi isti php se ucita
        
        
    }

    public function uloguj_se(){
        
        $this->form_validation->set_rules('username',"Korisnicko ime", "required");
  
         $this->form_validation->set_rules('password',"Sifra", "required");
           $this->form_validation->set_message("required","Polje {field} je ostalo prazno.");
         
         if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('login.php');
                }
                else
                {
                    
                    
                if($this->ModelKorisnik->dohvatiKorisnickoIme($this->input->post('username'))){ //post() zato sto je nesto poslato putem post metode
             
                 if($this->ModelKorisnik->proveriPassword($this->input->post('password'))){
                    
                     $this->session->set_userdata('korisnik',$this->ModelKorisnik->korisnik); //zapamtili smo celog korisnika 
                
                     if ($this->ModelKorisnik->admin==null){
                         $this->load->view('nakon_logovanja.php');
                         
                     }
                     else{
                         $this->session->set_userdata('admin',$this->ModelKorisnik->admin);//zapamtili smo celog korisnika
                         $this->load->view('admin_meni.php');
                     }
                }
                else $this->login('Neispravna sifra');
        
                }
                else $this->login('Nepostojeci username');
    
                }
    }
    
}