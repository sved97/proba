<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <html>
     <head>
         <title></title>
         
         <style type="text/css">
             body, html {
  height: 100%;
  margin:0px;
}


.bg { 
  /* The image used */
  background-image:<?php echo "url(\"".base_url("images/pocetna.jpg")."\");" ?> ;

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}




#logo{
	color: yellow;
    font-size: 100px;
    font-weight:bold;
    font-family: Magneto, "Magneto bold", sans-serif;
	position: absolute;
  left: 35%;
	top: 40%;
}


a{
    color: yellow;
}
.logovanje{
	
   position: absolute;
  left: 45%;
	top: 75%;
		
}

.logovanje input{
    border-radius: 10px;
    
}         
         </style>
     </head>
     <body>
         <form  action="<?php echo site_url('Gost/uloguj_se') ?>" method="post">
        <?php if(isset($poruka))
        echo "<font color='red'>$poruka</font><br>";
        ?>
      
         <div class="bg"></div>
	<div id='logo'>
            CARPOOL
	</div>
	
         <div class='logovanje'>
         <table> 
             <tr>
                 <td><font size="4" color="yellow">Korisnicko ime</font></td>
                 <td> <input type='text' 	name='username'></td>
                 <td><?php echo form_error("username","<font color='red'>","</font>"); ?> </td>
             </tr>
             
             <tr>
                 <td><font size="4" color="yellow">Sifra</font></td>
                 <td><input type='password' name='password'></td>
                 <td> <?php echo form_error("password","<font color='red'>","</font>"); ?></td>
             </tr>
             <tr>
                 <td colspan="2" align="center"> <input type='submit' name='dugme' value='Uloguj se'></td>
             </tr>
             <tr>
                 <td colspan="2" align="center"><?php echo "<a href= \"".site_url("Korisnik/prikaziregistraciju")."\">Niste nas clan?</a>";
               
            ?></td>
             </tr>
             
         </table>
         </div>
<!--	<div id='logovanje'>
	<div id='naziv'>
	Korisnicko Ime 
	<br>
	Sifra
	</div>
	<div id='polja'>
	<input type='text' 	name='username'>
        <?php// echo form_error("username","<font color='red'>","</font>"); ?>
	<br>
	<input type='password' name='password'>
        <?php //echo form_error("password","<font color='red'>","</font>"); ?>
	</div>
	
	</div>

	<div id='dugme'>
		<input type='submit' name='dugme' value='Uloguj se'>
	</div>
	
	<div id='registracija'>
           <?php //echo "<a href= \"".site_url("Korisnik/prikaziregistraciju")."\">Niste nas clan?</a>";
               
            ?>
         
        </div>-->
         </form>
     </body>
     
     
 </html>