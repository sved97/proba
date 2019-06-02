<html>
    <head>
        <link href="<?php echo base_url("mojcss/oglas.css")?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url("css/960_12_col.css")?>" type="text/css" rel="stylesheet" />
        <style type="text/css">
            #forma{
                margin-left: 30%;
            }
            table{
                background-color: #FFCC33;
            }
        </style>
    </head>
    <body>
        <div class="container_24">
            <div class="grid_24" id="header">
                 <img src="<?php echo base_url("images/headerOglasa.jpg")?>"/>
            </div>
        <div id="forma" class="grid_16">
        <form  action="<?php echo site_url('Korisnik\dodajOglas') ?> " method="post">
            <table>
                <tr><td>Mesto do</td><td><input type="text" name="MestoDo"/></td></tr>
                <tr><td>Mesto od</td><td><input type="text" name="MestoOd"/></td></tr>
                <tr><td>Vreme polaska</td><td><input type="text" name="VremePolaska"/></td></tr>
                <tr><td>Broj mesta</td><td><input type="text" name="BrMesta"/></td></tr>
                <tr><td>Cena</td><td><input type="text" name="Cena"/></td></tr>
                <tr><td>Datum</td><td><input type="text" name="Datum"/></td></tr>
            </table>
            <input type="submit" value="Dodaj"/>
        </form>
        </div>
        </div>
        </body>
</html>

