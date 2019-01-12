<?php
include("../../config.php");

if (isset($_POST['playlistId'])) {
    $playlistId = $_POST['playlistId'];

    $playlistQuery = mysqli_query($connection, "DELETE FROM playlists WHERE id='$playlistId'");
    $songsQuery = mysqli_query($connection, "DELETE FROM playlist_songs WHERE playlistId='$playlistId'");
} else {
    echo "PlaylistId was not passed into file deletePlaylist.php";
}

?>