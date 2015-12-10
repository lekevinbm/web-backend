<?php 
   $getIsSet = false;

    try{
        $messageContainer = '';
        $db = new pdo('mysql:host=localhost;dbname=bieren','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        $query = 'SELECT brouwers.brouwernr, brouwers.brnaam 
                FROM brouwers';
        
        $statement = $db -> prepare($query);
        $statement->execute();
        
        $fetchRow = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchRow[]	=	$row;
		}
        
        $fetchRow2 = array();
        
        if (isset($_GET['brouwernr']))
        {
            $getIsSet = true;
            
            $brouwernr = $_GET['brouwernr'];
                
            $bierenQuery	=	'SELECT bieren.naam
										FROM bieren 
										WHERE bieren.brouwernr = :brouwernr';
            $bierenstatement = $db -> prepare($bierenQuery);
            $bierenstatement->bindValue(':brouwernr', $brouwernr );
            
            $bierenstatement -> execute();
            
            

            while ( $bierRow = $bierenstatement->fetch(PDO::FETCH_ASSOC) )
            {
                $fetchRow2[]	=	$bierRow['naam'];
            }
        }
        
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
    <h2>opdracht-CRUD-query deel2</h2>
        
    
        
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='get'>
        <select name="brouwernr">
            <?php foreach ($fetchRow as $rowdata => $value ): ?>
                <?php if($getIsSet && $value['brouwernr'] == $brouwernr):?>
                    <option value="<?php echo $value['brouwernr'] ?>" selected><?php echo $value['brnaam']?></option>
                <?php else: ?>
                    <option value="<?php echo $value['brouwernr'] ?>"><?php echo $value['brnaam']?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Geef mij alle bieren van deze brouwerij">
    </form>
        
    <table>
        <thead>
            <tr>
            <td>Aantal</td>
            <td>naam</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($fetchRow2 as $rowkey => $bier): ?>
                <?php if($rowkey%2 !=0 ): ?>
                    <tr class="odd">
                <?php else: ?>
                    <tr>
                <?php endif ?>
                    <td> <?php echo $rowkey ?> </td>
                    <td> <?php echo $bier ?> </td>
                </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>    
    </body>
</html>