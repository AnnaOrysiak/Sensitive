<?php

echo "<div class='tytul_r'>Spis alfabetyczny</div><div class='tresc_r'>";

include "connected.php";

    $wyswietl = "SELECT * FROM kategorie ORDER BY tytul";
    $wynik_alfabet = $db->query("SET NAMES utf8");
    $wynik_alfabet = $db->query($wyswietl);
    
    $ile_alfabet = $wynik_alfabet -> num_rows;
    
    for($a=0; $a < $ile_alfabet; $a++) {
        $wiersz = $wynik_alfabet -> fetch_assoc();
        $id = $wiersz['opowiadanie_id'];       
        
        if (($wiersz['kategoria']=="Opowiadanie")||($wiersz['kategoria']=="Wiersz")){
                    echo "<div class='tytul_kategorie'><div class='tytul_kat'>".$wiersz['tytul']."</div> <div class='kategoria'>(".$wiersz['kategoria'].") </div></div> <br />";
                        $wyswietl_podtytul = "SELECT * FROM opowiadania WHERE opowiadanie_id=".$id;
                        $wynik_podtytul = $db->query($wyswietl_podtytul);

                        $ile = $wynik_podtytul -> num_rows;

                        for($pod=0; $pod < $ile; $pod++) {
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
            $kategoria = $wiersz['kategoria'];
            $wyswietl_podtytul = "SELECT * FROM opowiadania WHERE opowiadanie_id=".$id;
                $wynik_podtytul = $db->query($wyswietl_podtytul);

                $ile = $wynik_podtytul->num_rows;
                for($b=0; $b < $ile; $b++) {
                    $wiersz = $wynik_podtytul->fetch_assoc();
                echo "<div class='tytul_kategorie'>
                        
                            <form action='index.php' method='post' class='rozdzial_open'>
                               <input type='hidden' name='tytul' value='".(rawurlencode($wiersz['rozdzial_tytul']))."' />        
                               <input type='hidden' name='id' value='".$id."' />
                               <input type='submit' name='tytul' value='".$wiersz['rozdzial_tytul']."' />         
                            </form>
                       
                        <div class='kategoria'> (".$kategoria.")</div></div>";
                }  
        }
            echo "<br />";
    }
    echo "</div>";
?>

