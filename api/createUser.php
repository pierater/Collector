<?php
include "../serverConnect/dbConnect.php";
$firstName = POST["firstName"];
$lastName = POST["lastName"];
$email = POST["email"];
$bio = POST["bio"];

$sql = "INSERT INTO `users` (`firstName`, `lastName`, `email`, `bio`) VALUES ('$firstName', '$lastName', '$email', '$bio')";

$query = $conn->query($sql);

$sql = "SELECT `id` FROM `users` WHERE `firstName` = '$firstName' AND `lastName` = '$lastName' AND `email` = '$email' AND `bio` = '$bio'";

$query = $conn->query($sql);

$query->setFetchMode(PDO::FETCH_ASSOC);
print_r(json_encode($query->fetch()));
?>
