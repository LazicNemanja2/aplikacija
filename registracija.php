
<?php

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
    if (mysqli_num_rows($result) >= 1) {
        header('location:index.php?error=Korisničko ime je zauzeto.' .'&ime=' .$ime .'&prezime=' .$prezime .'&email=' .$email .'&sifra=' .$sifra .'');
        exit();
    }




    $sql = "INSERT INTO podaci (ime, prezime, email, korisnickoIme, sifra)
    VALUES ('$ime', '$prezime', '$email', '$korisnickoIme', '$sifra')";


    //$rezultat = mysqli_query($conn, $sql);
    if(mysqli_query($conn, $sql)){
        echo "<script> alert('Uspesna registracija. Možete da se prijavite na sajt. '); window.location.href = 'index.php'; </script>";
        
    } else {
        echo "Greška prilikom povezivanja sa bazom." . mysqli_error($conn);
    }



    mysqli_close($conn);
?>
