<?php

$id = $_GET['id'];

include "baza.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM podaci WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('location: stranica.php'); 
    exit;
} else {
    echo "Greška prilikom brisanja podataka";
    mysqli_close($conn);
}
?>