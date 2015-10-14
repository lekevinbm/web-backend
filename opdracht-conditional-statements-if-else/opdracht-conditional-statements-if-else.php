<?php
    $jaartal = 1904;
    $isSchikkeljaar= 'false';

    if((($jaartal%4 == 0 )&& ($jaartal%100 !=0))||($jaartal%400 == 0) )
    {
        $isSchikkeljaar = 'true';
    }
        

?>
<!DOCTYPE html>
<html>
    <body>
        <p>Het jaar <?php echo $jaartal ?> is <?php echo ($isSchikkeljaar)? 'wel':'geen'?> een schikkeljaar</p>
    </body>
</html>