<?php 
    session_start();
    $message = '';
    $email = '';
    $profiledir = '';

    if (isset($_SESSION['message']['notificatie']))
    {
      $message = $_SESSION['message']['notificatie'];
    }

    if (isset($_SESSION['registratie']['email']))
    {
        $email = $_SESSION['registratie']['email'];
    }

    try{
        $db = new pdo('mysql:host=localhost;dbname=opdracht-file-upload','root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        $QueryString = 'SELECT profile_picture from users
                        WHERE email = :email';

        $statement = $db -> prepare($QueryString);
        $statement->bindValue(':email',$email);
        
        $statement -> execute();

        $fetchRow = array();

        while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
            {
                $fetchRow[]	=	$row;
            }
        
        define('ROOT', dirname(getcwd()));
        $profiledir = '\\img\\'.$fetchRow[0]['profile_picture'];      
        
    }
    
     catch( PDOException $e )
    {
        $_SESSION['message']['dbconnection']  = 'Er ging iets mis: '.$e->getmessage();
    }
?>
<!DOCTYPE html>
<html>
    <style>
        .message{
            background-color: red;
            color: white;
        }
        img{
            height = 10px;
            width = 10px;
        }
    </style>
    <body>
                
        <a href="dashboard.php">Terug naar dashboard</a>
        <a href="logout.php">uitloggen</a>
        <h1>Gegevens wijzigen</h1>
        
        <p class="message"><?php echo $message ?></p>
        
        <form action="gegevens-bewerken.php" method="post" enctype="multipart/form-data">
            <label>Profielfoto</label><br>
            <img src="<?php if($profiledir != '\\img\\'): ?>
                            <?php echo $profiledir ?>
                            <?php else :?>
                            img/placeholder.png
                            <?php endif ?>" alt="profielfoto">
            <input type="file" name="profielfoto"><br>
            <label for="email">e-mail</label>
            <input type="text" name = "email" value="<?php echo $_SESSION['registratie']['email']?>">
            <input type="submit" name="submit" value="Gegevens wijzigen">
            
        </form>
        
    </body>
</html>