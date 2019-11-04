	
		<div><h1>Ukoliko niste registrovani ne možete da pristupite sajtu</h1></div>

		<form name="registracija" method="POST" action="registracija.php" onsubmit="return validateForm()">
			<input type="text" name="ime"  value="<?php if(isset($_GET['ime'])) echo $_GET['ime']?>" placeholder="  Unesi ime"  pattern="((?=.*[A-Z])(?=.*[a-z]).{3,20})" required title="Primer: Petar "><br>
			<input type="text" name="prezime"  value="<?php if(isset($_GET['prezime'])) echo $_GET['prezime']?>" placeholder="  Unesi prezime" pattern="((?=.*[A-Z])(?=.*[a-z]).{5,30})" required title="Primer: Petrovic "><br>
			<input type="email" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']?>" required  placeholder="  Unesi e-mail"><br>
			<?php if(isset($_GET["error"])) echo "<div style='color:red;'>". $_GET['error'] .  "</div>"?>
			<input type="text" name="korisnickoIme"  placeholder="  Unesi korisničko ime" pattern="((?=.*^[A-Za-z\.0-9]+$).{4,20})" required oninvalid="this.setCustomValidity('Korisničko ime mora imati najmanje 4 karaktera')" oninput="setCustomValidity('')" ><br>
			<input type="password" name="sifra" value="<?php if(isset($_GET['sifra'])) echo $_GET['sifra']?>"  placeholder="  Unesi šifru" pattern="((?=.*\d)(?=.*[a-zA-Z]).{8,20})" required oninvalid="this.setCustomValidity('Lozinka mora sadrzati od 8 do 20 karaktera. Uključujući slova i brojeve.')" oninput="setCustomValidity('')"><br>
				<br><br>
			<input type="submit" name="potvrdi" value="Registruj se">
		</form>