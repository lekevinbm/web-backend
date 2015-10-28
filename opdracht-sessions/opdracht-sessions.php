<?php
    session_start();
    var_dump( $_SESSION );

    $email		=	( isset( $_SESSION['data']['email'] ) ) ? $_SESSION['data'][ 'email'] : '';
	$nickname		=	( isset( $_SESSION['data']['nickname'] ) ) ? $_SESSION['data'][ 'nickname'] : '';
?>

<!DOCTYPE html>
<html>
    <body>
        <h2>Deel1: registratiegegevens</h2>
        
        <form action="opdracht-sessions2.php" method="POST">
            <label for="email">email</label> <br>
            <input type="email" name="email" id="email"> <br>
            <label for="nickname">nickname</label><br>
            <input type="text" name="nickname" id="nickname"><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>