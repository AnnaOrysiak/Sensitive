<?php

	require_once "connect.php";
	@ $db = new mysqli($host, $db_user, $db_password, $db_name);
// @ $db = new mysqli('mysql.hostinger.pl','u367812720_autor','jkEURk6lF2rhMSj','u367812720_sens');
	
	if (mysqli_connect_errno()) {
		echo 'Błąd: Połączenie z bazą danych nie powiodło się. Spróbuj ponownie lub wróć później.';			
	}	
	?>