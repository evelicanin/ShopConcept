<?php

	// Including database connections
	require_once '../assets/database/config.php';
		
    // $logovani_korisnik = $_SESSION["username"];	        // once a login script is created, use this to insert logged user to db                            
	$logovani_korisnik = "logged_user";

	if(isset($_GET['id']))
	{
	    
        $id = $_GET['id'];                                                              
	
        $produkt_set = find_product_by_id($id);	                                        
		$produkt     = mysqli_fetch_assoc($produkt_set);                                
		
        // insert
		$insert_result = cartInsert($id, $produkt["naziv"], $logovani_korisnik);        
		
		// testing/printing the data that's been fetched
        // echo '<pre>'; print_r($arr); echo '</pre>';
		
		
		# JSON-encode the response
		echo $json_response = json_encode($insert_result);

    }
	
?>