<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/DBModel.php');
class NewsModel extends DBModel
{
    public function getNews($offset, $limit)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT N.NewsID, N.Title, I.ImageID, I.ImagePath, N.Content, N.Date
        FROM News N 
        JOIN (
            SELECT NewsID, ImageID 
            FROM NewsImage 
            GROUP BY NewsID 
        ) NI ON N.NewsID = NI.NewsID 
        JOIN Image I ON NI.ImageID = I.ImageID
        ORDER BY N.Date DESC 
        LIMIT :limit OFFSET :offset;
        ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        $news = $stmt->fetchAll();
        $this->disconnect($db);
        return $news;
    }
    public function getAllNews()
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT N.NewsID, N.Title, I.ImageID, I.ImagePath, N.Content, N.Date
                    FROM News N 
                    JOIN (
                        SELECT NewsID, ImageID 
                        FROM NewsImage 
                        GROUP BY NewsID 
                    ) NI ON N.NewsID = NI.NewsID 
                    JOIN Image I ON NI.ImageID = I.ImageID
        ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $news = $stmt->fetchAll();
        $this->disconnect($db);
        return $news;
    }
    public function getNewsByID($id)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT N.NewsID, N.Title, N.Content, N.Date, I.ImageID, I.ImagePath FROM News N LEFT JOIN NewsImage NI ON N.NewsID = NI.NewsID LEFT JOIN Image I ON NI.ImageID = I.ImageID WHERE N.NewsID = :NewsID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":NewsID", $id);
        $stmt->execute();
        $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = array(
            'NewsID' => $news[0]['NewsID'],
            'Title' => $news[0]['Title'],
            'Content' => $news[0]['Content'],
            'Date' => $news[0]['Date'],
            'Images' => array_map(function ($item) {
                return $item['ImagePath'];
            }, $news)
        );
        $this->disconnect($db);
        return $result;
    }
    public function deleteImage($id, $image)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT ImageID FROM Image WHERE ImagePath = :image;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":image", $image);
        $stmt->execute();
        $imageID = $stmt->fetch();
        $sql = "DELETE FROM Image WHERE ImagePath = :image;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":image", $image);
        $stmt->execute();
        $sql = "DELETE FROM NewsImage WHERE NewsID = :NewsID AND ImageID = :imageID;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":NewsID", $id);
        $stmt->bindParam(":imageID", $imageID['ImageID']);
        $stmt->execute();

        $this->disconnect($db);
    }

    public function getNombreNews()
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT COUNT(*) AS NumberOfNews FROM News;";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $news = $stmt->fetch();
        $this->disconnect($db);
        return $news;
    }
    public function getNewsImages($id)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT ImagePath FROM Image I JOIN NewsImage NI ON I.ImageID = NI.ImageID WHERE NI.NewsID = :id;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect($db);
        return $images;
    }
    public function deleteNews($id)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "DELETE FROM News WHERE NewsID = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    public function updateNews($id, $title, $content)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);

        $sql = "UPDATE News SET Title = :title, Content = :content WHERE NewsID = :id;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->execute();
        $this->disconnect($db);
    }
    public function AddNews($title, $content)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);

        $sql = "INSERT INTO News (Title, Content) VALUES (:title, :content);";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->execute();
        $newsID = $db->lastInsertId();
        $this->disconnect($db);
        return $newsID;
    }
    public function InsertImages($id, $imagesArray)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);

        foreach ($imagesArray as $image) {
            $sql = "INSERT INTO Image (ImagePath) VALUES (:image);";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":image", $image);
            $stmt->execute();
            $imageID = $db->lastInsertId();
            $sql = "INSERT INTO NewsImage (NewsID, ImageID) VALUES (:NewsID, :imageID);";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":NewsID", $id);
            $stmt->bindParam(":imageID", $imageID);
            $stmt->execute();
        }
        $this->disconnect($db);
    }
}
