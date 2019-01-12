<?php
include("../../config.php");

if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];

    $query= mysqli_query($connection, "DELETE FROM playlist_songs WHERE playlistId='$playlistId' AND songId='$songId'");
} else {
    echo "PlaylistId or songId was not passed into file removeFromPlaylist.php";
}

?>