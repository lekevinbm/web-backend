<?php
    $rijen = 10;
    $kolommen = 10;
?>

<!DOCTYPE html>
<html>
    
    <style>
        td{
            padding: 10px;
            border: solid 1px black;
        }
    </style>
    <body>
        <table>
            <?php for($rij=0; $rij <= $rijen; $rij++): ?> 
                    <tr>
                        <?php for($kolom=0; $kolom <= $kolommen; $kolom++): ?>
                        <td>
                            <?php echo $kolom*$rij ?>
                        </td>
                        <?php endfor ?>
                    </tr>
                <?php endfor ?>
        </table>
    </body>
</html>