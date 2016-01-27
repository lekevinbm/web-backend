<?php
    var_dump($_GET);

    include_once 'classes/Bieren.php';

    $method = $_GET['method'];
        
    $object = new Bieren();

    $object->$method();
	
	
?>