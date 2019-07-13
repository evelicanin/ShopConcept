<?php

	// Including database connections
	require_once '../assets/database/config.php';
		
    // $logovani_korisnik = $_SESSION["username"];	        // once a login script is created, use this to insert logged user to db                            
	$logovani_korisnik = "logged_user";

	if(isset($_GET['id']))
	{	    
        $id = $_GET['id'];                                                              
	                                
		$query="delete from korpa where id='$id'";		
		
        $result = query($query) or die($mysqli->error.__LINE__);

		
		# JSON-encode the response
		echo $json_response = json_encode($result);

    }
	
?>

