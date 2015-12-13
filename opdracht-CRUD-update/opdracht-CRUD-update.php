<?php
    
    
    $columnNames	=	array();
    $showUpdateForm = false;
    $messageContainer = '';
    $brouwernrInt = 0;

    try{
    
    
    
    $db = new pdo('mysql:host=localhost;dbname=bieren','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    if (isset ($_POST['delete']))
    {
        $deleteQueryString ='DELETE FROM brouwers
                            WHERE brouwernr = :brouwernr';
       
        $statement2 = $db -> prepare($deleteQueryString);
        
        $statement2->bindValue(':brouwernr', $_POST['delete'] );
        
        $gelukt = $statement2->execute();
        
        if ($gelukt)
        {
            $messageContainer = ' De datarij werd goed verwijderd.';
        } 
        else 
        {
            $messageContainer =  'De datarij kon niet verwijderd worden. Probeer opnieuw.';
        }
    }    
        
    $queryString = 'select * from brouwers';
        
    $statement = $db -> prepare($queryString);
    $statement -> execute();
    
    $fetchRow = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchRow[]	=	$row;
		}  
        
        
    
        
    
        
    if (isset($_POST['edit']))
    {
        $brouwernrToEdit = $_POST['edit'];
        $brouwernrInt = (int)$brouwernrToEdit;
        $id = 0;
        
        
        foreach($fetchRow as $row => $rowdata)
        {
            if ($rowdata['brouwernr'] == $_POST['edit'])
            {
                $id = $row;
            }
            
            
        }
                       
        $showUpdateForm = true;
        
        
    }
        
    if (isset($_POST['wijzigen']))
    {
        $updateQueryString = 'UPDATE brouwers
                        SET brnaam = :brnaam,
                            adres = : adres,
                            postcode = :postcode, 
                            gemeente = :gemeente,
                            omzet = :omzet
                            WHERE brouwernr = :brouwernr';
       
        
            
        $statement3 = $db -> prepare($updateQueryString);
        
        $statement3->bindValue(':brnaam', $_POST['brnaam'] );
        $statement3->bindValue(':adres', $_POST['adres'] );
        $statement3->bindValue(':postcode', $_POST['postcode'] );
        $statement3->bindValue(':gemeente', $_POST['gemeente'] );
        $statement3->bindValue(':omzet', $_POST['omzet'] );
        $statement3->bindValue(':brouwernr',$_POST['brouwernr']  );
        
               
        
        $gelukt2 = $statement3->execute();
        
        if ($gelukt2)
        {
            $messageContainer = ' Aanpassing succesvol doorgevoerd.';
        } 
        else 
        {
            $messageContainer =  'Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de systeembeheerder wanneer deze fout blijft aanhouden.';
        }
        
    }
    
    
    
    foreach( $fetchRow[0] as $key => $brouwer )
    {
        $columnNames[  ]	=	$key;
    }
    array_push($columnNames,'','');
    
        
    }

    catch( PDOException $e ){
    $messageContainer = 'Er ging iets mis: '.$e->getmessage();
}

?>
<!DOCTYPE html>
<html>
    <style>
        .odd{
            background-color: grey;
        }
    </style>
    <body>
        <?php echo $messageContainer ?>
        
        
        
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            
            
            <?php if ($showUpdateForm): ?>
                    <h1> Brouwerij <?php echo $fetchRow[$id]['brnaam'] ?> (# <?php echo $fetchRow[$id]['brouwernr'] ?> ) wijzigen </h1>

                    <ul>

                        <li>
                            <label for="brnaam">Brouwernaam</label>
                            <input type="text" name="brnaam" id="brnaam" value="<?php echo $fetchRow[$id]['brnaam'] ?>">
                        </li>
                        <li>
                            <label for="adres">Adres</label>
                            <input type="text" name="adres" id="adres" value="<?php echo $fetchRow[$id]['adres'] ?>">
                        </li>
                        <li>
                            <label for="postcode">Postcode</label>
                            <input type="text" name="postcode" id="postcode" value="<?php echo $fetchRow[$id]['postcode'] ?>">
                        </li>
                        <li>
                            <label for="gemeente">Gemeente</label>
                            <input type="text" name="gemeente" id="gemeente" value="<?php echo $fetchRow[$id]['gemeente'] ?>">
                        </li>
                        <li>
                            <label for="omzet">Omzet</label>
                            <input type="text" name="omzet" id="omzet" value="<?php echo $fetchRow[$id]['omzet'] ?>">
                        </li>
                  </ul>
                    <input type="hidden" value="<?php echo $fetchRow[$id]['brouwernr'] ?>" name="brouwernr">
                    <input type="submit" value="wijzigen" name="wijzigen">


                    
                    
                <?php endif ?>
                  
            <table>
                <thead>
                    <?php foreach ($columnNames as $key): ?>
                    <td><?php echo $key ?></td>
                    <?php endforeach ?>
                </thead>
                <tbody>
                    <?php foreach ($fetchRow as $row => $rowdata): ?> 
                    <?php if($row%2 !=0 ): ?>
                        <tr class="odd">
                    <?php else: ?>
                        <tr>
                    <?php endif ?>
                            <?php foreach($rowdata as $key =>$brouwer): ?>
                                <td><?php echo $brouwer ?></td>
                            <?php endforeach ?>
                            <td>
                                <button type="submit" name="delete" value="<?= $rowdata['brouwernr'] ?>" class="delete-button">
                                    <img alt="submit" src="icon-delete.png">
                                </button>
                            </td>
                            <td><button type="submit" name="edit" value="<?= $rowdata['brouwernr'] ?>">edit</button></td>

                        </tr>

                    <?php endforeach ?>

                </tbody>
            </table>
        </form>
    
    </body>
</html>