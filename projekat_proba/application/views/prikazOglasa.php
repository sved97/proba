<html>
    <body>
        <h1>Izgled  oglasu</h1>
        <table>
           
            <?php 
            echo "<tr><td>Vozac</td><td><a href=\""
            .site_url("Vozac/prikaziProfil/".$oglas->idVlasnikOglasa)."\">".$oglas->idVlasnikOglasa.
                    "</a></td></tr>";
            echo "<tr><td>Od: ".$oglas->MestoOd."</td>"."<td>Do: ".$oglas->MestoDo."</td><td>Cena: "
                    .$oglas->Cena."</td><td>Broj preostaliih mesta: ".$oglas->BrMesta.
                    "</td><td><a href=\"".site_url("Korisnik/rezervisi/".$oglas->idOglas."/".$oglas->BrMesta)."\">Rezervisi</a></td></tr>";
             foreach ($putnici as $putnik) {
                 echo "<tr><td><a href=\"". site_url("Korisnik/prikaziProfil/".$putnik->idKorisnik)."\">"
                         .$putnik->KorisnickoIme."</a></td></tr>";
             }   
            ?>
        </table>
    </body>
</html>
