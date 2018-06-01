<?php
session_start();
?>

<html>
<head>
<meta charset="utf-8" />
<title>Sensitive opowiadania - edycja ustawień</title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../style/style_question.css" type="text/css" />
</head>
<body>
<div>

<?php


				$target_dir = __DIR__."/../img/av/";
				$target_file = $target_dir . str_replace(" ", "", basename($_FILES["avatar"]["name"]));
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["avatar"]["tmp_name"]);
					if($check !== false) {
						echo "Plik ma format " . $check["mime"] . ".<br/>";
						$uploadOk = 1;
					} else {
						echo "Plik nie jest obrazem!<br/>";
						$uploadOk = 0;
					}
				}
				// Check if file already exists
				if (file_exists($target_file)) {
					echo "Plik o takiej nazwie już istnieje!<br/>";
					$uploadOk = 0;
				}
				// Check file size
				if ($_FILES["avatar"]["size"] > 20000) {
					echo "Plik jest za duży.<br/>";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Format pliku nie spełnia wymagań!<br/>";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Błąd! <br/>Twój plik nie został dodany.<br/>";
					exit;
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
						echo "Plik ". basename( $_FILES["avatar"]["name"]). " został dodany.<br/>";
					} else {
						echo "Błąd! Twój plik nie został dodany.<br/>";
						exit;
					}
				}



$id=$_POST['id'];
$author=$_POST['author'];
$mail=$_POST['mail'];
$aboutMe=$_POST['aboutMe'];


if(!get_magic_quotes_gpc()) {
	$author=addslashes($author);
	$mail=addslashes($mail);
	$aboutMe=addslashes($aboutMe);
}

//		1 question		//

include "connected.php";


$question="UPDATE uzytkownicy SET author='".$author."', mail='".$mail."', avatar='".str_replace(" ", "", basename($_FILES["avatar"]["name"]))."', aboutMe='".$aboutMe."' WHERE id=".$id;
$result=$db->query("SET NAMES utf8");	
$result=$db->query($question);

if($result) {
//	echo $db->affected_rows;
	echo "<br/>";
	echo "Edycja zakończona sukcesem.<br/>
		<a href='../indexpanel.php'>Wróć</a> do panelu authora";
}
else {
	echo "Wystąpił błąd. Ustawienia nie zostały zmienione.<br />";
}


$db->close();

?>

</div>
</body>
</html>