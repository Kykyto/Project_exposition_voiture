<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/LayoutView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/Admin/BrandsPageController.php');
class HomePageView extends LayoutView
{
    public function showGuide()
    {
?>
        <div class="guide-section">
            <div>
                <h2>To assist you in your decision,</h2>
                <h2>discover our</h2>
                <h2>buying guides.</h2>
                <a href="/Project/guide/">See all our guides.</a>
            </div>
            <div>
                <img src="/Project/public/images/guide_photo.png" alt="guide_photo">
            </div>
        </div>
<?php
    }

    public function showHomePage()
    {
        $this->showHeader();
        $this->showDiaporama();
        $this->showMenu();
        $this->showBrands();
        $this->showCompare();
        $this->showGuide();
        $this->showPopular(0);
        $this->showFooter();
    }
}
