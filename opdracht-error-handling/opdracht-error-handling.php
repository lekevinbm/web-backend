<?php 
    try{
        
        if (isset($_POST["submit"]))
        {
            
            if (isset($_POST["kortingscode"]))
            {
                
            }
            else
            {
                throw new Exception("SUBMIT-ERROR");
            }
        }
    }

    catch(Exception $e){
        
    }
?>
<!DOCTYPE html>
<html>
    <body>
        <h2>Geef uw kortingscode op</h2>
        <form method="post">
            <label for="kortingscode">kortingscode</label><br>
            <input type="text" name="kortingscode"><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>