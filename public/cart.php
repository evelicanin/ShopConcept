<?php

	// Including database connections
	require_once '../assets/database/config.php';
	            
		$query="select * from korpa";
		$run_query = query($query);      
		confirm($run_query);		
		
		$arr = array();

		while ($row = fetch_array($run_query))
		{			
            $arr[] = $row;	
		}

		// testing/printing the data that's been fetched
        // echo '<pre>'; print_r($arr); echo '</pre>';
		
		
		# JSON-encode the response
		echo $json_response = json_encode($arr);


?>