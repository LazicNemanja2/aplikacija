<?php
session_start();
$id = $_SESSION['id'];

include "baza.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM podaci WHERE id = $id"; 

if (mysqli_query($conn, $sql)) { 
    $_SESSION['prijavljen']=0;
    session_destroy();  
    header('location: index.php');
    mysqli_close($conn); 
    exit;
} else {
    echo "Greška prilikom brisanja podataka";
    mysqli_close($conn);
}
?>