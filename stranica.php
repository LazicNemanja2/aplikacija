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
   
<article>

    

    <?php

        include "baza.php";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT id, ime, prezime,email, korisnickoIme FROM podaci";          
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            if($_SESSION["korisnickoIme"]=="admin"){
                if($result->num_rows > 0) {
                    echo "<a href='change.php'>Izmena korisničkih podataka</a>";
                    echo "<a href='logout.php'>odjavi se</a>";
                    echo "<h1 align='center'>Korisnici</h1>";
                    echo "<center><table><tr><th>ID</th><th>Ime</th><th>Prezime</th><th>Email</th><th>Brisanje</th></tr>";
                    while ($rowl = $result->fetch_assoc()) {
                        echo "<tr><td>" . $rowl["id"]. "</td><td>" . $rowl["ime"]. " </td><td>" . $rowl["prezime"]. " </td><td>" . $rowl["email"]. " </td> <td><a href='delete.php?id=".$rowl['id']."'>Obriši</a></td> </tr>";
                    }
                    echo "</table></center>";
                }

            }
            else {
                if($result->num_rows > 0) {    
                    echo "<a href='change.php'>Izmena korisničkih podataka</a>";
                    echo "<a href='deleteAccount.php'>Brisanje naloga</a>";
                    echo "<a href='logout.php'>odjavi se</a>";
                    echo "<h1 align='center'>Korisnici</h1>";
                    echo "<center><table><tr><th>ID</th><th>Ime</th><th>Prezime</th><th>Email</th></tr>";
                    while ($rowl = $result->fetch_assoc()) {
                        echo "<tr><td>" . $rowl["id"]. "</td><td>" . $rowl["ime"]. " </td><td>" . $rowl["prezime"]. " </td><td>" . $rowl["email"]. " </td> </tr>";
                    }
                    echo "</table></center>";
                }

            }

           
            

        }
        mysqli_close($conn);
    ?>
    



</article>



    
</body>
</html>