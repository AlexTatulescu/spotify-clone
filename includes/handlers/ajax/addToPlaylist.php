<?php
include("../../config.php");


if(isset($_POST['playlistId']) && isset($_POST['songId'])) {
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];

    $orderIdQuery = mysqli_query($connection, "SELECT MAX(playlistOrder) + 1 as playlistOrder FROM playlist_Songs WHERE playlistId='$playlistId'");
    $row = mysqli_fetch_array($orderIdQuery);
    $order = $row['playlistOrder'];

    $query = mysqli_query($connection, "INSERT INTO playlist_Songs VALUES(null, '$songId', '$playlistId', '$order')");
}
else {
    echo "PlaylistId or songId was not passed into addToPlaylist.php";
}



?>