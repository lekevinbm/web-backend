<?php
    setlocale(LC_ALL, 'nl_NL');
?>
<!DOCTYPE>
<html>
    <body>
        <p>Timestamp deel 1 en 2</p>
        <?php echo strftime( '%d %B %Y, %H:%M:%S %p',mktime(22,35,25,21,1,21,1904)) ?>
        
        
        </p>
    </body>
</html>