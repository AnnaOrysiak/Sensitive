<?php
	session_start();
	
		if ($_SESSION['zalogowany']==false)
	{
		header('Location:index.php');
		exit();
	}
        
        if (isset($_POST['subsite'])) {            
            $pickcont['subsite'] = $_POST['subsite'];
        }
        
        if (isset($_POST['id'])) {
            $pickcont['id'] = $_POST['id'];
        }
        
        if ((isset($_POST['storyId']))&& empty($_POST['chapterTitle'])) {
            $subsite = 'new_chapter'; 
        }
        else if (isset($_POST['storyId'])&&($_POST['chapterTitle'])) {
            $subsite = 'edit_chapter';
        }
        
        if (isset($_GET['subsite'])) {
            $subsite = $_GET['subsite'];
        }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sensitive opowiadania *** panel autora ***</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="Shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" href="CSS/style_panel.css" type="text/css" />
	<link rel="stylesheet" href="CSS/style_lists.css" type="text/css" />
	<link rel="stylesheet" href="CSS/style_input.css" type="text/css" />
	<link rel="stylesheet" href="CSS/style_editor.css" type="text/css" />        
	<link rel="stylesheet" href="fontello/css/fontello.css" type="text/css" />
	
	<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:400,400italic,700,700italic|Poiret+One|Dancing+Script:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Courgette|Niconne|Belleza|Fondamento|Quintessential|Overlock+SC&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	 <script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
         <script type="text/javascript" src="scripts/jquery-1.12.4.min.js"></script>
	<?php include "scripts/showInfo.js"; ?>
	
</head>
<body>
	<div class="container">
            
            <?php include "cp/author.php"; ?>
            
            <div class="naviPanel">
                <?php include "cp/navipanel.php"; ?>
            </div>
            <div class="area">
                <div class="left">
                    <div class="menuPanel">
                        <?php include "cp/authorpanel.php"; ?>
                        <br />
                        <?php include "cp/projects.php"; ?>
                    </div> 
                </div>
                <div class="rightPanel">
                    <div class="editContent">
                        <span style="letter-spacing:4px; text-align:center;">
                            <h2><span style='font-size:24px; color:#BCA88F;'><i class='icon-feather'></i></span> POLE EDYCJI </h2>
                        </span><br />
                    </div>
                    <div class="editTitle">
                            <span style='color:#BCA88F;'>
                                <i class='icon-heart-filled'></i> 
                                <i class='icon-heart-filled'></i> 
                                <i class='icon-heart-filled'></i> 
                            </span>
                    </div>
                    <div class="info2">
                        <?php include "cp/info.php"; ?>
                    </div>
                    <br />
                    <div class="edit">
                        <?php include "cp/content.php";?>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="footer">
                <div class="borderImg1"></div> <br>
                - Sensitive &copy; 2018 - Anna Orysiak - wszystkie prawa zastrzeżone -
            </div>
        </div>
</body>
</html>