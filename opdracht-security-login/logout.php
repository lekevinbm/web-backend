<?php
     session_start();

    $_SESSION['message']['notificatie'] =  'U bent uitgelogd. Tot de volgende keer.';
header( "refresh:2;url=login-form.php" );
?>

<!DOCTYPE html>
<html>
    <body>
        <p><?php echo $_SESSION['message']['notificatie'] ?></p>
    </body>
</html>