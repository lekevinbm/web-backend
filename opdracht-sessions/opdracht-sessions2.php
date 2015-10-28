<?php
    session_start();
    var_dump( $_POST );
    var_dump( $_SESSION );
    
    if ( isset( $_POST[ 'submit' ] ) )
    {
        $_SESSION['data']['email']       =   $_POST[ 'email' ];
        $_SESSION['data']['nickname']    =   $_POST[ 'nickname' ];
    }

    $straat		=	( isset( $_SESSION['data']['straat'] ) ) ? $_SESSION['data'][ 'straat'] : '';
	$nummer		=	( isset( $_SESSION['data']['nummer'] ) ) ? $_SESSION['data'][ 'nummer'] : '';
    $gemeente		=	( isset( $_SESSION['data']['gemeente'] ) ) ? $_SESSION['data'][ 'gemeente'] : '';
	$postcode		=	( isset( $_SESSION['data']['postcode'] ) ) ? $_SESSION['data'][ 'postcode'] : '';
?>

<!DOCTYPE html>
<html>
    <h2>Registratiegegevens</h2>
    <ul>
        <li><p>email: <?php echo $_SESSION['data']['email'] ?></p></li>
        <li><p>email: <?php echo $_SESSION['data']['nickname'] ?></p></li>
    </ul>
    
    <form action="opdracht-sessions3.php" method="post">
        <label for="straat">Straat</label><br>
        <input type="text" name="straat" id="straat"><br>
        
        <label for="nummer">Nummer</label><br>
        <input type="number" name="nummer" id="nummer"><br>
        
        <label for="gemeente">Gemeente</label><br>
        <input type="text" name="gemeente" id="gemeente"><br>
        
        <label for="postcode">Postcode</label><br>
        <input type="text" name="postcode" id="postcode"><br>
        
        <input type="submit" name="submit">
        
    </form>
    
</html>