<?php 

    $messageContainer = '';
    $orderArray = array('','');
    $orderQuery = '';
    

    try{
        $db = new pdo('mysql:host=localhost;dbname=bieren','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        if (isset($_GET['orderby']))
        {
            $orderArray = explode('-',$_GET['orderby']);
            $orderQuery = 'ORDER BY '.$orderArray[1].' '.$orderArray[0];
            
            
        }
        
        $queryString = 'SELECT bieren.biernr,
                                bieren.naam,
                                brouwers.brnaam,
                                soorten.soort,
                                bieren.alcohol 
                        FROM bieren 
                        INNER JOIN brouwers
                        ON bieren.brouwernr = brouwers.brouwernr 
                        INNER JOIN soorten 
                        ON bieren.soortnr = soorten.soortnr '
                        .$orderQuery;
        
        $statement = $db->prepare($queryString);
        $statement->execute();
        
        $fetchRow = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchRow[]	=	$row;
		}  
        
        
        
        $columnNames	=	array();
    
        
        $i =0;
        foreach( $fetchRow[0] as $key => $brouwer )
        {
           
            $columnNames[$i]['naam']	=	$key;
            if ($orderArray[1] == $key)
            {
                if ($orderArray[0] == 'DESC')
                {
                    $columnNames[$i]['order'] = 'ASC';
                } 
                else
                {
                    $columnNames[$i]['order'] = 'DESC';
                }
                    
            } 
            else
            {
                $columnNames[$i]['order'] = 'DESC';
            }
            
            $i++;
           
            
        }

    }

    

    catch (PDOException $e){
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
        <h2>Opdracht CRUD query - order by</h2>

        <?php echo $messageContainer ?>

        <table>
            <thead>
                <?php foreach ($columnNames as $key => $value):?>
                    <th><a href="<?php echo $_SERVER['PHP_SELF'] ?>?orderby=<?php echo $value['order'] ?>-<?php echo $value['naam'] ?>" ><?php echo $value['naam'] ?> <?php if( $value['order'] == 'DESC' && $orderArray[1] == $value['naam'] ):?> <img src="icon-desc.png"><?php elseif($value['order'] == 'ASC' && $orderArray[1] == $value['naam']) : ?><img src="icon-asc.png"><?php endif ?></a></th>
                <?php endforeach ?>
            </thead>
            <tbody>
                        <?php foreach ($fetchRow as $row => $rowdata): ?> 
                            <?php if($row%2 !=0 ): ?>
                                <tr class="odd">
                            <?php else: ?>
                                <tr>
                            <?php endif ?>
                                    <?php foreach($rowdata as $key =>$columndata): ?>
                                        <td><?php echo $columndata ?></td>
                                    <?php endforeach ?>
                                </tr>
                        <?php endforeach ?>

                    </tbody>
        </table>
    </body>
</html>