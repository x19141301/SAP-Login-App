<?php
// Connection details
$server= "localhost";
$username= "root";
$password = "root";
$database = "login_system";
// Make connection
$conn = mysqli_connect($server, $username, $password, $database);

// establish a PDO connection to your database
try 
{
    $pdo = new PDO("mysql:host=$server;dbname=$database;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
    echo "Connection failed: " . $e->getMessage();
}


// Echo if connection is made
if ($conn) 
{
	//echo "Connection made!";
}
else if (!$conn)
{
    echo "Connection failed!";
}
else
{
    echo "Unknown Error";
}
?>