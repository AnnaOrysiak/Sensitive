<?php
session_start();
?>

<html>
<head>
<meta charset="utf-8" />
<title>Sensitive opowiadania - dodawanie notki</title>
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

$author=$_SESSION['author'];
$newsTitle=$_POST['title'];
$news=$_POST['text'];
$date= date("Y-m-d H:i:s");

if(!$newsTitle || !$news) {
	echo "Nie wypełniono wszystkich pól. <br />"."Wróć do poprzedniej strony i spróbuj ponownie.";
	exit;
}

if(!get_magic_quotes_gpc()) {
	$newsTitle=addslashes($newsTitle);
	$news=addslashes($news);
}

include "connected.php";

$question="INSERT INTO notki (newsTitle, news, author, date) VALUES ('".$newsTitle."', '".$news."', '".$author."', '".$date."')";
$result=$db->query("SET NAMES utf8");	
$result=$db->query($question);

if($result) {
	echo "Bingo!<br/><br/>";
	echo $db->affected_rows." notka dodana do bazy.<br/> <a href='../indexpanel.php'>Wróć</a> do panelu autora.";
}
else {
	echo "Wystąpił błąd. Notka nie została dodana do bazy.<br />";
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