<?php

include "connected.php";

$question_contents= "SELECT chapterContents from opowiadania WHERE storyId='".$_POST['storyId']."' AND chapterTitle='".  rawurldecode($_POST['chapterTitle'])."'";
$result=$db->query('SET NAMES utf8');
$result=$db->query($question_contents);
 
$how_many=$result->num_rows;
for($i=0; $i<$how_many; $i++) {
	$line=$result->fetch_assoc();
	echo $line['chapterContents'];
}

?>