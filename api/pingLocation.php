<?php
include "../serverConnect/dbConnect.php";
$id = POST["id"];
$lat = POST["lat"];
$long = POST["long"];

$sql = "UPDATE userLocations (id, lat, lon) VALUES ($id, $lat, $long)";

$query = $conn->query($sql);
?>
