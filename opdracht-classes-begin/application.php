<?php
    function __autoload($classname){
        include 'classes/'.$classname.'.php';
    }

    $percent = new Percent(150,100);
?>
<!DOCTYPE html>
<html>
    <body>
        <p>Hoeveel procent is 150 van 100?</p>
        <table>
            <tr>
                <td>Absoluut</td>
                <td><?php echo $percent->absolute ?></td>
            </tr>
            <tr>
                <td>Relatief</td>
                <td><?php echo $percent->relative ?></td>
            </tr>
            <tr>
                <td>Geheel getal</td>
                <td><?php echo $percent->hundred ?></td>
            </tr>
            <tr>
                <td>Nominaal</td>
                <td><?php echo $percent->nominal ?></td>
            </tr>
        </table>
    </body>
</html>