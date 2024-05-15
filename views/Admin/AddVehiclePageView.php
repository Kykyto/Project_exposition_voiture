<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminAddVehiclePageView extends AdminLayoutView
{

    public function content()
    {
?>
        <div class="NewsInfo">
            <div>
                <h3>Add New Vehicle</h3>
            </div>
            <form id="AddVehicleForm" action="/Project/Api/api.php" method="post" enctype="multipart/form-data">
                <div>
                    <div>
                        <label for="BrandID">Brand Name</label>
                        <select name="BrandID" required>
                            <option>Select the Brand of the Vehicle</option>
                            <?php
                            $controller = new AdminBrandsPageController();
                            $brands = $controller->getBrands();
                            foreach ($brands as $brand) {
                                echo "<option value='" . $brand['BrandID'] . "'>" . $brand['Brand'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="ModelName">Model Name</label>
                        <input id="ModelName" name="ModelName" type="text" required placeholder="Enter the Model Name of the Vehicle">
                    </div>
                    <div>
                        <label for="Version">Version</label>
                        <input id="Version" name="Version" type="text" required placeholder="Enter the Version of the Vehicle">
                    </div>
                    <div>
                        <label for="ModelYear">Year</label>
                        <input id="ModelYear" name="ModelYear" type="number" required placeholder="Enter the Year of the Vehicle">
                    </div>
                    <div>
                        <label for="IndicativePrice">Price</label>
                        <input id="IndicativePrice" name="IndicativePrice" type="text" required placeholder="Enter the Price of the Vehicle">
                    </div>
                    <div>
                        <label for="EngineName">Engine Name</label>
                        <input id="EngineName" name="EngineName" type="text" required placeholder="Enter the Engine Name of the Vehicle">
                    </div>
                    <div>
                        <label for="EnginType">Engine Type</label>
                        <input id="EnginType" name="EnginType" type="text" required placeholder="Enter the Engin Type of the Vehicle">
                    </div>
                    <div>
                        <label for="Power">Power</label>
                        <input id="Power" name="Power" type="text" required placeholder="Enter the Power of the Vehicle">
                    </div>
                    <div>
                        <label for="Acceleration">Acceleration</label>
                        <input id="Acceleration" name="Acceleration" type="text" required placeholder="Enter the Acceleration of the Vehicle">
                    </div>
                    <div>
                        <label for="TopSpeed">Top Speed</label>
                        <input id="TopSpeed" name="TopSpeed" type="text" required placeholder="Enter the Top Speed of the Vehicle">
                    </div>
                    <div>
                        <label for="Consumption">Consumption</label>
                        <input id="Consumption" name="Consumption" type="text" required placeholder="Enter the Consumption of the Vehicle">
                    </div>
                    <div>
                        <label for="Dimensions">Dimensions</label>
                        <input id="Dimensions" name="Dimensions" type="text" required placeholder="Enter the Dimensions of the Vehicle">
                    </div>
                    <div>
                        <label for="Capacity">Capacity</label>
                        <input id="Capacity" name="Capacity" type="text" required placeholder="Enter the Capacity of the Vehicle">
                    </div>
                    <div>
                        <label for="VitesseTYPE">Vitesse TYPE</label>
                        <select name="VitesseTYPE" required>
                            <option>Select the Vitesse Type of the Vehicle</option>
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                        </select>
                    </div>


                    <div>
                        <label for="VehicleImage">Vehicle Image</label>
                        <div class="BrandLogoCard">
                        </div>
                        <input type="file" name="VehicleImage" id="BrandLogo" accept="image/*" required>
                    </div>


                </div>
                <button type="submit" name="AddVehicle">Add Vehicle</button>
            </form>
        </div>

<?php
    }
    public function showAddVehiclePage()
    {
        $this->showNavbar();
        $this->content();
        $this->showFooter();
    }
}
