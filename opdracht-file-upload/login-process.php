<?php
    session_start();

    $email = $_POST['email'];
    $paswoord = $_POST['paswoord'];

    $_SESSION['registratie']['email'] = $_POST['email'];


    $_SESSION['message']['notificatie'] = '';

    try
    {
        
        $db = new pdo('mysql:host=localhost;dbname=opdracht-file-upload','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $QueryString = 'SELECT * from users
                        WHERE email = :email';

        $statement = $db -> prepare($QueryString);
        $statement->bindValue(':email',$email);
        
        $statement -> execute();

        $fetchRow = array();

        while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
            {
                $fetchRow[]	=	$row;
            }
        
        var_dump($fetchRow);
        
        if (!count($fetchRow)>0)
        {
            $_SESSION['message']['notificatie'] = 'Gelieve een geldige emailadres in te geven.';
            //header('location: login-form.php');
        }
        else
        {
            if (hash('SHA512',$fetchRow[0]['salt']) == $fetchRow[0]['hashed_password'])
            {
                $cookieValue = $email.','.hash('SHA512',$email.$fetchRow[0]['salt']);
                setcookie('login',$cookieValue, time() + 60*60*24*30);
                header('location: dashboard.php');
            }
            else
            {
                $_SESSION['message']['notificatie'] = 'Het paswoord klopt niet.';
                header('location: login-form.php');
            }
        }
        
          
    }

    catch( PDOException $e )
    {
        $_SESSION['message']['dbconnection']  = 'Er ging iets mis: '.$e->getmessage();
    }

?>