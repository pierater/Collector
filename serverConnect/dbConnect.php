<?php
include("auth.php");
include("servername.php");

$conn;
try {
    $conn = new 
        PDO("mysql:host=$servername;dbname=collector", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
function isUser($mail)
{
	$sql = "SELECT `email` FROM `users` WHERE `email` = '$mail'";
	$data = $conn->query($sql);
	return(in_array($mail, $data))
}

function isUserId($id)
{
	$sql = "SELECT `id` FROM `users` WHERE `id` = '$id'";
	$data = $conn->query($sql);
	return(in_array($id, $data))
}
?>
