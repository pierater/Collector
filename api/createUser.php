<?php
include "../serverConnect/dbConnect.php";
$firstName = $_GET["firstName"];
$lastName = $_GET["lastName"];
$email = $_GET["email"];
$bio = $_GET["bio"];
$lon = $_GET["lon"];
$lat = $_GET["lat"];

$sql = "INSERT INTO `users` (`firstName`, `lastName`, `email`, `bio`) VALUES ('$firstName', '$lastName', '$email', '$bio')";
$query = $conn->query($sql);

$sql = "SELECT `id` FROM `users` WHERE `firstName` = '$firstName' AND `lastName` = '$lastName' AND `email` = '$email' AND `bio` = '$bio'";

$query = $conn->query($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);
$output = $query->fetch();
$id = $output["id"];
$sql = "INSERT INTO `userLocations` (`id`, `lat`, `lon`) VALUES ('$id', '$lat', '$lon')";
$query = $conn->query($sql);
print_r(json_encode($output));
?>
