<?php
	include "connected.php";
    if(array_key_exists("getOffset", $_GET)){
        $offset=$_GET["getOffset"];
        $nr_strony=$_GET["getNrstrony"];
    }
    else {
        $offset=0;			
        $nr_strony=1;
    }
// ustalenie liczby notek na stronie //

$notki="SELECT * FROM notki ORDER BY data DESC LIMIT 5 OFFSET ".$offset;
$wynik=$db->query("SET NAMES utf8");
$wynik=$db->query($notki);
$ostatnie=$wynik->num_rows;
for($i=0; $i<$ostatnie; $i++) {
	$wiersz=$wynik->fetch_assoc();
	echo "<div class='row align-items-start newsElement'>";
	echo "<div class='newsLeft col-2'>";	
	
	$av="SELECT  `avatar` FROM  `uzytkownicy` WHERE  `autor` LIKE '".$wiersz['autor']."'";
	$w_av=$db->query($av);
	$ile_av=$w_av->num_rows;
	for($j=0; $j<$ile_av; $j++) {
		$w=$w_av->fetch_assoc();
		echo "<div class='newsAv'><img src='img/av/".$w['avatar']."' class='img-fluid float-left' /></div>"; 
	}
	
	echo "<div class='newsDate'>".$wiersz['data']."</div>";
	echo "<div class='newsAuthor'>".$wiersz['autor']."</div></div>";
	echo "<div class='newsRight'>";
	echo "<div class='newsTitle'>".$wiersz['notka_tytul']."</div>";
	echo "<div class='news'>".$wiersz['notka']."</div></div>";
	echo "<div style='clear:both;'></div>";
	echo "</div>";

}
// nawigacja stronicowania //

$wszystkie = "SELECT * FROM notki ORDER BY data DESC";
$wynik_wszystkie=$db->query($wszystkie);
$ile_notek=$wynik_wszystkie->num_rows;      
$ile_stron = ceil($ile_notek / 5);                  

// jak ustalić nr strony?

echo "<span style='text-align:center; font-size:14px; line-height:200%; display:block;'><br />";
if($offset>0) {
echo " <a href='?getOffset=".($offset-5)."&getNrstrony=".($nr_strony-1)."'>Poprzednia</a> ";                
}

$ile_przed=1;
$offset_mniej=$offset;
$strona_mniej=$nr_strony;
while(($ile_przed >= 1)&&($ile_przed < $nr_strony)) {
    echo " <a href='?getOffset=".($offset_mniej-5)."&getNrstrony=".($strona_mniej-1)."'>".$ile_przed."</a> ";         // co powinno być w linku?  GET $offset=($nr_strony-1)*5
    $ile_przed++;
}
echo "<u>".$nr_strony."</u>";

$ile_po=$nr_strony;
$offset_wiecej=$offset;
$strona_wiecej=$nr_strony;
while($ile_po < $ile_stron) {
    echo " <a href='?getOffset=".($offset_wiecej+5)."&getNrstrony=".($strona_wiecej+1)."'>".($ile_po+1)."</a> ";
    $ile_po++;
}

if($offset<$ile_stron) {
echo " <a href='?getOffset=".($offset+5)."&getNrstrony=".($nr_strony+1)."'>Następna</a> ";                  
}
echo "</span><br />";
        
?>

