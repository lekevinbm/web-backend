<?php
    session_start();

    $message = '';
    $email = '';
    $boodschap = '';
    $radio = '';
        
    if(isset($_SESSION['message']['notificatie']))
    {
        $message = $_SESSION['message']['notificatie'];
    }

    if(isset($_SESSION['mail']))
    {
        $email = $_SESSION['mail']['from'];
        $boodschap = $_SESSION['mail']['boodschap'];
        if ($_SESSION['mail']['kopie'])
        {
            $radio = 'checked';
        }
    }

    session_unset();
?>
<!DOCTYPE html>

<style>
    .message{
        color: white;
        background-color: red;
    }
</style>
<html>
    <body>
        <h1>Contacteer ons</h1>
        
        <p class='message'><?php echo $message ?></p>
        
        <form action="contact.php" method="post">
            <ul>
                <li>
                    <label for="email">Email-adres</label>
                    <input type="email" name="from" id="from" value="<?php echo $email ?>">
                </li>
                <li>
                    <label for="boodschap">Boodschap</label>
                    <textarea id="boodschap" name="boodschap"><?php echo $boodschap ?></textarea>
                </li>
                <li>
                    <input type="radio" name="kopie" <?php echo $radio ?>>Stuur een kopie naar mezelf </input>
                </li><br>
                <input type="submit" value="Verzenden">
            </ul>
        </form>
    </body>
</html>