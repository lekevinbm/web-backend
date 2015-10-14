<?php
    $fruit = 'kokosnoot';
    $aantalKarakters = strlen($fruit);
    $naald = 'o';
    $positie = strpos($fruit,$naald);
    
?>

<!DOCTYPE html>
<html>
    <body>
        <p>aantal karakters kokosnoot: <?php echo $aantalKarakters ?></p>
        <p>Positie van o: <?php echo $positie ?></p>
    </body>

</html>