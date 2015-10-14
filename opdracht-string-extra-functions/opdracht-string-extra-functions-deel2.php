<?php
    $fruit ='ananas';
    $aantalKarakters = strlen($fruit);
    $naald = 'a';
    $positie= strrpos($fruit,$naald);
    $drukletters = strtoupper($fruit);
?>

<!DOCTYPE html>

<html>
    <body>
        <p>positie laatste <?php echo $naald?> in ananas: <?php echo $positie ?></p>
        <p>drukletters : <?php echo $drukletters?></p>
    </body>
    
</\html>