<hmtl>
    <body>
        <h1>Neuspela pretraga</h1>
        <p> Ukoliko se pojavi vas zeljeni prevoz,da li zelite da vas obavestimo?</p>
        <form action="<?php 
        echo site_url("Korisnik/obavestiMe/".$idKorisnik."/".$mestoDo."/".$mestoOd."/".$datum);
        ?>" >
            <button>Ok</button>
        </form>
        <form action="">
            <button>Cancel</button>
        </form>
        
    </body>    
   
</hmtl>