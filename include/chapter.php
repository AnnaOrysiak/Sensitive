
<?php

        if (isset($_POST['rozdzial_nr'])){
            $rozdzial_nr = $pickcont['rozdzial']['rozdzial_nr'];}
        else {
            $rozdzial_nr = 1;
            
        }
        $id = $pickcont['rozdzial']['id'];
        $tytul = $pickcont['rozdzial']['tytul'];
        

	include "connected.php";	

		$rozdzial="SELECT * FROM opowiadania WHERE opowiadanie_id='".$id."' AND rozdzial_nr='".$rozdzial_nr."'";
		$wynik=$db->query("SET NAMES utf8");
		$wynik=$db->query($rozdzial);

		$ile=$wynik->num_rows;
		
		for($i=0; $i<$ile; $i++) {
			$wiersz=$wynik->fetch_assoc();
			echo "<div class='pojemnik'>";
			echo "<div class='tytul_r'>".$wiersz['rozdzial_tytul']."</div>";
			echo "<div class='tresc_r'>".$wiersz['rozdzial_edycja']."</div>";
			
                        
                        /***************** ustawienie numerowania rozdzialow ******************/
                        
			$ktory_rozdzial=$wiersz['rozdzial_nr'];
			$poprzedni=$ktory_rozdzial-1;		
			$nastepny=$ktory_rozdzial+1;		
			
			$numerowanie="SELECT rozdzial_nr FROM opowiadania WHERE opowiadanie_id='".$id."'";
			$w=$db->query($numerowanie);
			$ile_nr=$w->num_rows;
			for($n=0; $n<$ile_nr; $n++){		
				$rozdzialy=$w->fetch_assoc();
				
				if($rozdzialy['rozdzial_nr']==$poprzedni) {
					$_SESSION['prev']="<form action='index.php' method='post'>
                                            <input type='hidden' value='$poprzedni' id='previcon' name='rozdzial_nr' />
                                            <input type='hidden' value='$id' id='previd' name='id' />
                                            <button type='submit' class='ikonka'>
                                                    <i class='icon-left-openk'></i>
                                            </button>
                                        </form>";                                        
                                }
	
				if($rozdzialy['rozdzial_nr']==$nastepny) {	
					$_SESSION['next']="<form action='index.php' method='post'>
                                            <input type='hidden' value='$nastepny' id='nexticon' name='rozdzial_nr' />           
                                            <input type='hidden' value='$id' id='nextid' name='id' />          
                                            <button type='submit' class='ikonka'>
                                                    <i class='icon-right-open'></i>
                                            </button>
					</form>";
				}	
			}
	
			echo "<div class='stronicowanie_r'>";
			
				if(isset($_SESSION['prev'])) {
								echo $_SESSION['prev'];
								unset($_SESSION['prev']);
							}			
				else {echo "<div class='ikonka'>&nbsp</div>";}
							
			echo	"<div class='odstep'>  &nbsp </div>";
			
				if(isset($_SESSION['next'])) {
								echo $_SESSION['next'];
								unset($_SESSION['next']);
							}
				else {echo "<div class='ikonka'>&nbsp</div>";}
				
			echo "</div>";
			
				$rozdzial="SELECT autor, kategoria FROM kategorie WHERE opowiadanie_id=".$id;
				$wynik=$db->query("SET NAMES utf8");
				$wynik=$db->query($rozdzial);
				$ile=$wynik->num_rows;
				for($j=0; $j<$ile; $j++) {
						$wiersz=$wynik->fetch_assoc();
						
							if($wiersz['kategoria']!='wiersz') {
								echo "<div class='autor_r'>".$wiersz['autor']."</div>";
							}
				}
				if(!empty($wiersz['autor_wiersza'])) {
					echo "<div class='autor_r'>".$wiersz['autor_wiersza']."</div>";
				}
			echo "</div>";

		}

?>