<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminUpdateBrandPageView extends AdminLayoutView
{

    public function content($id)
    {
        $controller = new BrandsPageController();
        $brand = $controller->getBrandByID($id);
?>
        <div class="NewsInfo">
            <div>
                <h3>Update Brand</h3>
            </div>
            <form id="UpdateBrandForm" action="/Project/Api/api.php" method="post" enctype="multipart/form-data">
                <div>
                    <div>
                        <label for="Name">Brand Name</label>
                        <input id="Name" name="Name" type="text" required placeholder="Enter the Name of the Brand" value="<?= $brand["BrandName"] ?>">
                    </div>
                    <div>
                        <label for="CountryOfOrigin">Country Of Origin</label>
                        <input id="CountryOfOrigin" name="CountryOfOrigin" type="text" required placeholder="Enter the Country Of Origin of the Brand" value="<?= $brand["CountryOfOrigin"] ?>">
                    </div>
                    <div>
                        <label for="Siegesocial">Head Office</label>
                        <input id="Siegesocial" name="Siegesocial" type="text" required placeholder="Enter the Head Office of the Brand" value="<?= $brand["Siegesocial"] ?>">
                    </div>

                    <div>
                        <label for="YearOfEstablishment">Year Of Establishment</label>
                        <input id="YearOfEstablishment" name="YearOfEstablishment" type="number" required placeholder="Enter the Year Of Establishment of the Brand" value="<?= $brand["YearOfEstablishment"] ?>">
                    </div>

                    <div>
                        <label for="images">Logo</label>
                        <div class="BrandLogoCard">
                            <img style="width: 200px; margin: 30px 0;" src="/Project/public/images/<?= $brand["ImagePath"] ?>" alt="<?= $brand["ImagePath"] ?>">
                        </div>
                        <input type="file" name="BrandLogo" id="BrandLogo" accept="image/*">
                    </div>
                    <input type="hidden" name="BrandID" value="<?= $id ?>">
                    <input type="hidden" name="ImageID" value="<?= $brand["ImageID"] ?>">
                    <input type="hidden" name="ImagePath" value="<?= $brand["ImagePath"] ?>">


                </div>
                <button type="submit" name="UpdateBrand">Update Brand</button>
            </form>
        </div>

<?php
    }
    public function showUpdateBrandPage($id)
    {
        $this->showNavbar();
        $this->content($id);
        $this->showFooter();
    }
}
