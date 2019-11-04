<?php

session_start();

$korisnickoIme = $_POST['korisnickoIme'];
$sifra = $_POST['sifra'];



include "baza.php";

if($korisnickoIme&&$sifra)
{
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$conn) {
	    
		die("Neuspešna konekcija: " . mysqli_connect_error());
	}
	$sql = "select * from podaci where korisnickoIme='$korisnickoIme'";
	
	$upit=mysqli_query($conn, $sql);  

	if(mysqli_num_rows($upit)!=0) {
	   
		while ($red = mysqli_fetch_assoc($upit)){
			$bpime = $red['ime'];
			$bpprezime = $red['prezime'];
			$bpemail = $red['email'];
			$bpsifra = $red['sifra'];
			$bpid= $red['id'];

		}
		
		if($bpsifra==$sifra)
		{
		    
			$_SESSION['prijavljen'] = 1;
			$_SESSION['ime'] = $bpime;
			$_SESSION['prezime'] = $bpprezime;
			$_SESSION['email'] = $bpemail;
			$_SESSION['sifra'] = $bpsifra;
			$_SESSION['korisnickoIme'] = $korisnickoIme;
			$_SESSION['id'] = $bpid;


			header('location:stranica.php');
		
		}
		else 
			header('location:loginGreska.php?error=<b>Lozinka koju ste uneli nije ispravna!</b> <br>Molimo pokušajte ponovo.&ime=' .$ime .'');
			exit();		
	}
	else
		header('location:loginGreska.php?error=<b>Ne postoji korisnik sa ovim korisničkim imenom!</b><br> Pokušajte ponovo.');
		exit();
}
else
	header('location:loginGreska.php?error=<b>Da biste pristupili sajtu unesite korisničko ime i šifru!</b><br>Pokušajte ponovo.');
	exit();
	
mysqli_close($conn);
?>
