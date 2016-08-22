<?php
include "../serverConnect/dbConnect.php";
$id = $_GET["id"];
$lat = $_GET["lat"];
$lon = $_GET["lon"];
$sql = "UPDATE `userLocations` SET `lat` = '$lat', `lon` = '$lon' WHERE `id` = '$id'";
$query = $conn->query($sql);
?>
