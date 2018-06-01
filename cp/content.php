<?php

if(isset($pickcont['subsite'])&&($pickcont['id'])) {
    include "cp/".$pickcont['subsite'].".php";    
}

else if(isset($subsite)) {
    include "cp/".$subsite.".php";
}
else {
    include "cp/info.php";
}

?>
