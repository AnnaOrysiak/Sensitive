<?php
session_start();
?>

<html>
<head>
<meta charset="utf-8" />
<title>Sensitive opowiadania - aktualizacja istniejącego projektu</title>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:400,400italic,700,700italic|Poiret+One|Dancing+Script:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Courgette|Niconne|Belleza|Fondamento|Quintessential|Overlock+SC&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<link rel="stylesheet" href="../CSS/style.css" type="text/css" />
                <link rel="stylesheet" href="../CSS/style_menu.css" type="text/css" />
                <link rel="stylesheet" href="../CSS/style_news.css" type="text/css" />                
                <link rel="stylesheet" href="../CSS/style_chapter.css" type="text/css" /> 
                <link rel="stylesheet" href="../fontello/css/fontello.css" type="text/css" />
                
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

$storyId=$_POST['storyId'];
$chapterNumber=$_POST['chapterNumber'];
$chapterTitle=$_POST['chapterTitle'];
$contents=$_POST['text'];


if(empty($chapterTitle) || empty($contents)) {
	echo "Nie wypełniono wszystkich pól. <br />"."Wróć do poprzedniej strony i spróbuj ponownie.";
	exit;
}

if(!get_magic_quotes_gpc()) {
	$chapterTitle=addslashes($chapterTitle);
	$contents=addslashes($contents);
}

//		1 question		//

include "connected.php";


$question="UPDATE opowiadania SET chapterTitle='".$chapterTitle."', chapterContents='".$contents."' WHERE storyId=".$storyId." AND chapterNumber=".$chapterNumber;
$result=$db->query("SET NAMES utf8");	
$result=$db->query($question);

if($result) {
//	echo $db->affected_rows;
	echo "Bingo!<br/><br/>";
	echo "Edycja zakończona sukcesem. Oto efekt Twojej pracy. <a href='../indexpanel.php'>Wróć</a> do panelu autora.<br/><p><br/></p>";
	echo "<div class='chapterContainer'>";
	echo "<div class='chapterTitle'>".$chapterTitle."</div>";
	echo "<div class='chapterContent'>".$contents."</div>";
	echo "</div>";
}
else {
	echo "Wystąpił błąd. Rozdział nie został zedytowany.<br />";
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