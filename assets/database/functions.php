<?php

	// global
	$upload_directory = "uploads";

/**************************************************************************************************************************************************/ 
/**** HELPER FUNCTIONS ****************************************************************************************************************************/ 
/**************************************************************************************************************************************************/ 

    // funkcija za preusmjeravanje korisnika
	function redirect($location)
	{
		return header("Location: $location");
	}
 
    // funkcija za setovanje poruke za sesiju
	function set_message($msg)
	{
		if(!empty($msg)) 
		{
			$_SESSION['message'] = $msg;
		}
		else 
		{
			$msg = "";
		}
	}
 
	// funkcija za prikaz poruke
	function display_message() 
	{
		if(isset($_SESSION['message'])) 
		{
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
	}
		
	// funkcija za ciscenje stringova koje korisnik unese
	function escape_string($string)
	{
        global $connection;         		
		return mysqli_real_escape_string($connection, $string);
	}
	
/**************************************************************************************************************************************************/ 	
/**** HELPER FUNCTIONS ****************************************************************************************************************************/ 
/**************************************************************************************************************************************************/

/**************************************************************************************************************************************************/ 	
/**** DATABASE FUNCTIONS **************************************************************************************************************************/ 
/**************************************************************************************************************************************************/
	
	
	// funkcija koja vraca ID posljednjeg inserta
	function last_id()
	{
		global $connection;
		return mysqli_insert_id($connection);
	} 
	
	// funkcija za izvrsavanje sql upita
	function query($sql)
	{
        global $connection;		
		return mysqli_query($connection, $sql);		
	}
	
    // funkcija za dohvatanje slogova izvrsenog upita
	function fetch_array($result)
	{
		return mysqli_fetch_array($result);	
	}
	
    // funkcija za provjeru ispravnosti izvrsenog upita
	function confirm($result)
	{
	    global $connection;         		
        if(!$result)
		    {
				die("DATABASE QUERY FAILED " . mysqli_error($connection));
            }		
	}
	
/**************************************************************************************************************************************************/
/**** DATABASE FUNCTIONS **************************************************************************************************************************/ 
/**************************************************************************************************************************************************/ 
    	
/**************************************************************************************************************************************************/ 
/**** LOGIN FUNCTIONS *****************************************************************************************************************************/ 
/**************************************************************************************************************************************************/ 

	function login_user()
	{
		if(isset($_POST['submit']))
		{
			$username = escape_string($_POST['username']);
			$password = escape_string($_POST['password']);
			
            // ovo je sql upit kojeg zelimo izvrsiti na nasoj bazi	
			$query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password }' ");
			confirm($query);

			// ukoliko user postoji u bazi, rezultat je = 1, ukoliko ne postoji takav user, rezultat je = 0
			if(mysqli_num_rows($query) == 0) 
			{
				set_message("Your Password or Username are wrong");
				redirect("login.php"); // ostajemo na istoj stranici
			} 
			else 
			{
				$_SESSION['username'] = $username;
				redirect("admin/index.php?admin_content"); // preusmjeravamo korisnika na administraciju
			}
		}
	}
	
	// funkcija koja provjerava da li je logovan korisnik
	function user_is_logged()
	{
		if(!isset($_SESSION['username']))
		{
		    set_message("You need to login as admin to see the admin area");
		    redirect("../../public"); // ne ovako, izbjeci koristenje / ili \, koristiti DS
		    //redirect ("..' . DS . '..' . DS . 'public"); // vracamo iz indexa administracije na index shopa 
		}
	}
	
/**************************************************************************************************************************************************/ 
/**** LOGIN FUNCTIONS *****************************************************************************************************************************/
/**************************************************************************************************************************************************/ 

/**************************************************************************************************************************************************/ 
/**** FRONT-END FUNCTIONS *************************************************************************************************************************/ 
/**************************************************************************************************************************************************/ 

    // f-ja koja dohvata i prikazuje sve kategorije u vidu liste linkova
	function get_categories()
	{	
		$query = "SELECT * FROM produkt_kategorije order by NAZIV_KATEGORIJE ASC";    
		$run_query = query($query);      

		confirm($run_query);                    
        

		echo '<ul style="list-style:none;">';
		    echo '<li>  
			            <button type="button" class="btn ink-reaction btn-flat btn-primary btn-lg" 
		                    ng-click="resetCategoryFilter()">
							all products
					    </button>
			    </li>';
		while ($row = fetch_array($run_query))
		{			
			echo '<li>
			        <button type="button" class="btn ink-reaction btn-flat btn-primary" 
							ng-click="productFilter.NAZIV_KATEGORIJE = &#039;'.htmlentities($row["NAZIV_KATEGORIJE"]).'&#039;">
							'.htmlentities($row["NAZIV_KATEGORIJE"]).'
				  </button>
				</li>';
		}
		echo '</ul>';
	}	
	
	// f-ja koja pronalazi produkt za proslijedjeni ID produkta
	function find_product_by_id($id) 
	{
		global $connection;

		$query  = "SELECT id, naziv ";
		$query .= "FROM produkti ";
		$query .= "WHERE id = '{$id}' ";
		$query .= "LIMIT 1";
		
		$produkt = mysqli_query($connection, $query);
		confirm($produkt);
		return $produkt;
	}	
		
	// f-ja za insert produkta u korpu
 	function cartInsert($id, $naziv, $user) {
		global $connection;

		$insert_produkt  = "INSERT INTO korpa (";
		$insert_produkt .= "  produkt_id, naziv, user, time";
		$insert_produkt .= ") VALUES (";
		$insert_produkt .= "  '{$id}', '{$naziv}', '{$user}', now() ";
		$insert_produkt .= ")";

		$result = mysqli_query($connection, $insert_produkt);
		confirm($result);
		return $result;
	} 
	
?>