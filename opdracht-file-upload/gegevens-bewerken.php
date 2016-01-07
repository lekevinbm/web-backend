<?php
    session_start();

    $email = $_SESSION['registratie']['email'];
    

    try{
        
        $db = new pdo('mysql:host=localhost;dbname=opdracht-file-upload','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        if(($_FILES["profielfoto"]["type"]=="image/jpeg")
            || ($_FILES["profielfoto"]["type"]=="image/gif")
            || ($_FILES["profielfoto"]["type"]=="image/gif")
            || ($_FILES["profielfoto"]["type"]=="image/png")
            && ($_FILES["profielfoto"]["size"] < 2000000))
        {
            
            define('ROOT', getcwd());
            

            if (file_exists(ROOT . "\\img\\" . $_FILES["profielfoto"]["name"])) 
            {
                $_FILES["profielfoto"]["name"] = $_FILES["profielfoto"]["name"].date('Y-m-d');
            } 
            
            $naam =  $_FILES["profielfoto"]["name"];
            $_FILES["profielfoto"]["tmp_name"] = date('Y-m-d').'_'.$_FILES["profielfoto"]["name"];
            
            
            move_uploaded_file(($_FILES["profielfoto"]["tmp_name"]), (ROOT."\\img\\". $_FILES["profielfoto"]["name"]));
            
            
                $updateQueryString = 'UPDATE users
                        SET email = :newEmail,
                            profile_picture = :profile_picture
                            WHERE email = :oldEmail';
                
                
                 
                $statement = $db -> prepare($updateQueryString);
                
                $statement->bindValue(':newEmail', $_POST['email']);
                $statement->bindValue(':profile_picture', $naam);
                $statement->bindValue(':oldEmail', $_SESSION['registratie']['email']);
                $statement->execute();
            
                
                $_SESSION['registratie']['email'] = $_POST['email'];
            
                $_SESSION['message']['notificatie'] = "Gegevens werden succesvol gewijzigd";
                    
               header('location: gegevens-wijzigen-form.php');
                
            
        }
        else
        {
            $_SESSION['message']['notificatie'] = 'Gelieve een png, gif of jpeg bestand te uploaden, kleiner dan 2 mb.';   
            header('location: gegevens-wijzigen-form.php');
        }

    }

    catch( PDOException $e )
    {
        $_SESSION['message']['dbconnection']  = 'Er ging iets mis: '.$e->getmessage();
    }
?>