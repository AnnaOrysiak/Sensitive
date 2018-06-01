<?php
session_start();

	if(!isset($_SESSION['udanarejestracja'])) {
		header('Location: ../index.php');
		exit();
	}
	else {
		unset($_SESSION['udanarejestracja']);
	}

?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Sensitive opowiadania - rejestracja nowego użytkownika</title>
		<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="style_foruser.css" type="text/css" />
	</head>
	<body>
		<div>

 Dziękujemy za rejestrację w serwisie! Możesz już zalogować się na swoje konto!<br />
 <a href="../index.php">Zaloguj na swoje konto!</a> <br/>
 

		</div>
	</body>
</html>