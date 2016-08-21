<?php
include "../serverConnect/dbConnect.php";
$id = POST["id"];

try {
$sql = "DELETE FROM users WHERE id = $id";
} catch(exception e) {
    print_r(json_encode(e->getMessage()));
}

$query = $conn->query($sql);
?>
