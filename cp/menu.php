<?php

include "connected.php";

//	wyświetlenie tytułów opowiadań wg tytułu

	$question1= "SELECT * FROM kategorie WHERE category LIKE 'Opowiadanie' ORDER BY title";
	$result1=$db->query("SET NAMES utf8");
	$result1=$db->query($question1);

	$how_many1=$result1->num_rows;
	for($i=0; $i<$how_many1; $i++) {
		$line=$result1->fetch_assoc();
		
		echo "<div class='opowiadanie'><div class='chapterTitle'>".$line['title']."</div>";
		$storyId=$line['storyId'];
		
		// wyświetlenie elementów projektu wg nr chapteru
		$question1a="SELECT * FROM opowiadania WHERE storyId=".$storyId;
		$result1a=$db->query($question1a);
		
		$how_many1a=$result1a->num_rows;
		for($j=0; $j<$how_many1a; $j++) {
			$line=$result1a->fetch_assoc();
                        echo "<input type='submit' name='title' value='".$line['chapterTitle']."' />";
		}
		echo "</div>";
	}


	echo "<div class='opowiadanie'><div class='chapterTitle'>One-shot</div>";
	
// wyświetlenie tytułów one-shotów

	$question2= "SELECT * FROM kategorie WHERE category LIKE 'One-shot' ORDER BY title";
	$result2=$db->query("SET NAMES utf8");
	$result2=$db->query($question2);

	$how_many2=$result2->num_rows;
	for($i=0; $i<$how_many2; $i++) {
		$line=$result2->fetch_assoc();
		$storyId=$line['storyId'];
		echo "<input type='submit' name='title' value='".$line['title']."' />";
	}
	echo "</div>";

	
	echo "<div class='opowiadanie'><div class='chapterTitle'>FanFic</div>";
	
// wyświetlenie tytułów fanficków

	$question3= "SELECT * FROM kategorie WHERE category LIKE 'FanFic' ORDER BY title";
	$result3=$db->query("SET NAMES utf8");
	$result3=$db->query($question3);

	$how_many3=$result3->num_rows;
	for($i=0; $i<$how_many3; $i++) {
		$line=$result3->fetch_assoc();
		$storyId=$line['storyId'];
		echo "<input type='submit' name='title' value='".$line['title']."' />";
	}
	echo "</div>";

	
//	wyświetlenie tytułów wierszy wg tytułu

	$question4= "SELECT * FROM kategorie WHERE category LIKE 'Wiersz' ORDER BY title";
	$result4=$db->query("SET NAMES utf8");
	$result4=$db->query($question4);

	$how_many4=$result4->num_rows;
	for($i=0; $i<$how_many4; $i++) {
		$line=$result4->fetch_assoc();
		
		echo "<div class='opowiadanie'><div class='chapterTitle'>".$line['title']."</div>";
		$storyId=$line['storyId'];
		
		// wyświetlenie elementów projektu wg nr chapteru
		$question4a="SELECT * FROM opowiadania WHERE storyId=".$storyId;
		$result4a=$db->query($question4a);
		
		$how_many4a=$result4a->num_rows;
		for($j=0; $j<$how_many4a; $j++) {
			$line=$result4a->fetch_assoc();
			echo "<input type='submit' name='title' value='".$line['chapterTitle']."' />";
		}
		echo "</div>";
	}
	
?>