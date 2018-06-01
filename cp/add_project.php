<?php
session_start();
?>

<html>
<head>
<meta charset="utf-8" />
<title>Sensitive opowiadania - Dodawanie nowego projektu</title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../style/style_question.css" type="text/css" />
</head>
<body>
	<div class="container-fluid">
          
	  <div class="row align-items-start logoArea">
                <img src="../img/logoMainImage.png" class="img-fluid float-left col-10 col-sm-8 col-xl-12" name="logoImg"> 
                <div class="col-12 noPadding"> <div class="repeatImgUp"> </div> </div>
                <div class="col-0 col-lg-0 col-xl-2">
                </div>
                <div class="col-8 col-lg-8 col-xl-7 align-items-center"> <div class="imgArea"> </div> </div>
                <div class="col-4 col-lg-3  col-xl-3 align-self-end"><img src="../img/logoSensitive.png" class="img-fluid"></div>
                <div class="col-12 align-self-end noPadding"> <div class="repeatImgDown"> </div> </div>
            </div>
           
            <div class="row align-items-center mainArea">
                <div class="col-12 align-self-start navibar">
                    <p>podgląd edytowanej zawartości na stronie głównej</p>
                     <?php include "../include/navibar_noactive.php";?>
                </div>
                <div class="col-0 col-md-0 col-lg-0 col-xl-1 order-1">
                </div>   
                <div class="col-0 col-sm-0 col-md-0 col-lg-3 col-xl-3 mr-md-author align-self-start order-3 d-none d-sm-none d-md-none d-lg-block menu"> 
                    <?php include "../include/menu_noactive.php";?>
                </div>
                <div class="col-12 col-md-12 col-lg-9 col-xl-7 ml-md-author align-self-start order-2">

<?php

$chapterTitle=$_POST['chapterTitle'];
$chapterTitle=$_POST['chapterTitle'];
$contents=$_POST['text'];

if(!array_key_exists('author', $_POST) || !array_key_exists('category', $_POST) || !$chapterTitle || !$chapterTitle || !$contents) {
	echo "Nie wypełniono wszystkich pól. <br />"."Wróć do poprzedniej strony i spróbuj ponownie.";
	exit;
}
$author=$_POST['author'];
$category=$_POST['category'];

if(!get_magic_quotes_gpc()) {
	$chapterTitle=addslashes($chapterTitle);
	$chapterTitle=addslashes($chapterTitle);
	$contents=addslashes($contents);
}

//		1 question		//

include "connected.php";

$author_string="";								// potrzebujemy stringa dla autorów

foreach($author as $ilu) {					// pętla dla tablic-nie-muszę-wiedzieć-jak-dużych :)		każdy element tablicy
	$author_string.=" ".$ilu;					// author zapisuj do zmiennej ilu; stwórz zmienną author_ilu typu string 
}

$question1="INSERT INTO kategorie (title, category, author) VALUES ('".$chapterTitle."', '".$category."', '".$author_string."')";
$result1=$db->query("SET NAMES utf8");
$result1=$db->query($question1);

if($result1) {
	echo "Bingo!<br/><br/>";
	echo $db->affected_rows." nowy projekt dodany do bazy. <br />";
}
else {
	echo "Wystąpił błąd. Projekt nie został dodany do bazy.<br />";
}

//		question o największy rekord id opowiadania		//
$question_id="SELECT * FROM kategorie ORDER BY storyId DESC LIMIT 1";
$result_id=$db->query($question_id);
$wiersz_id=$result_id->fetch_assoc();

$storyId=$wiersz_id['storyId'];



//		2 question		//

$question2="INSERT INTO opowiadania (storyId, chapterNumber, chapterTitle, chapterContents) VALUES ('".$storyId."', '1', '".$chapterTitle."', '".$contents."')";
$result2=$db->query("SET NAMES utf8");	
$result2=$db->query($question2);

if($result2) {
	echo "Bingo!<br/><br/>";
	echo $db->affected_rows." nowy rozdział dodany do bazy.<br/> <a href='../indexpanel.php'>Wróć</a> do panelu autora.";
}
else {
	echo "Wystąpił błąd. Rozdział nie został dodany do bazy.<br />";
}

$db->close();

?>

</div>
  <div class="col-0 col-md-0 col-lg-0 col-xl-1 order-4">
                </div>   
            </div>
            
            <div class="row align-items-end justify-content-between footer">
                <div class="col-12 noPadding"> <div class="repeatImgUp"> </div> </div>
                <div class="col-12"> <br> - Sensitive &copy; 2018 - Anna Orysiak - wszystkie prawa zastrzeżone - </div>
            </div>
    
    
     <div class="naviRight rounded-circle">
                <a href="javascript:scroll(0,0), 500;">
                    <div class="menuInput rounded-circle"><i class="icon-up rounded-circle"></i></div>
                </a> 
            </div>

        </div>
</body>
</html>