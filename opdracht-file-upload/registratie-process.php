<?php
    session_start();

    $email = '';
    $canICheckEmail = false;
    $salt = '';
    $hashed_password = '';
    
    //wnr er op de knop Genereer een passwoord wordt gedrukt
    if (isset($_POST['generatePassword']))
    {
        if (isset($_POST['email']))
        {
            $_SESSION['registratie']['email'] = $_POST['email'];
        }
        
        $_SESSION['registratie']['generatedPassword'] = generatePassword();
        header( 'location: registratiepagina.php' );
    }

    //wnr er op de knop Registreer wordt gedrukt
    if (isset($_POST['registreer']))
    {
        $_SESSION['registratie']['email'] = $_POST['email'];
        $_SESSION['registratie']['generatedPassword'] = $_POST['paswoord'];
        
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $_SESSION['message']['notificatie'] = 'Gelieve een geldige e-mail in te geven';
        } 
        else
        {
            $canICheckEmail = true;
            $email = $_SESSION['registratie']['email'];
        }
        
        header( 'location: registratiepagina.php' );
    }

    //Verbinding met database
    try{
        $_SESSION['message']['dbconnection']  = '';

        $db = new pdo('mysql:host=localhost;dbname=opdracht-file-upload','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $checkEmailQueryString = 'SELECT email from users
                        WHERE email = :email';

        $checkEmailStatement = $db -> prepare($checkEmailQueryString);
        $checkEmailStatement->bindValue(':email',$email);
        
        $checkEmailStatement -> execute();

        $fetchRow = array();

        while ( $row = $checkEmailStatement->fetch(PDO::FETCH_ASSOC) )
            {
                $fetchRow[]	=	$row;
            }
        
                
        if ($canICheckEmail)
        {
            if (count($fetchRow)>0)
            {
                $_SESSION['message']['notificatie'] = 'Dit email-adres is al geregistreerd geweest. Gebruik een ander.';
            }
            else
            {
                $_SESSION['message']['notificatie'] = '';
                $salt = uniqid(mt_rand(), true).$_SESSION['registratie']['generatedPassword'];
                $hashed_password = hash('SHA512',$salt);
                
                $adduserQueryString = "insert into users (email,salt,hashed_password,lastlogin) 
                                    values
                                    (:email,:salt,:hashed_password,NOW())";
                
                $adduserStatement = $db -> prepare($adduserQueryString);
                
                $adduserStatement->bindValue(':email', $email);
                $adduserStatement->bindValue(':salt', $salt);
                $adduserStatement->bindValue(':hashed_password',$hashed_password);
                
                $gelukt = $adduserStatement -> execute();

                if ($gelukt)
                {
                    $cookieValue = $email.','.hash('SHA512',$email.$salt);
                    setcookie('login',$cookieValue, time() + 60*60*24*30);
                    header( 'location: dashboard.php' );
                }
            }

        }
        
    }

     catch( PDOException $e ){
    $_SESSION['message']['dbconnection']  = 'Er ging iets mis: '.$e->getmessage();
}

     function generatePassword(){
        $paswoord = array();
        $paswoordString = '';
        $lengte = 6;
        $alfabetArray = str_split('abcdefghijklmnopqrstuvwxyz');
        $tekenArray = str_split('!@#$%^&*()');
        $keyArray = array();
        
        shuffle($alfabetArray);
        shuffle($tekenArray);
        
        $hoofdletterVerplicht = true;
        $cijferVerplicht = true;
        $specialeTekenVerplicht = true;
        
        $randomHoofdletter = strtoupper($alfabetArray[0]);
        $randomCijfer = rand(0,9);
        $randomTeken = $tekenArray[0];
        
        for ($i=0;$i<$lengte;$i++)
        {
            array_push($keyArray,$i);
        }
        
        shuffle($keyArray);
        
        for ($i=0;$i<$lengte;$i++)
        {
           if ($hoofdletterVerplicht && $i == $keyArray[0])
           {
               $paswoord[$i] = $randomHoofdletter;
               
           }
            elseif ($cijferVerplicht && $i == $keyArray[1])
            {
                $paswoord[$i] = $randomCijfer;
                
            }
            elseif ($specialeTekenVerplicht && $i == $keyArray[2])
            {
                $paswoord[$i] = $randomTeken;
                
            }
            else
            {
                shuffle($alfabetArray);
                $paswoord[$i] = $alfabetArray[0];
                
                
            }
               
               
        }
        
        $paswoordString = implode('',$paswoord);
        
    
        return $paswoordString;
    }



?>

