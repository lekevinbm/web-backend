<?php
    var_dump( $_POST );
    var_dump( $_SESSION );

    if ( isset( $_POST[ 'submit' ] ) )
    {
        $_SESSION['data']['straat']       =   $_POST[ 'straat' ];
        $_SESSION['data']['nummer']    =   $_POST[ 'nummer' ];
        $_SESSION['data']['gemente']       =   $_POST[ 'gemeente' ];
        $_SESSION['data']['postcode']    =   $_POST[ 'postcode' ];
    }
?>
<!DOCTYPE>
<html>
    <body>
        <ul>
        <li><p>email: <?php echo $_SESSION['data']['email'] ?></p></li>
        <li><p>nickname: <?php echo $_SESSION['data']['nickname'] ?></p></li>
        <li><p>straat: <?php echo $_SESSION['data']['straat'] ?></p></li>
        <li><p>nummer: <?php echo $_SESSION['data']['nummer'] ?></p></li>
        <li><p>gemeente: <?php echo $_SESSION['data']['gemeente'] ?></p></li>
        <li><p>postcode: <?php echo $_SESSION['data']['postcode'] ?></p></li>
    </ul>
    </body>
</html>