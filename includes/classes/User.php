<?php

class User
{
    private $connection;
    private $username;

    public function __construct($connection, $username)
    {
        $this->connection = $connection;
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function  getFirstAndLastName() {
        $querry = mysqli_query($this->connection,"SELECT concat(firstName,' ',lastName) as 'name' FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($querry);
        return $row['name'];
    }
}