<?php
    session_start();

    if(isset($_POST['from']) 
       && isset($_POST['boodschap']))
    {
        $_SESSION['mail']['from'] = $_POST['from'];
        $_SESSION['mail']['boodschap'] = $_POST['boodschap'];
        $_SESSION['mail']['kopie'] = $_POST['kopie'];
       
        
        $admin = 'kevin.bavuidiminu@student.kdg.be';
        $from  = $_POST['from'];
        $titel = 'Bericht contactformulier';
        $boodschap = '<p>Beste,</p><br>
                    <p>Dit is de boodschap die via het contactformulier door '
                    .$_POST['from']
                    .' werd verstuurd:</p><br>'
                    .$_POST['boodschap'];
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .=" From: ".$_POST['from'];
        
        
         try
        {
            $db = new pdo('mysql:host=localhost;dbname=opdracht-mail','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $QueryString	=	'INSERT INTO contact_messages (email, message, time_sent)
                                            VALUES ( :email, :message, NOW() )';

                $statement = $db->prepare( $QueryString );
                $statement->bindValue( ':email', $_POST['from'] );
                $statement->bindValue( ':message', $_POST['boodschap']);

                $gelukt = $statement->execute();
             
             
             if($gelukt)
             {
                 echo 'connectie yes';
             } 
             else
             {
                 echo 'moeilijk';
             }
            

             if($_POST['kopie'])
        {
            mail($from,$titel,$boodschap,$headers);
        }
        
        $gelukt = mail($admin,$titel,$boodschap,$headers);
        
        if($gelukt)
        {
            echo 'email verstuurd';
            $_SESSION['message']['notificatie'] = 'Het email werd succesvol verstuurd.';
            //session_unset();
            //header('location: contact-form.php');
        }
        else
        {
            echo 'email niet verstuurd';
            $_SESSION['message']['notificatie'] = 'Het is niet gelukt om de email te versturen.';
            //session_unset();
            //header('location: contact-form.php');
        }
             
        }
        
        catch ( PDOException $e )
		{
			$_SESSION['message']['notificatie']	=	'connectie is niet gelukt';
        }
        
  
    }
    else
    {
        
        
        $_SESSION['message']['notificatie'] = 'Gelieve alle velden in te vullen.';
        //header('location: contact-form.php');
    }
    
    

?>  