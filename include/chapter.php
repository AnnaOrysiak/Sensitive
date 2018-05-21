
<?php

        if (isset($_POST['chapterNumber'])){
            $chapterNumber = $pickcont['chapter']['chapterNumber'];}
        else {
            $chapterNumber = 1;
            
        }
        $id = $pickcont['chapter']['id'];
        $title = $pickcont['chapter']['title'];
        

	include "connected.php";	

		$chapter="SELECT * FROM opowiadania WHERE storyId='".$id."' AND chapterNumber='".$chapterNumber."'";
		$result=$db->query("SET NAMES utf8");
		$result=$db->query($chapter);

		$how_many=$result->num_rows;
		
		for($i=0; $i<$how_many; $i++) {
			$line=$result->fetch_assoc();
			echo "<div class='chapterContainer'>";
			echo "<div class='chapterTitle'>".$line['chapterTitle']."</div>";
			echo "<div class='chapterContent'>".$line['chapterContents']."</div>";
			
                        
                        /***************** ustawienie numerowania chapterow ******************/
                        
			$ktory_chapter=$line['chapterNumber'];
			$poprzedni=$ktory_chapter-1;		
			$nastepny=$ktory_chapter+1;		
			
			$numerowanie="SELECT chapterNumber FROM opowiadania WHERE storyId='".$id."'";
			$w=$db->query($numerowanie);
			$how_many_nr=$w->num_rows;
			for($n=0; $n<$how_many_nr; $n++){		
				$chaptery=$w->fetch_assoc();
				
				if($chaptery['chapterNumber']==$poprzedni) {
					$_SESSION['prev']="<form action='index.php' method='post'>
                                            <input type='hidden' value='$poprzedni' id='previcon' name='chapterNumber' />
                                            <input type='hidden' value='$id' id='previd' name='id' />
                                            <button type='submit' class='chapterIcon'>
                                                    <i class='icon-left-open'></i>
                                            </button>
                                        </form>";                                        
                                }
	
				if($chaptery['chapterNumber']==$nastepny) {	
					$_SESSION['next']="<form action='index.php' method='post'>
                                            <input type='hidden' value='$nastepny' id='nexticon' name='chapterNumber' />           
                                            <input type='hidden' value='$id' id='nextid' name='id' />          
                                            <button type='submit' class='chapterIcon'>
                                                    <i class='icon-right-open'></i>
                                            </button>
					</form>";
				}	
			}
	
			echo "<div class='chapterPagination'>";
			
				if(isset($_SESSION['prev'])) {
								echo $_SESSION['prev'];
								unset($_SESSION['prev']);
							}			
				else {echo "<div class='chapterIcon'>&nbsp</div>";}
							
			echo	"<div class='chapterSpace'>  &nbsp </div>";
			
				if(isset($_SESSION['next'])) {
								echo $_SESSION['next'];
								unset($_SESSION['next']);
							}
				else {echo "<div class='chapterIcon'>&nbsp</div>";}
				
			echo "</div>";
			
				$chapter="SELECT author, category FROM kategorie WHERE storyId=".$id;
				$result=$db->query("SET NAMES utf8");
				$result=$db->query($chapter);
				$how_many=$result->num_rows;
				for($j=0; $j<$how_many; $j++) {
						$line=$result->fetch_assoc();
						
							if($line['category']!='wiersz') {
								echo "<div class='chapterAuthor'>".$line['author']."</div>";
							}
				}
				if(!empty($line['poemAuthor'])) {
					echo "<div class='chapterAuthor'>".$line['poemAuthor']."</div>";
				}
			echo "</div>";

		}

?>