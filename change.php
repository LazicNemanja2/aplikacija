<?php
session_start();
if(!isset($_SESSION['prijavljen']))
    header("location:index.php");

?>

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
<?php //Namenjeno je popunu forme za izmenu podataka sa podacima korisnika koji je trenutno prijavljen ali ne radi bas najbolje
            $id = $_SESSION["id"];
            $ime = $_SESSION["ime"];
            $prezime= $_SESSION["prezime"];
            $korisnickoIme = $_SESSION["korisnickoIme"];
            $email = $_SESSION["email"];
            $sifra = $_SESSION["sifra"];
            header('&ime=' .$ime .'&prezime=' .$prezime .'&email=' .$email .'&korisnickoIme=' . $korisnickoIme .'&sifra=' .$sifra );
      
?>
   
<article>

    <div>

        <a href='stranica.php'>Lista korisnika</a>
        <a href='logout.php'>Odjavi se </a>
        <div><h1>Izmenite podatke koje želite</h1></div>

        <form name="izmena" method="POST" action="changeData.php" onsubmit="return validateForm()">
            <input type="text" name="ime"  value="<?php if(isset($_GET['ime'])) echo $_GET['ime']?>" placeholder="  Unesi ime"  pattern="((?=.*[A-Z])(?=.*[a-z]).{3,20})" required title="Primer: Petar "><br>
            <input type="text" name="prezime"  value="<?php if(isset($_GET['prezime'])) echo $_GET['prezime']?>" placeholder="  Unesi prezime" pattern="((?=.*[A-Z])(?=.*[a-z]).{5,30})" required title="Primer: Petrovic "><br>
            <input type="email" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']?>" required  placeholder="  Unesi e-mail"><br>
            <?php if(isset($_GET["error"])) echo "<div style='color:red;'>". $_GET['error'] .  "</div>"?>
            <input type="text" name="korisnickoIme"  value="<?php if(isset($_GET['korisnickoIme'])) echo $_GET['korisnickoIme']?>" placeholder="  Unesi korisničko ime" pattern="((?=.*^[A-Za-z\.0-9]+$).{4,20})" required oninvalid="this.setCustomValidity('Korisničko ime mora imati najmanje 4 karaktera')" oninput="setCustomValidity('')" ><br>
            <input type="password" name="sifra" value="<?php if(isset($_GET['sifra'])) echo $_GET['sifra']?>"  placeholder="  Unesi šifru" pattern="((?=.*\d)(?=.*[a-zA-Z]).{8,20})" required oninvalid="this.setCustomValidity('Lozinka mora sadrzati od 8 do 20 karaktera. Uključujući slova i brojeve.')" oninput="setCustomValidity('')"><br>
                <br><br>
            <input type="submit" name="potvrdi" value="Potvrdi izmenu">
        </form>
    
    </div>
  


    





</article>




    
</body>
</html>