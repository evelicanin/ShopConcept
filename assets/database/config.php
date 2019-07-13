<?php
    
	//ob_start();        // output buffering
	//session_start();   // otvaranje sesije
	// session_destroy();   // ubijanje sesije
				
    // conn params
    
	    // host
		defined("DB_HOST") ? null : define("DB_HOST", "localhost");
        // user
		defined("DB_USER") ? null : define("DB_USER", "root");
        // password
		defined("DB_PASS") ? null : define("DB_PASS", "");
        // naziv baze
		defined("DB_NAME") ? null : define("DB_NAME", "shop_concept");
    
	// db connection
	$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	
	require_once("functions.php");
	require_once("session.php");

?>