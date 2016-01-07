<?php
    session_start();
    
    if(!isset($_SESSION['message']['notificatie']))
    {
        $message = '';
    }
    else
    {
        $message = $_SESSION['message']['notificatie'];    
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
        <h2>Inloggen</h2>
    
        <p class="mailmessage"><?php echo $message?></p>
        

        <form action="login-process.php" method="POST">
            <ul>
                <li>
                    <label for="email">e-mail</label>
                    <input type="text" id="email" name="email"></input>
                </li>
                <li>
                    <label for="paswoord">paswoord</label>
                    <input type="text" id="paswoord" name="paswoord"></input>
                </li>
                <input type="submit" name="inloggen" value="Inloggen">
            </ul>
        </form>
        <p>Nog geen account? Maak er dan eentje aan op de <a href="Registratiepagina.php">registratiepagina</a></p>
    </body>
    
</html>