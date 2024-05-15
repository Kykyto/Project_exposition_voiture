<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/LayoutView.php');

class BrandsPageView extends LayoutView
{

    public function showBrand()
    {
?>
        <div class="brandPage">
            <div class="Brands">
                <h1>Brands</h1>
                <div class="spinner">
                    <ul class="spinner-content">
                        <?php
                        $controller = new AdminBrandsPageController();
                        $brands = $controller->getBrands();
                        foreach ($brands as $brand) {
                        ?>
                            <li><a href="/Project/brand/?id=<?php echo $brand['BrandID'] ?>"><img src="/Project/public/images/<?php echo $brand['ImagePath'] ?>" alt="Brand<?php echo $brand['BrandID'] ?>"></a></li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
<?php

    }

    public function showBrandsPage()
    {
        $this->showHeader();
        $this->showMenu();
        $this->showBrand();
        $this->showFooter();
    }
}
