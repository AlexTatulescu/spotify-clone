<?php
include("includes/includedFiles.php");
?>

<div class="playListContainer">
    <div class="gridViewContainer">
        <h2>PLAYLISTS</h2>
        <div class="buttonItems">
            <button class="button green" onclick="createPlaylist()">NEW PLAYLIST</button>
        </div>

        <?php

        $username = $userLoggedIn->getUsername();
        $playlistsQuery = mysqli_query($connection, "SELECT * FROM playlists where owner='$username'");

        if (mysqli_num_rows($playlistsQuery) == 0) {
            echo "<span class='noResults'>You don't have any playlists yet.</span>";
        }

        while ($row = mysqli_fetch_array($playlistsQuery)) {

            $playlist = new Playlist($connection, $row);

            echo
                "<div class='gridViewItem' role='link' tabindex='0' 
                onclick='openPage(\"playlist.php?id=" . $playlist->getId() . "\")'>
                    <div class='playlistImage'>
                        <img src='assets/images/icons/playlist.png'>
                    </div>
                    <div class='gridViewInfo'>"
                        . $playlist->getName() .
                    "</div>
                </div>";
        }
        ?>
    </div>
</div>
