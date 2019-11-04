
<?php
session_start();
$id = $_SESSION["id"];

include "baza.php";


$ime = $_POST["ime"];
$prezime = $_POST["prezime"];
$email = $_POST["email"];
$korisnickoIme = $_POST["korisnickoIme"];
$sifra = $_POST["sifra"];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "select * from podaci where korisnickoIme='$korisnickoIme'";
$result = mysqli_query($conn, $query);
$red = mysqli_fetch_assoc($result);
$bpid= $red['id'];
if ((mysqli_num_rows($result) >= 1) && ($id!=$bpid)) {
    header('location:change.php?error=Korisničko ime je zauzeto.'. '&ime=' .$ime .'&prezime=' .$prezime .'&email=' .$email .'&sifra=' .$sifra );
    exit();
}




$sql = "UPDATE podaci SET ime='$ime', prezime= '$prezime', email= '$email', korisnickoIme= '$korisnickoIme', sifra= '$sifra' WHERE id= '$id'";


//$rezultat = mysqli_query($conn, $sql);
if(mysqli_query($conn, $sql)){
    echo "<script> alert('Izmena podataka je uspešno obavljena. '); window.location.href = 'stranica.php'; </script>";
    
} else {
    echo "Greška prilikom povezivanja sa bazom." . mysqli_error($conn);
}



mysqli_close($conn);
?>
