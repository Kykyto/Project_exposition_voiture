<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminUpdateVehiclePageView extends AdminLayoutView
{

    public function content($id)
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/Admin/BrandsPageController.php');
        $controller = new AdminBrandsPageController();
        $vehicle = $controller->getVehiculeByID($id);
?>
        <div class="NewsInfo">
            <div>
                <h3>Update Vehicle</h3>
            </div>
            <form id="AddVehicleForm" action="/Project/Api/api.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="VehicleID" value="<?= $vehicle["VehicleID"] ?>">
                <input type="hidden" name="ImagePath" value="<?= $vehicle["ImagePath"] ?>">
                <input type="hidden" name="ImageID" value="<?= $vehicle["ImageID"] ?>">
                <input type="hidden" name="ModelID" value="<?= $vehicle["ModelID"] ?>">
                <input type="hidden" name="EngineID" value="<?= $vehicle["EngineID"] ?>">
                <input type="hidden" name="PerformanceID" value="<?= $vehicle["PerformanceID"] ?>">
                <div>
                    <div>
                        <label for="BrandID">Brand Name</label>
                        <select name="BrandID" required>
                            <option>Select the Brand of the Vehicle</option>
                            <?php
                            $controller = new AdminBrandsPageController();
                            $brands = $controller->getBrands();
                            foreach ($brands as $brand) {
                                $selected = $vehicle["BrandID"] == $brand['BrandID'] ? "selected" : "";
                                echo "<option value='" . $brand['BrandID'] . "' " . $selected  . ">" . $brand['Brand'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="ModelName">Model Name</label>
                        <input id="ModelName" name="ModelName" type="text" required placeholder="Enter the Model Name of the Vehicle" value="<?= $vehicle["ModelName"] ?>">
                    </div>
                    <div>
                        <label for="Version">Version</label>
                        <input id="Version" name="Version" type="text" required placeholder="Enter the Version of the Vehicle" value="<?= $vehicle["Version"] ?>">
                    </div>
                    <div>
                        <label for="ModelYear">Year</label>
                        <input id="ModelYear" name="ModelYear" type="number" required placeholder="Enter the Year of the Vehicle" value="<?= $vehicle["ModelYear"] ?>">
                    </div>
                    <div>
                        <label for="IndicativePrice">Price</label>
                        <input id="IndicativePrice" name="IndicativePrice" type="text" required placeholder="Enter the Price of the Vehicle" value="<?= $vehicle["IndicativePrice"] ?>">
                    </div>
                    <div>
                        <label for="EngineName">Engine Name</label>
                        <input id="EngineName" name="EngineName" type="text" required placeholder="Enter the Engine Name of the Vehicle" value="<?= $vehicle["EngineName"] ?>">
                    </div>
                    <div>
                        <label for="EnginType">Engine Type</label>
                        <input id="EnginType" name="EnginType" type="text" required placeholder="Enter the Engine Type of the Vehicle" value="<?= $vehicle["EngineType"] ?>">
                    </div>
                    <div>
                        <label for="Power">Power</label>
                        <input id="Power" name="Power" type="text" required placeholder="Enter the Power of the Vehicle" value="<?= $vehicle["Power"] ?>">
                    </div>
                    <div>
                        <label for="Acceleration">Acceleration</label>
                        <input id="Acceleration" name="Acceleration" type="text" required placeholder="Enter the Acceleration of the Vehicle" value="<?= $vehicle["Acceleration"] ?>">
                    </div>
                    <div>
                        <label for="TopSpeed">Top Speed</label>
                        <input id="TopSpeed" name="TopSpeed" type="text" required placeholder="Enter the Top Speed of the Vehicle" value="<?= $vehicle["TopSpeed"] ?>">
                    </div>
                    <div>
                        <label for="Consumption">Consumption</label>
                        <input id="Consumption" name="Consumption" type="text" required placeholder="Enter the Consumption of the Vehicle" value="<?= $vehicle["Consumption"] ?>">
                    </div>
                    <div>
                        <label for="Dimensions">Dimensions</label>
                        <input id="Dimensions" name="Dimensions" type="text" required placeholder="Enter the Dimensions of the Vehicle" value="<?= $vehicle["Dimensions"] ?>">
                    </div>
                    <div>
                        <label for="Capacity">Capacity</label>
                        <input id="Capacity" name="Capacity" type="text" required placeholder="Enter the Capacity of the Vehicle" value="<?= $vehicle["Capacity"] ?>">
                    </div>
                    <div>
                        <label for="VitesseTYPE">Vitesse TYPE</label>
                        <select name="VitesseTYPE" required>
                            <option>Select the Vitesse Type of the Vehicle</option>
                            <option value="Manual" <?= $vehicle["VitesseTYPE"] == "Manual" ? "selected" : "" ?>>Manual</option>
                            <option value="Automatic" <?= $vehicle["VitesseTYPE"] == "Manual" ? "" : "selected" ?>>Automatic</option>
                        </select>
                    </div>


                    <div>
                        <label for="VehicleImage">Vehicle Image</label>
                        <div class="BrandLogoCard">
                            <img src="/Project/public/images/<?= $vehicle["ImagePath"] ?>" alt="<?= $vehicle["ImagePath"] ?>">
                        </div>
                        <input type="file" name="VehicleImage" id="BrandLogo" accept="image/*" required>
                    </div>


                </div>
                <button type="submit" name="UpdateVehicle">Update Vehicle</button>
            </form>
        </div>

<?php
    }
    public function showUpdateVehiclePage($id)
    {
        $this->showNavbar();
        $this->content($id);
        $this->showFooter();
    }
}
