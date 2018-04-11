<?php

include "connected.php";

//	wyświetlenie tytułów opowiadań wg tytułu

	$zapytanie1= "SELECT * FROM kategorie WHERE kategoria LIKE 'Opowiadanie' ORDER BY tytul";
	$wynik1=$db->query("SET NAMES utf8");
	$wynik1=$db->query($zapytanie1);

	$ile1=$wynik1->num_rows;
	for($i=0; $i<$ile1; $i++) {
		$wiersz=$wynik1->fetch_assoc();
		
		echo "<div class='opowiadanie'><div class='opowiadanie_tytul'>".$wiersz['tytul']."</div>";
		$opowiadanie_id=$wiersz['opowiadanie_id'];
		
		// wyświetlenie elementów projektu wg nr rozdzialu
		$zapytanie1a="SELECT * FROM opowiadania WHERE opowiadanie_id=".$opowiadanie_id;
		$wynik1a=$db->query($zapytanie1a);
		
		$ile1a=$wynik1a->num_rows;
		for($j=0; $j<$ile1a; $j++) {
			$wiersz=$wynik1a->fetch_assoc();
                        echo "<form action='index.php' method='post' class='rozdzial_open'>
                                    <input type='hidden' name='tytul' value='".(rawurlencode($wiersz['rozdzial_tytul']))."' />        
                                    <input type='hidden' name='id' value='".$opowiadanie_id."' />
                                    <input type='hidden' name='rozdzial_nr' value='".$wiersz['rozdzial_nr']."' />
                                    <input type='submit' name='tytul' value='".$wiersz['rozdzial_tytul']."' />         
			</form>";
		}
		echo "</div>";
	}


	echo "<div class='opowiadanie'><div class='opowiadanie_tytul'>One-shot</div>";
	
// wyświetlenie tytułów one-shotów

	$zapytanie2= "SELECT * FROM kategorie WHERE kategoria LIKE 'One-shot' ORDER BY tytul";
	$wynik2=$db->query("SET NAMES utf8");
	$wynik2=$db->query($zapytanie2);

	$ile2=$wynik2->num_rows;
	for($i=0; $i<$ile2; $i++) {
		$wiersz=$wynik2->fetch_assoc();
		$opowiadanie_id=$wiersz['opowiadanie_id'];
		echo "<form action='index.php' method='post' class='rozdzial_open'>
					<input type='hidden' name='tytul' value='".(rawurlencode($wiersz['tytul']))."' />	
					<input type='hidden' name='id' value='".$opowiadanie_id."' />
					<input type='submit' name='tytul' value='".$wiersz['tytul']."' />
				</form>";
	}
	echo "</div>";

	
	echo "<div class='opowiadanie'><div class='opowiadanie_tytul'>FanFic</div>";
	
// wyświetlenie tytułów fanficków

	$zapytanie3= "SELECT * FROM kategorie WHERE kategoria LIKE 'FanFic' ORDER BY tytul";
	$wynik3=$db->query("SET NAMES utf8");
	$wynik3=$db->query($zapytanie3);

	$ile3=$wynik3->num_rows;
	for($i=0; $i<$ile3; $i++) {
		$wiersz=$wynik3->fetch_assoc();
		$opowiadanie_id=$wiersz['opowiadanie_id'];
		echo "<form action='index.php' method='post' class='rozdzial_open'>
					<input type='hidden' name='tytul' value='".(rawurlencode($wiersz['tytul']))."' />	
					<input type='hidden' name='id' value='".$opowiadanie_id."' />
					<input type='submit' name='tytul' value='".$wiersz['tytul']."' />
				</form>";
	}
	echo "</div>";

	
//	wyświetlenie tytułów wierszy wg tytułu

	$zapytanie4= "SELECT * FROM kategorie WHERE kategoria LIKE 'Wiersz' ORDER BY tytul";
	$wynik4=$db->query("SET NAMES utf8");
	$wynik4=$db->query($zapytanie4);

	$ile4=$wynik4->num_rows;
	for($i=0; $i<$ile4; $i++) {
		$wiersz=$wynik4->fetch_assoc();
		
		echo "<div class='opowiadanie'><div class='opowiadanie_tytul'>".$wiersz['tytul']."</div>";
		$opowiadanie_id=$wiersz['opowiadanie_id'];
		
		// wyświetlenie elementów projektu wg nr rozdzialu
		$zapytanie4a="SELECT * FROM opowiadania WHERE opowiadanie_id=".$opowiadanie_id;
		$wynik4a=$db->query($zapytanie4a);
		
		$ile4a=$wynik4a->num_rows;
		for($j=0; $j<$ile4a; $j++) {
			$wiersz=$wynik4a->fetch_assoc();
			echo "<form action='index.php' method='post' class='rozdzial_open'>
					<input type='hidden' name='tytul' value='".(rawurlencode($wiersz['rozdzial_tytul']))."' />
					<input type='hidden' name='id' value='".$opowiadanie_id."' />
                                        <input type='hidden' name='rozdzial_nr' value='".$wiersz['rozdzial_nr']."' />
					<input type='submit' name='tytul' value='".$wiersz['rozdzial_tytul']."' />
				</form>";
		}
		echo "</div>";
	}
	
?>