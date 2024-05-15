<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminHomePageView extends AdminLayoutView
{
    public function content()
    {
?>
        <div class="category">
            <div class="cont">

                <div class="cat">
                    <a href="/Project/Admin/users/">

                        <img src="/Project/public/images/admin.jpg" alt="" height="100%" width="100%" style="object-fit:cover">
                        <h1 class="centered">Users</h1>

                    </a>
                </div>
                <div class="cat">
                    <a href="/Project/Admin/brands/">

                        <img src="/Project/public/images/cars.jpg" alt="" height="100%" width="100%" style="object-fit:cover">
                        <h1 class="centered">Brands & Cars</h1>

                    </a>
                </div>


                <div class="cat">
                    <a href="/Project/Admin/news/">

                        <img src="/Project/public/images/news.jpg" alt="" height="100%" width="100%" style="object-fit:cover">
                        <h1 class="centered">News</h1>

                    </a>
                </div>
                <div class="cat cat5">
                    <a href="/Project/Admin/settings/">
                        <img src="/Project/public/images/settings.jpg" alt="" height="100%" width="100%" style="object-fit:cover">
                        <h1 class="centered">Settings</h1>

                    </a>
                </div>
            </div>
        </div>
<?php
    }
    public function showHomePage()
    {
        $this->showNavbar();
        $this->content();
        $this->showFooter();
    }
}
