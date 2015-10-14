<?php
    $dieren = array("kat","hond","koe","paard","kip");
    $aantal = count($dieren);
    $tezoekendier = "schildpad";
    $isDierGevonden = in_array($tezoekendier,$dieren);
        
    if($aantal>0){
        $resultaat1 = "Er zijn ".$aantal." dieren in de array";
    }else {
        $resultaat1 = "Er zijn geen elementen in de array";
    }

    if($isDierGevonden){
        $resultaat2 = "Het dier ".$tezoekendier." is gevonden";
    } else {
        $resultaat2 = " Het dier ".$tezoekendier." is niet gevonden";
    }

?>
<! DOCTYPE html>
<html>
    <body>
    <pre><?php var_dump($dieren) ?></pre>
    <p> <?php echo $resultaat1 ?> </p>
    <p> <?php echo $resultaat2 ?> </p>
    </body>
</html>