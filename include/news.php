<?php
	include "connected.php";
    if(array_key_exists("getOffset", $_GET)){
        $offset=$_GET["getOffset"];
        $pageNumber=$_GET["getpageNr"];
    }
    else {
        $offset=0;			
        $pageNumber=1;
    }
// ustalenie liczby notek na stronie //

$news="SELECT * FROM notki ORDER BY date DESC LIMIT 5 OFFSET ".$offset;
$result=$db->query("SET NAMES utf8");
$result=$db->query($news);
$last=$result->num_rows;
for($i=0; $i<$last; $i++) {
	$line=$result->fetch_assoc();
	echo "<div class='row align-items-start newsElement'>";
	echo "<div class='newsLeft col-2'>";	
	
	$av="SELECT  `avatar` FROM  `uzytkownicy` WHERE  `author` LIKE '".$line['author']."'";
	$w_av=$db->query($av);
	$how_many_av=$w_av->num_rows;
	for($j=0; $j<$how_many_av; $j++) {
		$w=$w_av->fetch_assoc();
		echo "<div class='newsAv'><img src='img/av/".$w['avatar']."' class='img-fluid float-left' /></div>"; 
	}
	
	echo "<div class='newsDate'>".$line['date']."</div>";
	echo "<div class='newsAuthor'>".$line['author']."</div></div>";
	echo "<div class='newsRight'>";
	echo "<div class='newsTitle'>".$line['newsTitle']."</div>";
	echo "<div class='news'>".$line['news']."</div></div>";
	echo "<div style='clear:both;'></div>";
	echo "</div>";

}
// nawigacja stronicowania //

$all = "SELECT * FROM notki ORDER BY date DESC";
$result_all=$db->query($all);
$how_many_news=$result_all->num_rows;      
$how_many_stron = ceil($how_many_news / 5);                  

// jak ustalić nr strony?

echo "<span style='text-align:center; font-size:14px; line-height:200%; display:block;'><br />";
if($offset>0) {
echo " <a href='?getOffset=".($offset-5)."&getpageNr=".($pageNumber-1)."'>Poprzednia</a> ";                
}

$how_many_before=1;
$offset_last=$offset;
$page_last=$pageNumber;
while(($how_many_before >= 1)&&($how_many_before < $pageNumber)) {
    echo " <a href='?getOffset=".($offset_last-5)."&getpageNr=".($page_last-1)."'>".$how_many_before."</a> ";         // co powinno być w linku?  GET $offset=($pageNumber-1)*5
    $how_many_before++;
}
echo "<u>".$pageNumber."</u>";

$how_many_after=$pageNumber;
$offset_next=$offset;
$page_next=$pageNumber;
while($how_many_after < $how_many_stron) {
    echo " <a href='?getOffset=".($offset_next+5)."&getpageNr=".($page_next+1)."'>".($how_many_after+1)."</a> ";
    $how_many_after++;
}

if($offset<$how_many_stron) {
echo " <a href='?getOffset=".($offset+5)."&getpageNr=".($pageNumber+1)."'>Następna</a> ";                  
}
echo "</span><br />";
        
?>

