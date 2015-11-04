<?php
    $artikels =	array(
					array(	'title'	=> 'Titel artikel 1',
							'body' 	=> 'Body artikel 1',
							'tags' 	=> 'Kernwoorden artikel 1',
					),
					array(	'title'	=> 'Titel artikel 2',
							'body' 	=> 'Body artikel 2',
							'tags' 	=> 'Kernwoorden artikel 2',
					),
					array(	'title'	=> 'Titel artikel 3',
							'body' 	=> 'Body artikel 3',
							'tags' 	=> 'Kernwoorden artikel 3',
					)
				);

    
    
   
    
?>

<html>
    <body>
        <?php include 'view/header-partial.html' ?>
        <?php include 'view/body-partial.html' ?>
        
        <?php foreach ( $artikels as $id => $artikel): ?>
		<article>
			<h1><?= $artikel[ 'title' ] ?></h1>
			<p><?= $artikel[ 'body' ] ?></p>
			<p><?= $artikel[ 'tags' ] ?></p>
			
		</article>
	<?php endforeach ?>
        
        <?php include 'view/footer-partial.html' ?>
    </body>
</html>