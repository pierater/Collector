<?php
include "../serverConnect/dbConnect.php";

$id = $_GET["id"];
$sql = "DELETE FROM `users` WHERE `id` = '$id'";
$query = $conn->query($sql);
?>
