<?php

    try{
    $messageContainer = '';
    
    $db = new pdo('mysql:host=localhost;dbname=bieren','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    $queryString = 'select * from brouwers';
        
    $statement = $db -> prepare($queryString);
    $statement -> execute();
    
    $fetchRow = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchRow[]	=	$row;
		}  
        
        
    if (isset ($_POST['delete']))
        
    {
        var_dump($_POST['delete']);
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
    
    $columnNames	=	array();
    
    foreach( $fetchRow[0] as $key => $brouwer )
    {
        $columnNames[  ]	=	$key;
    }
    array_push($columnNames,'');
    
        
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



                        </tr>

                    <?php endforeach ?>

                </tbody>
            </table>
        </form>
    
    </body>
</html>