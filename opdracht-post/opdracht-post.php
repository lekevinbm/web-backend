<?php 
    $password = "azerty";
    $username = "kev";
    $message = 'Log hier in';

if ( isset ( $_POST['submit'] ) )
    {
   
    if ($_POST['username'] == $username && $_POST['passwoord'] == $password)       
    
        {
            $message = 'Welkom';
        } 
        else 
        {
            $message = 'Er ging iets mis bij het inloggen, probeer opnieuw';
        }
    }

?>

<!DOCTYPE html>
<html>
    <title>action</title>
    <body>
        <h1>Inloggen</h1>
        
        <?php echo $message ?>
        
        <form method ="post">
            <label id ="Username" for="username">Username</label>
            </br>
            <input type="text" name="username" id="username">
            </br>
            <label for ="passwoord">paswoord</label>
            </br>
            <input type="password" name="passwoord" id="passwoord">
            </br>
            <input type="submit" name="submit" value="Verzenden">
        
        </form>
    </body>
</html>