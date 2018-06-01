
<?php

	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: ../index.php');
		exit();
	}
	$author=$_SESSION['author'];

        include "connected.php";
        
        $question_contents= "SELECT * FROM uzytkownicy WHERE author='".$author."'";
        $result=$db->query('SET NAMES utf8');
        $result=$db->query($question_contents);

        $how_many=$result->num_rows;
                for($i=0; $i<$how_many; $i++) {
                        $line=$result->fetch_assoc();
                echo "<div class='authorImg' style='background-image: url(img/log_av/".$line['avatar'].")'>";
                echo "<div class='borderImg1'></div>";
                echo "<div class='logo'> <i class='icon-feather'></i><span style='color:#FAEEE0;'>Sensitive</span> </div>";
                echo "<div class='borderImg2'></div></div>";
                }
        
	
?>
