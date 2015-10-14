<?php
    $voornaam = 'Kevin ';
    $naam = 'Bavuidi Minu';
    $volledigeNaam = $voornaam.$naam;
    $lengte = strlen($volledigeNaam);

?>
<!DOCTYPE html>
<html>
    <body>
        <h1>opdracht concatenate</h1>
        <?php echo $volledigeNaam ?>
        <p>lengte: <?php echo $lengte?></p> 
    </body>

</html>