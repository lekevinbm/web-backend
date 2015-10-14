<?php
    $getal = 15;
    $ondergrens = 0;
    $bovengrens = 10;

    if ($getal >= 0 && $getal <10)
        
    {
        $ondergrens = 0;
        $bovengrens = 10;
    } 
    
    elseif($getal >= 10 && $getal <20)
    {
        $ondergrens = 10;
        $bovengrens = 20;
    }
     elseif($getal >= 20 && $getal <30)
    {
        $ondergrens = 20;
        $bovengrens = 30;
    }

    $tekst = 'Het getal '.$getal.' ligt tussen '.$ondergrens.' en '.$bovengrens;
    $omgekeerdeTekst = strrev($tekst);

?>

<!DOCTYPE html>
<html>
    <body>
        <p><?php echo $tekst?></p>
        <p><?php echo $omgekeerdeTekst?></p>
        
    </body>
</html>