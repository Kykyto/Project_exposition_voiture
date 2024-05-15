<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/DBModel.php');
class GuideModel extends DBModel
{
    public function getGuides($offset, $limit)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT G.*, I.ImageID, I.ImagePath
        FROM guidesetting G 
        JOIN Image I ON G.ImageID = I.ImageID
        ORDER BY G.Date DESC 
        LIMIT :limit OFFSET :offset;
        ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        $guides = $stmt->fetchAll();
        $this->disconnect($db);
        return $guides;
    }
    public function getAllGuides()
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT G.*, I.ImageID, I.ImagePath
        FROM guidesetting G 
        JOIN Image I ON G.ImageID = I.ImageID
        ORDER BY G.Date DESC 
        ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $guides = $stmt->fetchAll();
        $this->disconnect($db);
        return $guides;
    }
    public function getNombreGuides()
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT COUNT(*) AS NumberOfGuides FROM guidesetting;";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $guides = $stmt->fetch();
        $this->disconnect($db);
        return $guides;
    }
    public function getguideByID($id)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT G.*, I.ImageID, I.ImagePath FROM guidesetting G JOIN Image I ON G.ImageID = I.ImageID WHERE G.GuideSettingID = :GuideSettingID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":GuideSettingID", $id);
        $stmt->execute();
        $guide = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->disconnect($db);
        return $guide;
    }
    public function AddGuide($title, $Description, $image)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "INSERT IGNORE INTO Image (ImagePath) VALUES (:Logo);";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':Logo', $image);
        $stmt->execute();
        $ImageID = $db->lastInsertId();
        $sql = "INSERT IGNORE INTO guidesetting (Title, Description, ImageID) VALUES (:Title, :Description, :ImageID);";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':Title', $title);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':ImageID', $ImageID);
        $stmt->execute();
    }
    public function deleteGuide($imageID)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "DELETE FROM Image WHERE ImageID = :ImageID;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':ImageID', $imageID);
        $stmt->execute();
    }
    public function updateGuide($guideID, $title, $description)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "UPDATE guidesetting SET Title = :Title, Description = :Description WHERE GuideSettingID = :GuideSettingID;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':GuideSettingID', $guideID);
        $stmt->bindParam(':Title', $title);
        $stmt->bindParam(':Description', $description);
        $stmt->execute();
    }
    public function updateGuideImage($guideID, $image)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT ImageID FROM guidesetting WHERE GuideSettingID = :GuideSettingID;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':GuideSettingID', $guideID);
        $stmt->execute();
        $imageID = $stmt->fetch();
        $sql = "UPDATE Image SET ImagePath = :ImagePath WHERE ImageID = :ImageID;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':ImageID', $imageID['ImageID']);
        $stmt->bindParam(':ImagePath', $image);
        $stmt->execute();
    }
}
