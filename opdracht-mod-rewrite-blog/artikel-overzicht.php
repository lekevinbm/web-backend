<?php
    session_start();

    
    $message='';

    if(isset($_SESSION['notification']))
    {
        $message = $_SESSION['notification'];
        unset($_SESSION['notification']);
    }

    try
    {
       $db = new pdo('mysql:host=localhost;dbname=opdracht-mod-rewrite-blog','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
        
        $queryString = "Select * from artikels";
       
        $statement = $db -> prepare($queryString);
        $statement->execute();
                              
        $fetchRow = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchRow[]	=	$row;
		}  
        
    }

    catch( PDOException $e ){
    $_SESSION['notification'] = 'Er ging iets mis: '.$e->getmessage();
    }
?>
<!DOCTYPE html>
<html>
    <body>
        <p><?php echo $message ?></p>
        <form action="artikel-zoeken.php" method="get">
            <label for="artikel">Zoeken in artikels:</label>
            <input type="text" name="artikel" id="artikel" >
            <input type="submit" name="zoekInArtikel" value="Zoeken">
        <form><br><br>
            
        <form action="artikel-zoeken.php" method="get">          
            <label for="jaar">Zoeken op datum:</label>
            <select name="jaar">
                <?php for($i=2010;$i<2019;$i++): ?>
                <option value="2010"><?php echo $i ?></option>
                <?php endfor ?>
            </select>
            <input type="submit" name="zoekOpDatum" value="Zoeken">
        </form>
            
        <h2>Artikels Overzicht</h2>
        <a href="artikel-toevoegen-form.php">Artikel toevoegen</a>
        
        <?php foreach ($fetchRow as $row => $rowdata): ?>
            <article>
                <h3><?php echo $rowdata['Titel'] ?> | <?php echo $rowdata['Datum'] ?></h3>
                <p><?php echo $rowdata['Artikel'] ?></p>
                <p>Keywords: <?php echo $rowdata['Kernwoorden'] ?></p>
            </article>
        <?php endforeach ?>
    </body>
</html>