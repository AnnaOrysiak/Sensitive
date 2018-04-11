<?php

if(isset($pickcont['podstrona'])) {                       
    include "include/".$pickcont['podstrona'].".php";
}

else if(isset($pickcont['rozdzial'])) {
    include "include/chapter.php";
 }
 
else {
    include "include/news.php";
}
// tu dorobić jeszcze else if strona nie istnieje (error 404)   // a może ustawić isset z getem 404?

?>

