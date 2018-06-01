<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="style/style_config.css" type="text/css" />
    </head>
 <body onload="load();">
 <div class="userData">
	<div class="targets">
		<div class="target">Login:</div>
		<div class="target">Haslo:</div>
		<div class="target">autor:</div>
		<div class="target">Adres e-mail:</div>
		<div class="target" id="avik">Avatar:<br /><br /><br /><br /><br /><br /></div>
		<div class="target">O mnie:</div>
	</div>
	<div class="userInfo">
            
            <?php
                $author=$_SESSION['author'];
                $id=$_POST['id'];
                $znaki_hasla ='';

                include "connected.php";

                $question_contents= "SELECT * FROM uzytkownicy WHERE id='".$id."'";
                $result=$db->query('SET NAMES utf8');
                $result=$db->query($question_contents);

                $how_many=$result->num_rows;
                        for($i=0; $i<$how_many; $i++) {
                                $line=$result->fetch_assoc();
                                $how_many_signs=$line['howMany'];
                                while($how_many_signs) {
                                        $znaki_hasla.='*';	
                                        $how_many_signs=($how_many_signs-1);
                                }	
                        echo "<form action='cp/aktualizuj_config.php' method='POST' id='user2' enctype='multipart/form-data'>";
                        echo "<input type='hidden' name='id' value='".$id."' />";
                        echo "<input type='text' name='login' value=".$line['login']." disabled /><br />";
                        echo "<input type='password' name='haslo' value=".$znaki_hasla." disabled />";
                        echo "<input type='text' name='author' value=".$line['author']."><br />";
                        echo "<input type='text' name='mail' value=".$line['mail']."><br />";
                        echo "<div class='userAvatar'><div id='user_av2'><img src='img/av/".$line['avatar']."' alt='Plik w formacie png/jpg/jpeg/gif o wymiarach 100x100 px' /></div></div><input type='file' name='avatar' value=''><br />";
                        echo "<textarea name='aboutMe'>".$line['aboutMe']."</textarea><br />";
                        echo "<input type='submit' name='submit' value='Zatwierdź' />";
                        echo "</form>";
                }

            ?>
            
	</div>	
	<div style="clear:both;"></div>
</div>
    </body>
</html>
