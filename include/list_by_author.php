<?php

echo "<div class='chapterTitle'>Spis wg autorów</div><div class='chapterContent'>";

include "connected.php";

    $wyswiet_l = "SELECT DISTINCT author FROM kategorie ORDER BY author ASC";
    $result_author = $db->query("SET NAMES utf8");
    $result_author = $db->query($wyswiet_l);
    
    $how_many_author = $result_author -> num_rows;
    
    for($a=0; $a < $how_many_author; $a++) {
        $line = $result_author->fetch_assoc();
        $author = $line['author'];        
        echo "<h6><span style='color: #B4A38F'><i class='icon-heart-filled'></i></span>".$author."</h6>";
        
        $wyswietl_2 = "SELECT * FROM kategorie WHERE author LIKE '".$author."' ORDER BY category";
        $result_alphabet = $db->query($wyswietl_2);
        
        $how_many_alphabet = $result_alphabet->num_rows;

        for($b1=0; $b1 < $how_many_alphabet; $b1++) {
            $line = $result_alphabet -> fetch_assoc();
            $id = $line['storyId']; 
            

            if (($line['category']=="Opowiadanie")||($line['category']=="Wiersz")){
                        echo "<div class='categoryTitle'>".$line['title']." <div class='category'>(".$line['category'].") </div></div> <br>";
                            
                            $wyswietl_subtitle = "SELECT * FROM opowiadania WHERE storyId=".$id;
                            $result_subtitle = $db->query($wyswietl_subtitle);

                            $how_many = $result_subtitle -> num_rows;

                            for($b2=0; $b2 < $how_many; $b2++) {
                                $line = $result_subtitle->fetch_assoc();
                            echo "<div class='subtitle'>
                                    <form action='index.php' method='post' class='chapterOpen'>
                                       <input type='hidden' name='title' value='".(rawurlencode($line['chapterTitle']))."' />        
                                       <input type='hidden' name='id' value='".$id."' />
                                       <input type='hidden' name='chapterNumber' value='".$line['chapterNumber']."' />
                                       <input type='submit' name='subtitle' value='".$line['chapterTitle']."' />         
                                    </form></div>";
                            }
                        }    
            else {
                           
                $title=$line['title']; 
                $category = $line['category'];
                
                $wyswietl_subtitle_2 = "SELECT * FROM opowiadania WHERE storyId=".$id;
                $result_subtitle_2 = $db->query($wyswietl_subtitle_2);              
                
                    $how_many_2 = $result_subtitle_2->num_rows;                                  
                    for($c=0; $c < $how_many_2; $c++) {
                        $line = $result_subtitle_2->fetch_assoc();
                    echo "<div class='categoryTitle'>
                            <form action='index.php' method='post' class='chapterOpen'>
                               <input type='hidden' name='title' value='".(rawurlencode($line['chapterTitle']))."' />        
                               <input type='hidden' name='id' value='".$id."' />
                               <input type='submit' name='subtitle' class='categoryOther' value='".$title."' />         
                            </form><div class='category'> (".$category.")</div></div>";
                    }  
            }
          echo "<div style='clear:both;'></div>";      
        }
        echo "<br>";
    }
 echo "</div>";
?>

