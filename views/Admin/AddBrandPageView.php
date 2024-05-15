<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminAddBrandPageView extends AdminLayoutView
{

    public function content()
    {
?>
        <div class="NewsInfo">
            <div>
                <h3>Add New Brand</h3>
            </div>
            <form id="AddBrandForm" action="/Project/Api/api.php" method="post" enctype="multipart/form-data">
                <div>
                    <div>
                        <label for="Name">Brand Name</label>
                        <input id="Name" name="Name" type="text" required placeholder="Enter the Name of the Brand">
                    </div>
                    <div>
                        <label for="CountryOfOrigin">Country Of Origin</label>
                        <input id="CountryOfOrigin" name="CountryOfOrigin" type="text" required placeholder="Enter the Country Of Origin of the Brand">
                    </div>
                    <div>
                        <label for="Siegesocial">Head Office</label>
                        <input id="Siegesocial" name="Siegesocial" type="text" required placeholder="Enter the Head Office of the Brand">
                    </div>

                    <div>
                        <label for="YearOfEstablishment">Year Of Establishment</label>
                        <input id="YearOfEstablishment" name="YearOfEstablishment" type="number" required placeholder="Enter the Year Of Establishment of the Brand">
                    </div>

                    <div>
                        <label for="images">Logo</label>
                        <div class="BrandLogoCard">
                        </div>
                        <input type="file" name="logo" id="BrandLogo" accept="image/*" required>
                    </div>
                    <div>
                        <label for="AddVehicle">Add Vehicles</label>
                        <input type="checkbox" id="AddVehicle" name="AddVehicle">
                        <span>Check this box if you want to add vehicles to the brand</span>
                    </div>


                </div>
                <button type="submit" name="AddBrand" id="AddBrand">Add Brand</button>
            </form>
        </div>

<?php
    }
    public function showAddBrandPage()
    {
        $this->showNavbar();
        $this->content();
        $this->showFooter();
    }
}
