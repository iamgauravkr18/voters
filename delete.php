<?php
include 'connection.php';
$id = $_GET['id'];
$querry = "DELETE FROM voters WHERE id = $id";

$result = $conn->query($querry);

if ($result) {
    header("Location: http://localhost/voters/index.php");
}

?>