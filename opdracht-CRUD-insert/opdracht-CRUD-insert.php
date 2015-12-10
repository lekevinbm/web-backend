<?php 
    
    if (isset($_POST['submit']))
    {

        try{
            $messageContainer = '';
            $db = new pdo('mysql:host=localhost;dbname=bieren','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


            $queryString = "insert into brouwers
    (brnaam,adres,postcode,gemeente,omzet)
    values
    (':brnaam',':adres',':postcode',':gemeente',':omzet')";
            $statement = $db -> prepare($queryString);


            $statement->bindValue(':brnaam', $_POST['brnaam'] );
            $statement->bindValue(':adres', $_POST['adres'] );
            $statement->bindValue(':postcode', $_POST['postcode'] );
            $statement->bindValue(':gemeente', $_POST['gemeente'] );
            $statement->bindValue(':omzet', $_POST['omzet'] );

            $gelukt = $statement->execute();
            
            if ($gelukt)
            {
                $messageContainer = 'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is '.$db->lastInsertId();
            }
        }

        catch( PDOException $e ){
        $messageContainer = 'Er ging iets mis: '.$e->getmessage();
        }
    }
?>

<!DOCTYPE html>
<html>
    <body>
        <h2>Opdracht-CRUD-insert</h2>
        
        <?php echo $messageContainer ?>
        
        <h3>Voeg een brouwer toe</h3>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method ="post">
            <ul>
                <li>
                    <label>Brouwernaam</label>
                    <input type="text" name="brnaam">
                </li>
                <li>
                    <label>adres</label>
                    <input type="text" name="adres">
                </li>
                <li>
                    <label>postcode</label>
                    <input type="text" name="postcode">
                </li><li>
                    <label>gemeente</label>
                    <input type="text" name="gemeente">
                </li><li>
                    <label>omzet</label>
                    <input type="text" name="omzet">
                </li>
            </ul>
            <input type="submit" name="submit" value="verzenden">
        </form>
    </body>
</html>
