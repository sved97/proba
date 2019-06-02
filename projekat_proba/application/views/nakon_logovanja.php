<?php

/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

/**
 * Description of nakon_logovanja
 *
 * @author jale
 */
?>

<html>
    <head>
        <title>
            Caos
        </title>
    </head>
    <body>
        CAO korisnice
        <br>
        <form action="<?php echo site_url('') ?>">
            <button>Moj Profil</button>
        </form>
        <form action="<?php echo site_url('Korisnik/prikazipromenu') ?>">
            <button>Promeni lozinku</button>
        </form>
        <form action="<?php echo site_url('Korisnik/obavestenja') ?>">
            <button>Obavestenja</button>
        </form>
        <form action="<?php echo site_url('') ?>">
            <button>Azuriraj podatke</button>
        </form>
         
        <form action="<?php echo site_url('Korisnik/prikaziPretragu') ?>"> 
            <button>Trazi prevoz</button>  
        </form>
        <form action="<?php echo site_url('Korisnik/prikaziDodavanjeOglasa') ?>">   
            <button>Ponudi prevoz</button>
        </form>
        <form action="<?php echo site_url('') ?>">
            <button>Moji saputnici</button>
        </form>
        <form action="<?php echo site_url('') ?>">
            <button>Moji omiljeni vozaci</button>
        </form>
    </body>
    
</html>