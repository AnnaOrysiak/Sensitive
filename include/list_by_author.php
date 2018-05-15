<?php

echo "<div class='tytul_r'>Spis wg autorów</div><div class='tresc_r'>";

include "connected.php";

    $wyswiet_l = "SELECT DISTINCT autor FROM kategorie ORDER BY autor ASC";
    $wynik_autor = $db->query("SET NAMES utf8");
    $wynik_autor = $db->query($wyswiet_l);
    
    $ile_autor = $wynik_autor -> num_rows;
    
    for($a=0; $a < $ile_autor; $a++) {
        $wiersz = $wynik_autor->fetch_assoc();
        $autor = $wiersz['autor'];        
        echo "<h2><span style='color: #B4A38F'><i class='icon-heart-filled'></i></span>".$autor."</h2>";
        
        $wyswietl_2 = "SELECT * FROM kategorie WHERE autor LIKE '".$autor."' ORDER BY kategoria";
        $wynik_alfabet = $db->query($wyswietl_2);
        
        $ile_alfabet = $wynik_alfabet->num_rows;

        for($b1=0; $b1 < $ile_alfabet; $b1++) {
            $wiersz = $wynik_alfabet -> fetch_assoc();
            $id = $wiersz['opowiadanie_id']; 
            

            if (($wiersz['kategoria']=="Opowiadanie")||($wiersz['kategoria']=="Wiersz")){
                        echo "<div class='tytul_kategorie'>".$wiersz['tytul']." <div class='kategoria'>(".$wiersz['kategoria'].") </div></div> <br />";
                            
                            $wyswietl_podtytul = "SELECT * FROM opowiadania WHERE opowiadanie_id=".$id;
                            $wynik_podtytul = $db->query($wyswietl_podtytul);

                            $ile = $wynik_podtytul -> num_rows;

                            for($b2=0; $b2 < $ile; $b2++) {
                                $wiersz = $wynik_podtytul->fetch_assoc();
                            echo "<div class='podtytul'>
                                    <form action='index.php' method='post' class='rozdzial_open'>
                                       <input type='hidden' name='tytul' value='".(rawurlencode($wiersz['rozdzial_tytul']))."' />        
                                       <input type='hidden' name='id' value='".$id."' />
                                       <input type='hidden' name='rozdzial_nr' value='".$wiersz['rozdzial_nr']."' />
                                       <input type='submit' name='podtytul' value='".$wiersz['rozdzial_tytul']."' />         
                                    </form></div>";
                            }
                        }    
            else {
                           
                $tytul=$wiersz['tytul']; 
                $kategoria = $wiersz['kategoria'];
                
                $wyswietl_podtytul_2 = "SELECT * FROM opowiadania WHERE opowiadanie_id=".$id;
                $wynik_podtytul_2 = $db->query($wyswietl_podtytul_2);              
                
                    $ile_2 = $wynik_podtytul_2->num_rows;                                  
                    for($c=0; $c < $ile_2; $c++) {
                        $wiersz = $wynik_podtytul_2->fetch_assoc();
                    echo "<div class='tytul_kategorie'>
                            <form action='index.php' method='post' class='rozdzial_open'>
                               <input type='hidden' name='tytul' value='".(rawurlencode($wiersz['rozdzial_tytul']))."' />        
                               <input type='hidden' name='id' value='".$id."' />
                               <input type='submit' name='tytul' value='".$tytul."' />         
                            </form><div class='kategoria'> (".$kategoria.")</div></div>";
                    }  
            }
                echo "<br />";
        }
    }
 echo "</div>";
?>

