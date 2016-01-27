<?php
     session_start();
    

    $titel = '';
    $artikel = '';
    $kernwoorden = '';
    $datum = '';
    if(isset($_SESSION['notification']))
    {
        $titel = $_SESSION['titel'];
        $artikel = $_SESSION['artikel'];
        $kernwoorden = $_SESSION['kernwoorden'];
        $datum = $_SESSION['datum'];
    }
?>
<!DOCTYPE html>
<html>
    <body>
        <a href="artikel-overzicht.php">Terug naar overzicht</a>
        <form action="artikel-toevoegen.php" method="post">
            <ul>
                <li>
                    <label for="titel">Titel</label>
                    <input type="text" name="titel" id="titel" value="<?php echo $titel ?>">
                </li>
                <li>
                    <label for="artikel">Artikel</label>
                    <textarea name="artikel" id="artikel"><?php echo $artikel ?></textarea>
                </li>
                <li>
                    <label for="kernwoorden">Kernwoorden</label>
                    <input type ="text" name="kernwoorden" id="kernwoorden" value="<?php echo $kernwoorden ?>">
                </li>
                <li>
                    <label for="datum">Datum</label>
                    <input type ="date" name="datum" id="datum" value="<?php echo $datum ?>">
                </li>
            </ul>
            <input type="submit" name="submit" value="Verzenden">
        </form>
    </body>
</html>