<?php

class Album
{
    private $connection;
    private $id;
    private $title;
    private $artistId;
    private $genre;
    private $artworkPath;

    public function __construct($connection, $id)
    {
        $this->connection = $connection;
        $this->id = $id;

        $query = mysqli_query($this->connection, "SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($query);

        $this->title = $album['title'];
        $this->artistId = $album['artist'];
        $this->genre = $album['genre'];
        $this->artworkPath = $album['artworkPath'];
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getArtist()
    {
        return new Artist($this->connection, $this->artistId);
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getArtworkPath()
    {
        return $this->artworkPath;
    }
}
