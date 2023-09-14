<?php

#server name
$sName = "localhost";
#username
$uName = "root";
#pass
$pass = "";

#database name
$db_name = "online_book_store_db";

/**

creating database connection
using PHP data object

PDO refers to PHP Data Object, which is a PHP extension that defines a lightweight and consistent interface for accessing a database in PHP.

**/

try {
	$conn = new PDO("mysql:host=$sName;dbname=$db_name", 
		$uName, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE,
	 PDO::ERRMODE_EXCEPTION);
 	
 }catch (PDOException $e) {
 	echo "connection failed : ". $e->getMessage();
 	
 } 