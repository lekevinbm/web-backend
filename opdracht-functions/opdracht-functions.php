<?php
    function berekenSom($getal1,$getal2){
        return $getal1+$getal2;
    }

    function vermenigvuldig($getal1,$getal2){
        return $getal1*$getal2;
    }

    function isEven($getal){
        if ($getal % 2 == 0 ){
            return true;
        } else {return false;}
        
    }

    function lengteString($text){
        return strlen($text);
    }

    function Uppercase($text){
        return strtoupper($text);
    }
?>
<!DOCTYPE html>
<html>
    <body>
        <?php echo berekenSom(5,3) ?>
        <?php echo vermenigvuldig(5,3) ?>
        <pre><?php var_dump(isEven(5))  ?></pre>
        <?php echo lengteString('ik ben Kevin') ?>
        <?php echo Uppercase('ik ben Kevin') ?>
    </body>
</html>