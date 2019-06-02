<html>
    <body>
        <table>
            <?php
            echo "<tr><td>Korisnicko ime: ".$korisnik->KorisnickoIme."</td></tr>";
            echo "<tr><td>Mesto boravka: ".$korisnik->MestoBoravka."</td></tr>";
            echo "<tr><td>Datum rodjenja: ".$korisnik->DatumRodjenja."</td></tr>";
            if ($korisnik->BrOcena >0 ) 
                $ocena = $korisnik->ZbirOcena / $korisnik->BrOcena;
            else $ocena=0;
            echo "<tr><td>Ocena: ".$ocena."</td></tr>";
            ?>
        </table>
    </body>
</html>

