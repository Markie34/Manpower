<?php
$host_name = "localhost";
$database = "manpower_db"; 
$username = "root";          
$password = "";          


try {
$pdo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>