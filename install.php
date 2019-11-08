<?php
$servername = "mysql:host=localhost;dbnane=camagru";
$username = "root";
$password = "Motivation03";
$dbname = "camagru";
try
{
    $pdo = new PDO('mysql:host=localhost', $username, $password);
     
	// $pdo = new PDO($servername, $username, $password);
}
    catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
if ($pdo === FALSE)
{
   die('ERROR: Could not connect');
}

$requete = "CREATE DATABASE IF NOT EXISTS `".camagru."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->prepare($requete)->execute(); 

$conn = new PDO('mysql:host=localhost;dbname=camagru;charset=utf8', 'root', 'Motivation03');
$sql = file_get_contents("setup_mysql.sql");
$conn->prepare($sql)->execute(); 

?>
