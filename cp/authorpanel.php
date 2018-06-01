
<?php

	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: ../index.php');
		exit();
	}
	$user=$_SESSION['author'];

        include "connected.php";
        
        $question_contents= "SELECT * FROM uzytkownicy WHERE author='".$user."'";
        $result=$db->query('SET NAMES utf8');
        $result=$db->query($question_contents);

	echo "<p>Panel autora:<b> ".$user."</b></p><br />";
	
	
	$question="SELECT * FROM kategorie WHERE author like '%".$user."%' ORDER BY category";			// określenie zapytania
	
	$result = $db->query("SET NAMES utf8");			//			żeby działały polskie znaki
	$result = $db->query($question);			//			wysłanie zapytania do bazy danych

	$how_many_found=$result->num_rows;			// odczytanie liczby znalezionych wyników
	echo "<p>Jesteś autorem <b>".$how_many_found."</b> projektów </p><br />";

	
?>
