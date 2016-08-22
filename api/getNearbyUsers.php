<?php
include "../serverConnect/dbConnect.php";
$id = POST["id"];
$lat = POST["lat"];
$lon = POST["lon"];

$sql = "SELECT `id`, `lat`, `long`, 
    ( 3959 * acos( cos( radians(`lat`) ) * cos( radians( '$lat' ) ) *
    cos( radians( '$lon' ) - radians(`lon`) ) + sin( radians(`lat`) ) *
    sin( radians( '$lat' ) ) ) ) AS distance
        FROM `userLocations`
        LEFT JOIN `id` ON `userLocations.id` = `users.id`
        HAVING distance < 0.0095";

$query = $conn->query($sql);
$output = array();
$query->setFetchMode(PDO::FETCH_ASSOC);

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $output[] = $row;
}

echo json_encode($output);
?>
