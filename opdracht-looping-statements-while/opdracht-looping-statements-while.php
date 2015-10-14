<?php
    $getallen = array();
    
    $getal1= 0;
    

    while ($getal1 <100){
        $getallen[] = $getal1;
        ++$getal1;
    }
    $getallenreeks = implode(",", $getallen);

    $getallen2= array();
    $getal2= 0;

while ($getal2 <80)
{
        if (  $getal2 > 40 && $getal2 < 80 && $getal2 % 3 == 0 ){
            $getallen2[] = $getal2;
            ++$getal2;
            }
    }   
    $getallenreeks2 = implode(",", $getallen2);

?>

<!DOCTYPE html>
<html>
    <body>
    <p><?= $getallenreeks ?></p>
    <p><?= $getallenreeks2 ?></p>
    </body>
</html>