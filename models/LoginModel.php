<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/DBModel.php');
class LoginModel extends DBModel
{
    public function login($username, $password)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT * FROM user WHERE username = :username AND IsBlocked = 0";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['Password'])) {
            $this->disconnect($db);
            return $user;
        } else {
            $this->disconnect($db);
            return false;
        }
    }
    public function signup($username, $firstname, $lastname, $email, $date, $gender, $password)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "INSERT INTO user (username,FirstName, LastName, Gender, DateOfBirth, Email, Password)
                        VALUES (:username, :firstname, :lastname, :gender, :date, :email, :password)";
        $stmt = $db->prepare($sql);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();

        $insertedUserId = $db->lastInsertId();
        $sql = "SELECT * FROM user WHERE UserID = :userId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':userId', $insertedUserId);
        $stmt->execute();
        $insertedUser = $stmt->fetch();

        $this->disconnect($db);
        return $insertedUser;
    }
}
