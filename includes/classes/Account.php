<?php

class Account
{
    private $connection;
    private $errorArray;

    public function __construct($connection)
    {
        $this->errorArray = [];
        $this->connection = $connection;
    }

    public function login($username, $plainPassword)
    {
        $encryptedPassword = md5($plainPassword);

        $query = mysqli_query($this->connection, "SELECT * FROM users where username='$username' AND password='$encryptedPassword'");

        if (mysqli_num_rows($query) === 1) {
            return true;
        } else {
            array_push($this->errorArray, Constants::$LOGIN_FAILED);
            return false;
        }
    }

    public function register($username, $firstName, $lastName, $email, $email2, $password, $password2)
    {
        $valid = false;

        $this->validateUsername($username);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $email2);
        $this->validatePasswords($password, $password2);

        if (empty($this->errorArray)) {

            $valid = $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
        }

        return $valid;
    }

    public function getError($error)
    {
        if (!in_array($error, $this->errorArray)) {
            $error = "";
        }

        return "<span class ='errorMessage'>$error</span>";
    }

    private function insertUserDetails($username, $firstName, $lastName, $email, $password)
    {
        $encryptedPassword = md5($password);
        $profilePic = "assets/images/profile-pics/ken_kaneki.jpg";
        $date = date("Y-m-d");

        $result = mysqli_query($this->connection, "INSERT INTO users values ('', '$username', '$firstName', '$lastName', '$email', '$encryptedPassword', '$date', '$profilePic')");

        return $result;
    }

    private function validateUsername($username)
    {
        if (strlen($username) > 25 || strlen($username) < 5) {
            array_push($this->errorArray, Constants::$USERNAME_MIN_MAX_LENGTH);

            return;
        }

        $checkUsernameQuery = mysqli_query($this->connection, "SELECT username FROM users WHERE username='$username'");
        if (mysqli_num_rows($checkUsernameQuery) !== 0) {
            array_push($this->errorArray, Constants::$USERNAME_TAKEN);

            return;
        }
    }

    private function validateFirstName($firstName)
    {
        if (strlen($firstName) > 25 || strlen($firstName) < 2) {
            array_push($this->errorArray, Constants::$FIRST_NAME_MIN_MAX_LENGTH);

            return;
        }
    }

    private function validateLastName($lastName)
    {
        if (strlen($lastName) > 25 || strlen($lastName) < 5) {
            array_push($this->errorArray, Constants::$LAST_NAME_MIN_MAX_LENGTH);

            return;
        }
    }

    private function validateEmails($email, $email2)
    {
        if ($email !== $email2) {
            array_push($this->errorArray, Constants::$EMAILS_DO_NOT_MATCH);

            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$EMAIL_INVALID_FORMAT);

            return;
        }

        $checkEmailQuery = mysqli_query($this->connection, "SELECT email FROM users WHERE username='$email'");
        if (mysqli_num_rows($checkEmailQuery) !== 0) {
            array_push($this->errorArray, Constants::$EMAIL_TAKEN);

            return;
        }
    }

    private function validatePasswords($password, $password2)
    {
        if ($password !== $password2) {
            array_push($this->errorArray, Constants::$PASSWORDS_DO_NOT_MATCH);

            return;
        }

        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, Constants::$PASSWORD_NOT_ALPHANUMERIC);

            return;
        }

        if (strlen($password) > 30 || strlen($password) < 5) {
            array_push($this->errorArray, Constants::$PASSWORD_MIN_MAX_LENGTH);

            return;
        }
    }
}