<?php

echo "<div class='chapterTitle'>Spis alfabetyczny</div><div class='chapterContent'>";

include "connected.php";

    $wyswietl = "SELECT * FROM kategorie ORDER BY title";
    $result_alphabet = $db->query("SET NAMES utf8");
    $result_alphabet = $db->query($wyswietl);
    
    $how_many_alphabet = $result_alphabet -> num_rows;
    
    for($a=0; $a < $how_many_alphabet; $a++) {
        $line = $result_alphabet -> fetch_assoc();
        $id = $line['storyId'];       
        
        if (($line['category']=="Opowiadanie")||($line['category']=="Wiersz")){
                    echo "<div class='categoryTitle'>".$line['title']." <div class='category'>(".$line['category'].") </div></div> <br>";
                        $wyswietl_subtitle = "SELECT * FROM opowiadania WHERE storyId=".$id;
                        $result_subtitle = $db->query($wyswietl_subtitle);

                        $how_many = $result_subtitle -> num_rows;

                        for($pod=0; $pod < $how_many; $pod++) {
                            $line = $result_subtitle->fetch_assoc();
                        echo "<div class='subtitle'>
                                <form action='index.php' method='post' class='chapter_open'>
                                   <input type='hidden' name='title' value='".(rawurlencode($line['chapterTitle']))."' />        
                                   <input type='hidden' name='id' value='".$id."' />
                                   <input type='hidden' name='chapterNumber' value='".$line['chapterNumber']."' />
                                   <input type='submit' name='subtitle' value='".$line['chapterTitle']."' />         
                                </form></div>";
                        }
                   echo "<div style='clear:both;'></div>"; }    
        else {
            $category = $line['category'];
            $wyswietl_subtitle = "SELECT * FROM opowiadania WHERE storyId=".$id;
                $result_subtitle = $db->query($wyswietl_subtitle);

                $how_many = $result_subtitle->num_rows;
                for($b=0; $b < $how_many; $b++) {
                    $line = $result_subtitle->fetch_assoc();
                echo "<div class='categoryTitle'>
                            <form action='index.php' method='post' class='chapter_open'>
                               <input type='hidden' name='title' value='".(rawurlencode($line['chapterTitle']))."' />        
                               <input type='hidden' name='id' value='".$id."' />
                               <input type='submit' name='subtitle' class='categoryOther' value='".$line['chapterTitle']."' />         
                            </form>
                        <div class='category'> (".$category.")</div></div>";
                }  
            } 
        echo "<div style='clear:both;'></div>";  
    }
    
    echo "</div>";
?>

