<?php

/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */
?>

<html>
    <head>
        
    </head>
    <body>
        <form action="<?php echo site_url('Korisnik\registracija')?>" method="post">
            <table>
    <tr>
        <td>Ime:</td>
        <td><input type="text" name="ime" ></td>
        <td><?php echo form_error("ime","<font color='red'>","</font>"); ?></td>
    </tr>
    <tr>
        <td>Prezime:</td>
        <td><input type="text" name="prezime"/></td>
        <td><?php echo form_error("prezime","<font color='red'>","</font>"); ?></td>
    </tr>
    <tr>
        <td>Mesto boravka</td> 
        <td><input type="text" name="mesto"/></td>
        <td><?php echo form_error("mesto","<font color='red'>","</font>"); ?></td>
    </tr>
    <tr>
        <td>Datum rodjenja</td> 
        <td><input type="date" name="rodj"></td>
        <td><?php echo form_error("rodj","<font color='red'>","</font>"); ?></td>
 
    </tr>
    <tr>
        <td>Pol</td>
        <td>
            <input type="radio" name="pol" vale="Muski"><?php echo "Muski" ?>
            <input type="radio" name="pol" vale="Zenski"><?php echo "Zenski" ?>
        </td>
         <td><?php echo form_error("pol","<font color='red'>","</font>"); ?></td>
 
    </tr>
    <tr>
        <td>Korisnicko ime</td>
        <td><input type="text" name="username"></td>
          <td><?php echo form_error("username","<font color='red'>","</font>"); ?></td>
 
    </tr>
    <tr>
        <td>Šifra</td>
        <td><input type="password" name="password"></td>
         <td><?php echo form_error("password","<font color='red'>","</font>"); ?></td>
 
    </tr>
    <tr>
        <td><input type="radio" name="vozac" vale="Vozac"><?php echo "Vozač" ?></td> 
        <td><?php echo form_error("vozac","<font color='red'>","</font>"); ?></td>
 
    </tr>
    <tr>
        <td>Automobil</td>
        <td><input type="text" name="auto"</td>
        <td><?php echo form_error("auto","<font color='red'>","</font>"); ?></td>
 
    </tr>
    
    <tr>
        <td>Karoserija</td>
        <td><select name="karoserija">
                <option value="limuzina">Limuzina</option>
                <option value="hečbek">Hečbek</option>
                <option value="karavan">Karavan</option>
                <option value="kabriolet">Kabriolet</option>
                <option value="Džip">Džip</option>
            </select>
        </td>
          <td><?php echo form_error("karoserija","<font color='red'>","</font>"); ?></td>
 
        
    </tr>
    
    <tr>
        <td>Broj sedista</td>
        <td><input type="text" name="brojsedista" ></td>
          <td><?php echo form_error("brojsedista","<font color='red'>","</font>"); ?></td>
 
    </tr>
    <tr> <td> <a>Dodaj sliku automobiala</a></td></tr>
        
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Registruj se"/></td>
    </tr>
    </table>
            
        </form>
        
    </body>
</html>