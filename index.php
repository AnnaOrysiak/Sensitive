<?php
	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location:indexpanel.php');
		exit();
	}
        
        // sprawdzenie, czy zmienne zostaly wyslane postem //
        if(isset($_GET['podstrona'])) {
            $pickcont['podstrona'] = $_GET['podstrona'];
        }
        
        if(isset($_POST['rozdzial_nr'])) {
            $pickcont['rozdzial']['rozdzial_nr'] = $_POST['rozdzial_nr']; 
            $pickcont['rozdzial']['id'] = $_POST['id'];
                if(isset($_POST['rozdzial_tytul'])) {
                    $pickcont['rozdzial']['tytul'] = $_POST['tytul'];
                }
                else {$pickcont['rozdzial']['tytul'] = "brak";}
            }
        else if(isset($_POST['id'])) {
            $pickcont['rozdzial']['id'] = $_POST['id'];
            $pickcont['rozdzial']['tytul'] = $_POST['tytul'];
        }

?>


<!doctype html>
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
  </head>
  <body>

        <div class="container-fluid">

            <div class="row align-items-start logoArea">
                <img src="img/sensitive_us.png" class="img-fluid float-left" name="logoImg"> 
                <div class="col-12"> <div class="repeatImgUp"> </div> </div>
                <div class="col-8">  </div>
                <div class="col-4 align-self-end h1"><span style="color: #9C886F;"><i class="icon-feather"></i></span>Sensitive</div>
                <div class="col-12 align-self-end"> <div class="repeatImgDown"> </div> </div>
            </div>
           
            <div class="row align-items-center mainArea">
                <div class="col-12 align-self-start navibar"> 
                    <?php include "include/navibar.php";?>
                </div>
                <div class="col-12 col-md-4 mr-md-auto align-self-start order-2 d-none d-md-block menu"> 
                    <?php include "include/menu.php";?>
                </div>
                <div class="col-12 col-md-8 ml-md-auto align-self-start order-1 content">  
                    <?php include "include/content.php";?>
                    <div style="clear:both;"></div>
                </div>
            </div>
            
            <div class="row align-items-end justify-content-between footer">
                <div class="col-12"> <div class="repeatImgUp"> </div> </div>
                <div class="col-12"> STOPKA </div>
            </div>
            
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Uwaga!</strong> Jestem komunikatem, który możesz zamknąć.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>

 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
