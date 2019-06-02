<?php

/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */
?>

<html>
    <head> 
        <title>
        
        </title>
    </head>
    <body> 
        <form action="<?php echo site_url('Korisnik/promenilozinku')?>" method="post">
        <?php if(isset($poruka))
        echo "<font color='red'>$poruka</font><br>";
        ?>
        <table>
    <tr>
        <td>Stara sifra:</td>
        <td><input type="password" name="stara_sifra"></td>
        
    </tr>
    <tr>
        <td>Nova sifra:</td>
        <td><input type="password" name="nova_sifra"/></td>
    </tr>
    <tr>
        <td>Ponovi novu sifru:</td>
        <td><input type="password" name="nova_sifra_ponovo"/></td>
    </tr>
    <tr>
        <td colspan='2' align='center'><input type="submit" value='Promeni'></td>
    </tr>
    </table>
        </form>
    </body>
    
</html>

