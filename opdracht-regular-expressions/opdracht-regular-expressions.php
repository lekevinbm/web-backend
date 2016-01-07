<?php
    session_start();

    $expression = '';
    $string = '';
    $resultaat = '';

    
    if (isset($_POST['submit']))
    {
        echo 'blabla';
        
        $expression = $_POST['expression'];
        $RegExp = '/'.$_POST['expression'].'/';
        $string = $_POST['string'];
        $replaceString = '<span class="result">#</span>';
        $resultaat = preg_replace($RegExp,$replaceString,$string);
        
    }
?>
<!DOCTYPE html>
<style>
    .result{
        color: red;
    }
</style>
<html>
    <h1>RegEx Tester</h1>
    <form method="post" action="opdracht-regular-expressions.php">
        <ul>
            <li>
                <label for="expression">Regular Expressions</label>
                <input type="text" name="expression" id="expression" value="<?php echo $expression ?>">
            </li>
            <li>
                <label for="string">String</label>
                <textarea name="string"><?php echo $string ?></textarea>
            </li>
            <input type="submit" name="submit" value="verzenden">
        </ul>
    </form>
    
    <p>Resulaat: <?php echo $resultaat ?></p>
</html>