<html>
    <body>
        <table>
            <?php
            foreach($obavestenja as $prevoz) {
                echo "<tr><td>".$prevoz->Datum."</t><td>Pojavio se nov prevoz: ".$prevoz->MestoOd." ->".
                     $prevoz->MestoDo.". Nadjite ga i rezervisite odmah!</td><td><a href=\"".
                      site_url("Korisnik/pretraga?MestoDo=".$prevoz->MestoDo."&MestoOd=".$prevoz->MestoOd."&Datum=").
                        "\">Pronadjite odmah!</a></td></tr>";
            }
            ?>
        </table>
    </body>
</html>