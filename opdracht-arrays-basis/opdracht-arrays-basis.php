<?php
    $dieren1 = array('koe','aap','giraf');
    $dieren2[]= 'koe';
    $dieren2[]= 'aap';
    $dieren3[]= 'giraf';
        
    $voertuigen = array('landvoertuigen' => array('vespa','fiets'), 'watervoertuigen' => array('surfplank',
'vlot'),'luchtvoeruigen' => array('vliegtuig','luchtballon'));
?>
<!DOCTYPE>
<html>
    <body>
    <pre><?php var_dump($dieren1) ?></pre>
    <pre><?php var_dump($dieren2) ?></pre>
    <pre><?php var_dump($voertuigen)?></pre>
    </body>
</html>