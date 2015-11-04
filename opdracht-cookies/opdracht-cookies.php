<?php
    $tekstbestand = file_get_contents('./tekst.txt');
    $inhoud = explode(",",$tekstbestand);
    $juisteinlog = false;
    $bericht = '';

    if (isset($_POST["submit"]))
    {
        if ($_POST["gebruikersnaam"] == $inhoud[0] && $_POST["paswoord"] == $inhoud[1])
        {
            setcookie('ingelogd',true,time()+360);
            header( 'location: opdracht-cookies.php' );
            
        } else
        {
            $bericht = 'Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.';
            
        }
    }

    if (isset($_COOKIE['ingelogd']))
    {
        $bericht ='U bent ingelogd';
        $juisteinlog = true;
    }

    if (isset($_GET["logout"]))
    {
        if($_GET["logout"])
        {
            setcookie('ingelogd',"",1);
            setcookie ('ingelogd', false); 
            unset($_COOKIE['ingelogd']);
            
            header( 'location: opdracht-cookies.php' );
            $juisteinlog = false;
        }
    }

?>
<!DOCTYPE html>
<html>
    <body>
        <h2>Inloggen</h2>
        
        <p> <?php echo $bericht ?></p>
        
        <?php if (!$juisteinlog): ?>
        <form action="opdracht-cookies.php" method="post">
            <label for="gebruikersnaam">gebruikersnaam</label><br>
            <input type="text" name="gebruikersnaam" id="gebruikersnaam"><br>
            <label for ="paswoord">paswoord</label><br>
            <input type="password" name="paswoord" id="paswoord"><br>
            <input type="submit" name="submit">
        </form>
        <?php else: ?>
        <a href="opdracht-cookies.php?logout=true">Uitloggen</a>
        <?php endif ?>
    
    </body>
</html>