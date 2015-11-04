<?php
    session_start();
    var_dump( $_SESSION );

    $email = (isset($_SESSION['data']['email'])) ? $_SESSION['data']['email'] : '';
    $nickname = (isset($_SESSION['data']['nickname'])) ? $_SESSION['data']['nickname'] : '';

    if (isset ($_GET['id']))
        {
        if ($_GET['id'] == 'destroy')
        {
            session_destroy();
            header( 'location: opdracht-sessions.php' );
        }
    
        }
        

?>

<!DOCTYPE html>
<html>
    <body>
        <h2>Deel1: registratiegegevens</h2>
        
        <a href="opdracht-sessions.php?id=destroy">Vernietig sessie</a>
        
        <form action="opdracht-sessions2.php" method="POST">
            <label for="email">email</label> <br>
            <input type="email" name="email" id="email" value="<?php echo $email ?>"> <br>
            <label for="nickname">nickname</label><br>
            <input type="text" name="nickname" id="nickname" value="<?php echo $nickname ?>"><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>