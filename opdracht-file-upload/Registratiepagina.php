<?php
    session_start();
    
    $email = '';
    $generatedPassword = '';
    $message = '';
    $dbmessage = '';

    if(isset($_SESSION['registratie']['generatedPassword']) )
    {
        $email = $_SESSION['registratie']['email'];
        $generatedPassword = $_SESSION['registratie']['generatedPassword'];
        
    }

    if (isset($_SESSION['message']['email']))
    {
        $email = $_SESSION['registratie']['email'];
        $message = $_SESSION['message']['notificatie'];
        $dbmessage = $_SESSION['message']['dbconnection'] ;
        $generatedPassword = $_SESSION['registratie']['generatedPassword'];
    }
    
    
?>
<!DOCTYPE html>
<html>
    <style>
        .mailmessage{
            background-color: red;
            color: white;
        }
    </style>
    <body>
        <h2>Registreren</h2>
    
        <p class="mailmessage"><?php echo $message?></p>
        <p class="mailmessage"><?php echo $dbmessage?></p>

        <form action="registratie-process.php" method="POST">
            <ul>
                <li>
                    <label for="email">e-mail</label>
                    <input type="text" id="email" name="email" value="<?php echo $email?>"></input>
                </li>
                <li>
                    <label for="paswoord">paswoord</label>
                    <input type="text" id="paswoord" name="paswoord" value="<?php echo $generatedPassword ?>"></input>
                    <input type="submit" name="generatePassword" value="Genereer een paswoord">
                </li>
                <input type="submit" name="registreer" value="Registreer">
            </ul>
        </form>
    </body>
    
</html>