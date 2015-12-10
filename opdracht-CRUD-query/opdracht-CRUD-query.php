<?php

$rijenteller = 1;
    

try{
    $messageContainer = '';
    
    $db = new pdo('mysql:host=localhost;dbname=bieren','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    $bierPlaceholder = 'du%';
    $brouwerPlaceholder = '%a%';
    
    $query = 'select * from bieren
inner join brouwers
on (bieren.brouwernr = brouwers.brouwernr)
WHERE bieren.naam LIKE :bierPlaceholder
AND brouwers.brnaam LIKE :brouwerPlaceholder';
    
    $statement = $db -> prepare($query);
    $statement->bindValue(':bierPlaceholder', $bierPlaceholder );
    $statement->bindValue(':brouwerPlaceholder', $brouwerPlaceholder );
    
    $statement -> execute();
    
    $fetchRow = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchRow[]	=	$row;
		}
    
        $columnNames	=	array();
		$columnNames[]	=	'#';
		foreach( $fetchRow[0] as $key => $bier )
		{
			$columnNames[  ]	=	$key;
		}
           
}
   

catch( PDOException $e ){
    $messageContainer = 'Er ging iets mis: '.$e->getmessage();
}

?>
<!DOCTYPE html>
<style>
    .even{
        background-color: grey;   
    }
</style>
<html>
    <body>
        <h2>opdracht-CRUD-query</h2>
        
        <?php echo $messageContainer ?>
        
        <table>
            <thead>
                <?php foreach ($columnNames as $key): ?>
                <td><?php echo $key ?></td>
                <?php endforeach ?>
            </thead>
            <tbody>
                <?php foreach ($fetchRow as $row =>$rowdata): ?>
                    <?php if ($rijenteller%2 == 0):?>
                        <tr class="even">
                    <?php else :?>
                        <tr> 
                    <?php endif ?>
                            
                    <td><?php echo $rijenteller ?></td>
                    
                    <?php foreach($rowdata as $value) : ?>
                        <td><?php echo $value ?></td>
                    <?php endforeach ?>
                    
                    <?php $rijenteller++ ?>
                </tr>
                <?php endforeach ?>
                
            </tbody>
        </table>
        
    </body>
</html>