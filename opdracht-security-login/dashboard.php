<?php
    session_start();

    $showDashboard = false;

    if (isset($_COOKIE['login']))
    {
        $loginArray = explode(',',$_COOKIE['login']);
        
        try{
        
        $db = new pdo('mysql:host=localhost;dbname=opdracht-security-login','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $QueryString = 'SELECT salt from users
                        WHERE email = :email';

        $Statement = $db -> prepare($QueryString);
        $Statement->bindValue(':email',$loginArray[0]);
        
        $Statement -> execute();

        $fetchRow = array();

        while ( $row = $Statement->fetch(PDO::FETCH_ASSOC) )
            {
                $fetchRow[]	=	$row;
            }
            
        if (hash('SHA512',$loginArray[0].$fetchRow[0]['salt']) == $loginArray[1])
        {
            $showDashboard = true;
        } 
        else
        {
            setcookie('login','', time()-3600);
            header( 'location: login-form.php' );
        }
          
        }

         catch( PDOException $e ){
        $_SESSION['message']['dbconnection']  = 'Er ging iets mis: '.$e->getmessage();
         }

        
    }
    else
    {
        $_SESSION['message']['notification'] = 'U moet eerst inloggen.';
        header( 'location: login-form.php' );
    }

?>

<!DOCTYPE html>
<html>
	<body>

		<h1>Dashboard</h1>
		<p>Hallo,</p>
		
		<a href="logout.php">uitloggen</a>
	</body>
</html>