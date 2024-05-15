<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/DBModel.php');
class UserModel extends DBModel
{
    public function getUsers()
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT * FROM user";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        $this->disconnect($db);
        return $users;
    }
    public function getUserById($id)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT * FROM user WHERE UserID = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch();
        $this->disconnect($db);
        return $user;
    }
    public function deleteUser($id)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "DELETE FROM user WHERE UserID = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->disconnect($db);
    }
    public function modifyUser($id, $username, $FirstName, $LastName, $Email, $DateOfBirth, $Gender)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "UPDATE user
        SET
            username = :username,
            FirstName = :FirstName,
            LastName = :LastName,
            Email = :Email,
            DateOfBirth = :DateOfBirth,
            Gender = :Gender
        WHERE
            UserID = :id;
        ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':FirstName', $FirstName);
        $stmt->bindParam(':LastName', $LastName);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':DateOfBirth', $DateOfBirth);
        $stmt->bindParam(':Gender', $Gender);

        $stmt->execute();
        $this->disconnect($db);
    }
    public function toggleUser($id, $IsBlocked)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "UPDATE user
        SET
            IsBlocked = :IsBlocked
        WHERE
            UserID = :id;
        ";
        print_r($IsBlocked);
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':IsBlocked', $IsBlocked);
        $stmt->execute();
        $this->disconnect($db);
    }
    public function addFavorite($vehicleID, $userID)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql1 = "SELECT * FROM Favorite WHERE VehicleID = :vehicleID AND UserID = :userID";
        $stmt1 = $db->prepare($sql1);
        $stmt1->bindParam(':vehicleID', $vehicleID);
        $stmt1->bindParam(':userID', $userID);
        $stmt1->execute();
        $favorite = $stmt1->fetch();
        if (!$favorite) {
            $sql2 = "INSERT INTO Favorite (VehicleID, UserID) VALUES (:vehicleID, :userID)";
            $stmt2 = $db->prepare($sql2);
            $stmt2->bindParam(':vehicleID', $vehicleID);
            $stmt2->bindParam(':userID', $userID);
            $stmt2->execute();
        }
        $this->disconnect($db);
    }

    public function deleteFavorite($vehicleID, $userID)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql1 = "SELECT * FROM Favorite WHERE VehicleID = :vehicleID AND UserID = :userID";
        $stmt1 = $db->prepare($sql1);
        $stmt1->bindParam(':vehicleID', $vehicleID);
        $stmt1->bindParam(':userID', $userID);
        $stmt1->execute();
        $favorite = $stmt1->fetch();
        if ($favorite) {
            $sql2 = "DELETE FROM Favorite WHERE VehicleID = :vehicleID AND UserID = :userID";
            $stmt2 = $db->prepare($sql2);
            $stmt2->bindParam(':vehicleID', $vehicleID);
            $stmt2->bindParam(':userID', $userID);
            $stmt2->execute();
        }
        $this->disconnect($db);
    }
}
