<?php

	// Check of de request een ajax-request was
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	{
        if (isset($_POST['submit']))
		{
            $ajaxMessage['type'] = 'succes';
            
        } 
        else    
        {
            $ajaxMessage['type'] = 'error';
        }
        
        $jsonMessage = json_encode($ajaxMessage);
            
        echo $jsonMessage;
    }
?>