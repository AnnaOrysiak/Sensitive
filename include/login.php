<?php

	session_start();		// ustawienie sesji

	if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))	
	{
		header('Location: ../index.php');
		exit();
	}
	
	require_once "connect.php";
	@ $db = new mysqli($host, $db_user, $db_password, $db_name);
	
	if($db->connect_errno!=0) 
	{
		echo "Error: ".$db->connect_errno;
	}
	else 
	{
	$login=$_POST['login'];
	$haslo=$_POST['haslo'];
	
	// wyeliminowanie wstrzykiwania SQL
	$login=htmlentities($login, ENT_QUOTES, "UTF-8");
	
	if($rezultat =@$db->query(sprintf("SELECT * FROM uzytkownicy WHERE login='%s'",
	mysqli_real_escape_string($db,$login))))	
	{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
				{
				$wiersz=$rezultat->fetch_assoc();
				
				if(password_verify($haslo, $wiersz['haslo'])) {
					$_SESSION['zalogowany']=true;

					
					$_SESSION['id']=$wiersz['id'];
					$_SESSION['autor']=$wiersz['autor'];
					
						unset($_SESSION['blad']);
						$rezultat->free_result();
						header('Location: ../indexpanel.php');
				}
				else {
					$_SESSION['blad'] = '<span style="color: red">Nieprawidłowy login lub hasło!</span>';
					header('Location: ../index.php');					
					
				}
			}
			else{
				$_SESSION['blad'] = '<span style="color: red">Nieprawidłowy login lub hasło!</span>';
				header('Location: ../index.php');
			}
	}
	
	$db->close();
	}
	

?>