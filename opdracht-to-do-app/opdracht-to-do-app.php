<?php
    session_start();
    
    

    $message	=	false;
    $postedYet = false;
    $sizeOfDone = 0;
    $sizeOfNotDone = 0;

    try{
        
        if (isset($_POST["submit"]))
        {
           

            if ($_POST["beschrijving"] == '')
            {
                inception01();
                
            }
            else
            {
                 $postedYet = true;
                if (isset($_SESSION["todo"]))
                {
                    $teller = sizeof($_SESSION["todo"]);  
                } 
                else
                {
                    $teller = 0;
                }
                $_SESSION["todo"][$teller]["beschrijving"] = $_POST["beschrijving"];
                $_SESSION["todo"][$teller]["id"] = $teller;
                $_SESSION["todo"][$teller]["done"] = false;
            }
        }
    }

    catch ( Exception $e )
	{
		$message['type']	=	'error';
        $message['text']	=	$e->getMessage();

	}

    function inception01(  )
	{
		inception02();
        
	}

	
	function inception02()
	{
		throw new Exception( 'Ahh, damn. Lege todos zijn niet toegestaan...' );
	}


    if (isset($_POST["done"]))
    {
        $postedYet = true;
        
        
        
        $id = $_POST["done"];
        $intid = (int)$id;
        $_SESSION["todo"][$intid]["done"] = true;
    }

    if (isset($_POST["undone"]))
    {
        $postedYet = true;
        
        $id = $_POST["undone"];
        $intid = (int)$id;
        $_SESSION["todo"][$intid]["done"] = false;
    }
    
    if (isset($_POST["delete"]))
    {
        $postedYet = true;
        
        $id = $_POST["delete"];
        $intid = (int)$id;
        unset( $_SESSION["todo"][$intid]);
        $_SESSION["todo"] = array_values($_SESSION["todo"]);
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <style>
        #error{
            background-color  : red;
            color : white;
        }
        </style>
    </head>
    
    <body>
        
        <?php if ( $message ): ?>
		 	<div id="error">
		 		<p><?php echo $message['text'] ?></p>
                
		 	</div>
		<?php endif ?>
        
        <h2>Todo app</h2>

        <?php if($postedYet): ?>

            <h3>Nog te doen</h3>

                <ul>
                    <?php $sizeOfNotDone = 0 ?>
                    
                    <?php foreach ($_SESSION["todo"] as $key): ?>

                        <?php if (!$key["done"]): ?>
                            <form action="opdracht-to-do-app.php" method="post">
                                <label><?php echo $key["beschrijving"] ?></label><br>

                                <button type="submit" name="done" value="<?php echo $key["id"] ?>">done</button>

                                <input type="submit" name ="delete" value="verwijderen">

                            </form>
                    
                            <?php $sizeOfNotDone++ ?>
                        <?php endif ?>
                    
                        
                    
                    <?php endforeach ?>
                    
                    <?php if($sizeOfNotDone==0 && $sizeOfDone !=0): ?>
                        <p>Schouderklopje, alles is gedaan!</p>
                    <?php endif ?>
                </ul>

            <h3>Done and done</h3>
                <ul>
                    <?php $sizeOfDone = 0 ?>
                    
                    <?php foreach ($_SESSION["todo"] as $key): ?>

                        <?php if ($key["done"]): ?>
                            <form action="opdracht-to-do-app.php" method="post">
                                <label><?php echo $key["beschrijving"] ?></label><br>
                                
                                <button type="submit" value="<?php echo $key["id"] ?>"name="undone">undone</button>
                                
                                <input type="submit" name ="delete" value="verwijderen">

                            </form>
                            
                            <?php $sizeOfDone++ ?>
                        <?php endif ?>
                        
                                
                    <?php endforeach ?>
                    
                    <?php if($sizeOfDone == 0 && $sizeOfNotDone !=0): ?>
                        <p>Werk aan de winkel...</p>
                    <?php endif ?>
                    
        <?php endif ?>

        <h2>Todo Toevoegen</h2>
        <form action="opdracht-to-do-app.php" method="post">
            <label for="beschrijving">Beschrijving:</label>
            <input type="text" name="beschrijving" id="beschrijving"> <br>
            <input type="submit" name="submit" value="Toevoegen">

        </form>
    </body>
</html>