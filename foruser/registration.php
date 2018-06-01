<?php
	session_start();
	
	if(isset($_POST['mail']))
	{
		// udana walidacja
		$wszystko_ok=true;
		
		// sprawdzenie poprawności loginu
		$login=$_POST['login'];

		if(ctype_alnum($login)==false) {
			$wszystko_ok=false;
			$_SESSION['e_login']="Login może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// sprawdzenie długości loginu
		if((strlen($login)<3) || (strlen($login)>20)) {
			$wszystko_ok=false;
			$_SESSION['e_login']= "Login musi posiadać od 3 do 20 znaków!";
		}
				
		// sprawdzenie poprawności e-maila
		$mail=$_POST['mail'];
		$mailB=filter_var($mail, FILTER_SANITIZE_EMAIL);
		
	if((filter_var($mailB, FILTER_VALIDATE_EMAIL)==false) || ($mailB!=$mail)) {
			$wszystko_ok=false;
			$_SESSION['e_mail']="Dodaj poprawny adres e-mail!";
		}
		
		// sprawdanie poprawności hasła
		$haslo1=$_POST['haslo1'];
		$haslo2=$_POST['haslo2'];
		if((strlen($haslo1)<8) || (strlen($haslo2)>20)) {
			$wszystko_ok=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		// sprawdzenie identyczności haseł
		if($haslo1!=$haslo2) {
			$wszystko_ok=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}
		$haslo_znaki=strlen($haslo1);
		$haslo_hash=password_hash($haslo1, PASSWORD_DEFAULT);
		
		// sprawdzenie akceptacji regulaminu
		if(!$_POST['regulamin']) {
			$wszystko_ok=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}
		
		// bot or not? reCAPTCHA
		$sekret="6LeWzCQTAAAAAI9K3oa1V8duSgMkXkfpsxpITgPB";
		$sprawdz=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz=json_decode($sprawdz);
		
		if($odpowiedz->success==false) {
			$wszystko_ok=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}
		
		// sprawdzenie, czy istnieje w bazie
		require_once "connect.php";
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try {
			$db = new mysqli($host, $db_user, $db_password, $db_name);
			if($db->connect_errno!=0) {
				throw new Exception(mysqli_connect_errno());
			}
			else {
				// sprawdzenie, czy mail już istnieje?
				$rezultat=$db->query("SELECT id FROM uzytkownicy WHERE mail='$mail'");
				
				if(!$rezultat) throw new Exception($db->error);
				
				$ile_maili=$rezultat->num_rows;
				if($ile_maili>0) {
					$wszystko_ok=false;
					$_SESSION['e_mail']="Istnieje już konto przypisane do takiego adresu e-mail!";
				}
				
				// sprawdzenie, czy login już istnieje?
				$rezultat=$db->query("SELECT login FROM uzytkownicy WHERE login='$login'");
				
				if(!$rezultat) throw new Exception($db->error);
				
				$ile_login=$rezultat->num_rows;
				if($ile_login>0) {
					$wszystko_ok=false;
					$_SESSION['e_login']="Istnieje już użytkownik o takim loginie! Wybierz inny!";
				}

				
		// sprawdzenie wszystkich warunków
		
		if($wszystko_ok==true) {
			if($db->query("INSERT INTO uzytkownicy (login, haslo, howMany, author, mail, avatar) VALUES ('$login', '$haslo_hash', '$haslo_znaki', 'anonim', '$mail', 'noimage.png')")) {
				
				$_SESSION['udanarejestracja']=true;
				header('Location: registryUser.php');
			}
			else {
				throw new Exception($db->error);
			}
		}
				
				
				$db->close();				
			}
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!<br /> Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
		}
		
		
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Sensitive opowiadania - Rejestracja nowego użytkownika</title>
		<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="style_foruser.css" type="text/css" />
		<script src='https://www.google.com/recaptcha/api.js'></script>			
	</head>
	<body>
		<div>
			<h1>Formularz rejestracyjny</h1>
			<form method="POST" id="formularz">
				<div id="inputs1">
					<h2><input type="text" id="login" name="login" value="" placeholder="login" onfocus="this.placeholder=' '" onblur="this.placeholder='login'" /><br />
						<?php
						if(isset($_SESSION['e_login'])) {
							echo '<div class="error">'.$_SESSION['e_login'].'</div>';
							unset($_SESSION['e_login']);
						}
						?>
					</h2>
					<h2><input type="text" id="mail" name="mail" value="" / placeholder="e-mail" onfocus="this.placeholder=' '" onblur="this.placeholder='e-mail'"><br />
						<?php
						if(isset($_SESSION['e_mail'])) {
							echo '<div class="error">'.$_SESSION['e_mail'].'</div>';
							unset($_SESSION['e_mail']);
						}
						?>
					</h2>
					<h2><input type="password" id="haslo1" name="haslo1" value="" placeholder="haslo" onfocus="this.placeholder=' '" onblur="this.placeholder='haslo'" /> </h2>
					<h2><input type="password" id="haslo2" name="haslo2" value="" placeholder="powtórz haslo" onfocus="this.placeholder=' '" onblur="this.placeholder='powtórz haslo'" /><br />
						<?php
						if(isset($_SESSION['e_haslo'])) {
							echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
							unset($_SESSION['e_haslo']);
						}
						?>
					</h2>
					<br /><br />
										<label><input type="checkbox" name="regulamin" /> Akceptuję regulamin</label><br />
						<?php
						if(isset($_SESSION['e_regulamin'])) {
							echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
							unset($_SESSION['e_regulamin']);
						}
						?>
						<br /><br />
					<div class="g-recaptcha" data-sitekey="6LeWzCQTAAAAABjwoRvwIo5Jo3b3e7TlwwxAabbA"></div>
						<?php
						if(isset($_SESSION['e_bot'])) {
							echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
							unset($_SESSION['e_bot']);
						}
						?>
				</div>
				
				<div id="accept">
					<input type="submit" value="ok" />
				</div>
			</form>
			<div id="clear"></div>
		</div>
	</body>
</html>