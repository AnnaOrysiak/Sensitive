<?php

	$kto=$_SESSION['author'];

include "connected.php";	

echo "<a href='indexpanel.php?subsite=new_project'><div id='nproject'><span style='color:#9C886F;'><i class='icon-feather'></i></span> Utwórz nowy projekt</div></a>";
echo "<a href='indexpanel.php?subsite=new_news'><div id='nnews'><span style='color:#9C886F;'><i class='icon-feather'></i></span> Napisz nową notkę</div></a>";

	echo "<div class='category'>Opowiadania";
		$question_opow="SELECT * FROM kategorie WHERE author LIKE '%".$kto."%' AND category LIKE 'Opowiadanie' ORDER BY title";			// określenie zapytania

		$result_opow=$db->query("SET NAMES utf8");		//  żeby działały polskie znaki
		$result_opow=$db->query($question_opow);			//			wysłanie zapytania do bazy danych
		
		$how_many_opow=$result_opow->num_rows;			// odczytanie liczby znalezionych resultów
		
		for($i=0; $i<$how_many_opow; $i++) {
			$line=$result_opow->fetch_assoc();
			
			echo "<div class='project'> ".($line['title'])."</div>";
		
		$storyId=$line['storyId'];
		$chapterTitle=$line['title'];

			
			$question_chapter="SELECT * FROM opowiadania WHERE storyId = ".$storyId." ORDER BY chapterNumber";
			$result_chapter=$db->query($question_chapter);
			$how_many_chapter=$result_chapter->num_rows;	
				for($j=0; $j<$how_many_chapter; $j++) {
					$line=$result_chapter->fetch_assoc();
					echo "<form action='indexpanel.php' method='post' class='chapter'>
								<input type='hidden'  name='storyTitle' value=".(rawurlencode($chapterTitle)).">
								<input type='hidden' name='chapterTitle' value=".(rawurlencode($line['chapterTitle']))." />
								<input type='hidden'  name='storyId' value=".($storyId)." />
								<input type='hidden'  name='chapterNumber' value=".($line['chapterNumber'])." />
								<button type='submit' id='title'>
									<span style='color:#9C886F;'>
										<i class='icon-feather'></i>
									</span> ".($line['chapterTitle'])."
								</button>
							</form>"; 
				}
				echo "<form action='indexpanel.php' method='post' class='nchapter'>
						<input type='hidden'  name='storyTitle' value=".(rawurlencode($chapterTitle))." />
						<input type='hidden'  name='storyId' value=".($storyId)." />
                                                <input type='hidden'  name='chapterNumber' value=".($j+1)." />
							<button type='submit'><span style='color:#9C886F;'><i class='icon-feather'></i></span> Nowy rozdział</button>
						</form>";
			
		}
	echo "</div>";
	
	echo "<div class='category'>Pozostałe";
	
	
		echo "<div class='project'> One-shot</div>";
			$question_one="SELECT * FROM kategorie WHERE author LIKE '%".$kto."%' AND category LIKE 'One-shot' ORDER BY title";
			$result_one=$db->query($question_one);
			$how_many_one=$result_one->num_rows;

			for($i=0; $i<$how_many_one; $i++) {
				$line=$result_one->fetch_assoc();
				
				$storyId=$line['storyId']; 
				$chapterTitle=$line['title'];    
				
                                $question_chapter="SELECT * FROM opowiadania WHERE storyId = ".$storyId." ORDER BY chapterNumber";
                                $result_chapter=$db->query($question_chapter);
                                $how_many_chapter=$result_chapter->num_rows;	
				for($j=0; $j<$how_many_chapter; $j++) {
					$line=$result_chapter->fetch_assoc();
					echo "<form action='indexpanel.php' method='post' class='chapter'>
								<input type='hidden'  name='storyTitle' value=".(rawurlencode($chapterTitle)).">
								<input type='hidden' name='chapterTitle' value=".(rawurlencode($line['chapterTitle']))." />
								<input type='hidden'  name='storyId' value=".($storyId)." />
								<input type='hidden'  name='chapterNumber' value=".($line['chapterNumber'])." />
								<button type='submit' id='title'>
									<span style='color:#9C886F;'>
										<i class='icon-feather'></i>
									</span> ".$chapterTitle."
								</button>
							</form>"; 
                                }
                        }
			
		
		echo "<div class='project'> FanFic</div>";
			$question_fanfic="SELECT * FROM kategorie WHERE author LIKE '%".$kto."%' AND category LIKE 'FanFic' ORDER BY title";
			$result_fanfic=$db->query($question_fanfic);
			$how_many_fanfic=$result_fanfic->num_rows;
			
			
			for($i=0; $i<$how_many_fanfic; $i++) {
				$line=$result_fanfic->fetch_assoc();
				
				$storyId=$line['storyId'];
				$chapterTitle=$line['title'];
				
                                $question_chapter="SELECT * FROM opowiadania WHERE storyId = ".$storyId." ORDER BY chapterNumber";
                                $result_chapter=$db->query($question_chapter);
                                $how_many_chapter=$result_chapter->num_rows;	
				for($j=0; $j<$how_many_chapter; $j++) {
					$line=$result_chapter->fetch_assoc();
					echo "<form action='indexpanel.php' method='post' class='chapter'>
								<input type='hidden'  name='storyTitle' value=".(rawurlencode($chapterTitle)).">
								<input type='hidden' name='chapterTitle' value=".(rawurlencode($line['chapterTitle']))." />
								<input type='hidden'  name='storyId' value=".($storyId)." />
								<input type='hidden'  name='chapterNumber' value=".($line['chapterNumber'])." />
								<button type='submit' id='title'>
									<span style='color:#9C886F;'>
										<i class='icon-feather'></i>
									</span> ".$chapterTitle."
								</button>
							</form>"; 
                                }
			}
		

		$question_wiersz="SELECT * FROM kategorie WHERE author LIKE '%".$kto."%' AND category LIKE 'Wiersz' ORDER BY title";
		$result_wiersz=$db->query($question_wiersz);
		$how_many_wiersz=$result_wiersz->num_rows;
		
		for($i=0; $i<$how_many_wiersz; $i++) {
			$line=$result_wiersz->fetch_assoc();
			echo "<div class='project'> ".($line['title'])."</div>";
			
			$storyId=$line['storyId'];
			$chapterTitle=$line['title'];
			
			$question_wiersze="SELECT * FROM opowiadania WHERE storyId = ".$storyId." ORDER BY chapterNumber";
			$result_wiersze=$db->query($question_wiersze);
			$how_many_wiersze=$result_wiersze->num_rows;
			for($j=0; $j<$how_many_wiersze; $j++) {
				$line=$result_wiersze->fetch_assoc();
					echo "<form action='indexpanel.php' method='post' class='wiersz'>
							<input type='hidden'  name='storyTitle' value=".(rawurlencode($chapterTitle)).">
							<input type='hidden' name='chapterTitle' value=".(rawurlencode($line['chapterTitle']))." />
							<input type='hidden'  name='storyId' value=".($storyId)." />
                                                        <input type='hidden'  name='chapterNumber' value=".($line['chapterNumber'])." />
							<button type='submit' id='title'>
								<span style='color:#9C886F;'>
									<i class='icon-feather'></i>
								</span> ".($line['chapterTitle'])."
							</button>
						</form>"; 
			}
			echo "<form action='indexpanel.php' method='post' class='nwiersz'>
					<input type='hidden'  name='storyTitle' value=".(rawurlencode($chapterTitle))." />
					<input type='hidden'  name='storyId' value=".($storyId)." />
                                        <input type='hidden'  name='chapterNumber' value=".($j+1)." />    
						<button type='submit'>
							<span style='color:#9C886F;'>
								<i class='icon-feather'></i>
							</span> Nowy wiersz
							</button>
					</form>";
			

			}
        echo "</div>";
	
	
	mysqli_close($db);
?>