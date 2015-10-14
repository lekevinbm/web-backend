<?php
    $lettertje = 'e';
    $cijfertje = 3;
    $langsteWoord = 'zandzeepsodemineralenwatersteenstralen';
    $vervangWoord = str_replace($lettertje,$cijfertje,$langsteWoord)
?>

<html>
    <body>
    <?php echo $vervangWoord?>
    </body>
</html>