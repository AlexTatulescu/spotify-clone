<?php
include("../../config.php");

if (isset($_POST['name']) && isset($_POST['username'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $date = date('Y-m-d');

    $query = mysqli_query($connection, "INSERT INTO playlists VALUES(null, '$name', '$username', '$date')");
    var_dump(mysqli_error($connection));
    die();
} else {
    echo "Name or username parameters not passed into file";
}