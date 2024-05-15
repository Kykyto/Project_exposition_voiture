<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/DBModel.php');
class CompareModel extends DBModel
{
    public function getCompare($id)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);
        $sql = "SELECT 
                    v.VehicleID,
                    i.ImagePath,
                    v.VehiculeName,
                    b.BrandName,
                    m.ModelName,
                    m.ModelYear,
                    v.Version,
                    AVG(r.Rating) AS Note,
                    v.Dimensions,
                    e.Power,
                    p.Acceleration,
                    p.TopSpeed,
                    v.VitesseTYPE,
                    v.Consumption,
                    v.Capacity,
                    v.IndicativePrice
                FROM 
                    VehicleInfo v
                JOIN 
                    Model m ON v.ModelID = m.ModelID
                JOIN 
                    Brand b ON m.BrandID = b.BrandID
                JOIN 
                    Engine e ON v.EngineID = e.EngineID
                JOIN 
                    Performance p ON v.PerformanceID = p.PerformanceID
                LEFT JOIN 
                    Image i ON v.ImageID = i.ImageID
                LEFT JOIN 
                    Review r ON v.VehicleID = r.VehicleID
                WHERE 
                    v.VehicleID = :id
                GROUP BY
                    v.VehicleID,
                    i.ImagePath,
                    v.VehiculeName,
                    b.BrandName,
                    m.ModelName,
                    m.ModelYear,
                    v.Version,
                    v.Dimensions,
                    e.Power,
                    p.Acceleration,
                    p.TopSpeed,
                    v.VitesseTYPE,
                    v.Consumption,
                    v.Capacity,
                    v.IndicativePrice;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $vehicule = $stmt->fetch();
        $this->disconnect($db);
        return $vehicule;
    }
    public function handleCompare($id1, $id2)
    {
        $db = $this->connect($this->host, $this->dbname, $this->username, $this->password);

        $sqlCheckExistence = "SELECT ComparisonID, ComparisonCount FROM comparison WHERE (Vehicle1ID = :id1 AND Vehicle2ID = :id2) OR (Vehicle1ID = :id2 AND Vehicle2ID = :id1)";
        $stmtCheckExistence = $db->prepare($sqlCheckExistence);
        $stmtCheckExistence->bindParam(":id1", $id1);
        $stmtCheckExistence->bindParam(":id2", $id2);
        $stmtCheckExistence->execute();
        $existingComparison = $stmtCheckExistence->fetch();

        if ($existingComparison) {
            $comparisonID = $existingComparison['ComparisonID'];
            $currentCount = $existingComparison['ComparisonCount'] + 1;

            $sqlUpdateCount = "UPDATE comparison SET ComparisonCount = :count WHERE ComparisonID = :comparisonID";
            $stmtUpdateCount = $db->prepare($sqlUpdateCount);
            $stmtUpdateCount->bindParam(":count", $currentCount);
            $stmtUpdateCount->bindParam(":comparisonID", $comparisonID);
            $stmtUpdateCount->execute();
        } else {
            $sqlInsert = "INSERT INTO comparison (Vehicle1ID, Vehicle2ID, ComparisonCount) VALUES (:id1, :id2, 1)";
            $stmtInsert = $db->prepare($sqlInsert);
            $stmtInsert->bindParam(":id1", $id1);
            $stmtInsert->bindParam(":id2", $id2);
            $stmtInsert->execute();
        }

        $this->disconnect($db);
    }
}
