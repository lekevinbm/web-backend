<?php
    $boodschappenlijstje = array("koek","nutella","brood");
?>

<!DOCTYPE html>
<html>
    <body>
        <ul>
            <?php 
				$teller = 0;
			?>
			<?php while( isset( $boodschappenlijstje [ $teller ] ) ):  ?>
				
				<li><?= $boodschappenlijstje [ $teller ] ?></li>
				

				<?php $teller++ ?>
			<?php endwhile ?>
        </ul>
    </body>
</html>