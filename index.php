<?php
	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location:indexpanel.php');
		exit();
	}
        
        // sprawdzenie, czy zmienne zostaly wyslane postem //
        if(isset($_GET['subpage'])) {
            $pickcont['subpage'] = $_GET['subpage'];
        }
        
        if(isset($_POST['chapterNumber'])) {
            $pickcont['chapter']['chapterNumber'] = $_POST['chapterNumber']; 
            $pickcont['chapter']['id'] = $_POST['id'];
                if(isset($_POST['chapterTitle'])) {
                    $pickcont['chapter']['title'] = $_POST['title'];
                }
                else {$pickcont['chapter']['title'] = "brak";}
        }
            
        else if(isset($_POST['id'])) {
            $pickcont['chapter']['id'] = $_POST['id'];
            $pickcont['chapter']['title'] = $_POST['title'];
        }

?>


<!DOCTYPE html>
<html lang="pl_PL">
  <head>
    <title>Sensitive - opowiadania</title>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS -->
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/style_menu.css">
        <link rel="stylesheet" href="CSS/style_news.css">                
        <link rel="stylesheet" href="CSS/style_chapter.css"> 
        <link rel="stylesheet" href="fontello/css/fontello.css">
    <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:400,400italic,700,700italic|Poiret+One|Dancing+Script:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Marck+Script|Courgette|Niconne|Belleza|Fondamento|Quintessential|Overlock+SC&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Others -->
        <link rel="Shortcut icon" href="favicon.ico" />
        <script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
        <?php include "scripts/login.js"; ?>
  </head>
  <body>

        <div class="container-fluid">

            <div class="row align-items-start logoArea">
                <img src="img/logoMainImage.png" class="img-fluid float-left col-10 col-sm-8 col-xl-12" name="logoImg"> 
                <div class="col-12 noPadding"> <div class="repeatImgUp"> </div> </div>
                <div class="col-0 col-lg-0 col-xl-1">
                </div>
                <div class="col-8 col-lg-7 col-xl-7 align-items-center"> <div class="imgArea"> </div> </div>
                <div class="col-4 col-lg-3  col-xl-3 align-self-end"><img src="img/logoSensitive.png" class="img-fluid"></div>
                <div class="col-0 col-lg-1 col-xl-1"> </div>
                <div class="col-12 align-self-end noPadding"> <div class="repeatImgDown"> </div> </div>
            </div>
           
            <div class="row align-items-center mainArea">
                <div class="col-12 align-self-start navibar"> 
                    <?php include "include/navibar.php";?>
                </div>
                <div class="col-0 col-md-0 col-lg-0 col-xl-1 order-1">
                </div>   
                <div class="col-0 col-sm-0 col-md-0 col-lg-3 col-xl-3 mr-md-author align-self-start order-3 d-none d-sm-none d-md-none d-lg-block menu"> 
                    <?php include "include/menu.php";?>
                </div>
                <div class="col-12 col-md-12 col-lg-9 col-xl-7 ml-md-author align-self-start order-2">  
                    <?php include "include/content.php";?>
                    <div style="clear:both;"></div>
                </div>
                <div class="col-0 col-md-0 col-lg-0 col-xl-1 order-4">
                </div>   
            </div>
            
            <div class="row align-items-end justify-content-between footer">
                <div class="col-12 noPadding"> <div class="repeatImgUp"> </div> </div>
                <div class="col-12"> <br> - Sensitive &copy; 2018 - Anna Orysiak - wszystkie prawa zastrzeżone - </div>
            </div>
            
            <div style="clear:both;"></div>
            <div class="hiddenArea rounded-circle"> 
                <div class="menuInput rounded-circle" id="userLogin"><i class="icon-user rounded-circle"></i></div> 
                <div style="clear:both;"></div>
                <div class="showHiddenArea"> <?php include "include/author_login.php"; ?></div>
            </div>
            <div class="naviRight rounded-circle">
                <a href="javascript:scroll(0,0), 500;">
                    <div class="menuInput rounded-circle"><i class="icon-up rounded-circle"></i></div>
                </a> 
            </div>

        </div>

 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
  </body>
</html>
