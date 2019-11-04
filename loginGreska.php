

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>
   
<article>
    <div>
    <h2>Greška pri prijavljivanju na sajt</h2>		
        <?php if(isset($_GET["error"]))  echo  $_GET["error"] ; ?>

        <form action='login.php' method='POST'>
            <input type="text"  name="korisnickoIme" value="<?php if(isset($_GET['korisnickoIme'])) echo $_GET['korisnickoIme']?>" placeholder="  Korisničko ime" /><br>
            <input type="password"  name="sifra" placeholder="  Lozinka" /><br>
            <input type="submit" name="dugmeZaPrijavu"  value="Prijavi se!">
        </form>
        <h4>Ukoliko niste registrovani registrujte se <a href="index.php">ovde</a></h4>	

    </div>

</article>



    
</body>
</html>