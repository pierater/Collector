<?php
include "../serverConnect/dbConnect.php";
$id = $_GET["id"];
$lat = $_GET["lat"];
$lon = $_GET["lon"];
if(!isUserId($id))
{
	print_r(json_encode(array("error" => "true"));
}
else
{
	$sql = "UPDATE `userLocations` SET `lat` = '$lat', `lon` = '$lon' WHERE `id` = '$id'";
	$query = $conn->query($sql);
	$command = escapeshellcmd("python ../matchMakerServer/matchMakerService.py $id $lat $lon &");
	$output = shell_exec($command);
}
?>
