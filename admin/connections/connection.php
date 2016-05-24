<?php 
    // include_once "constants.db.php";

    // Start a PHP session
    session_start();

  // Set the error reporting level
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

	$hostname  = "localhost";
	$database = "LK_admin";
	$username = "root";
	$password= "root";


    // Create a database object
    try {

         $db = new mysqli($hostname, $username, $password,$database);

		if (mysqli_connect_error()) {
			  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
 		}

 		// echo 'Connected successfully.';

    } catch (Exception $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit;
    }

?>