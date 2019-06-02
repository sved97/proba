<html>
    <head>
        <style type="text/css">
            ul {
                list-style-image: <?php echo "url(\"".base_url("images/krug.png")."\");" ?>
            }
          
            
            
        </style>
      <link href="<?php echo base_url("mojcss/oglas.css")?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url("css/960_12_col.css")?>" type="text/css" rel="stylesheet" />
    </head>
     <body>
     <div class="container_24 cearfix">    
         <div id="header" class="grid_24" >
             <img src="<?php echo base_url("images/headerOglasa.jpg")?>"/>
         </div>  
    <div id="lista" class="grid_16">    
        <ul>
        <?php 
        $i=0;
    foreach ($oglasi as $oglas) {
        
        echo "<li><p class=\"oglasi\">".$oglas->Datum."<br/><br/>".$oglas->MestoOd."-".$oglas->MestoDo.
                "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".
                "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "
                ."Vozac: ".$vlasnici[$i]->KorisnickoIme."<br/>".$oglas->VremePolaska.
                "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$oglas->Cena.
                "rsd&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".
                "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".
                "<a href=\"prikaziOglas\\".$oglas->idOglas."\">Prikazi oglas</a></p></li>";
        $i++;
    }
    
    ?>   
        </ul>
         </div>
     </div>
     </body>
</html>


