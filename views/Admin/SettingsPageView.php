<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminSettingsPageView extends AdminLayoutView
{
    public function showSocialManagement()
    {
?>
        <div class="social-media">
            <?php
            $this->showContactSocialMedia();
            ?>
        </div>
        <form id="AddSocialMediaForm" style="margin-bottom: 50px;">
            <div>
                <div>
                    <label for="type">Type</label>
                    <input id="type" name="type" type="text" required placeholder="Enter the type of the Social Media">
                </div>
                <div>
                    <label for="url">URL</label>
                    <input id="url" name="url" type="text" required placeholder="Enter the URL of the Social Media">
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" accept="image/*" required>
                </div>

            </div>
            <button type="submit" name="AddSocialMedia">Add Social Media</button>
        </form>
        <?php
    }
    public function showContactSocialMedia()
    {
        $controller = new HomePageController();
        $socialMedia = $controller->getSocialMedia();
        foreach ($socialMedia as $media) {
        ?>
            <div class="media-container">
                <a href="<?php echo $media["URL"] ?>">
                    <img src="/Project/public/images/<?php echo $media["ImagePath"] ?>" alt="<?php echo $media["Type"] ?>">
                </a>
                <div>
                    <h3><?php echo $media["Type"] ?></h3>
                </div>
                <h5 class="delete-media" style="color: red;margin-top: -10px;cursor: pointer;">Delete</h5>
                <input type="hidden" name="mediaID" value="<?php echo $media["ContactID"] ?>">
                <input type="hidden" name="ImageID" value="<?php echo $media["ImageID"] ?>">
            </div>
        <?php
        }
    }
    public function showDiapoImages()
    {
        $controller = new HomePageController();
        $diaporamas = $controller->getDiaporama();
        ?>
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <?php
                    foreach ($diaporamas as $diapo) {
                    ?>
                        <div id="slide<?= $diapo["SlideshowImageURL"] ?>" class="card swiper-slide">
                            <img src="/Project/public/images/<?= $diapo["SlideshowImagePath"] ?>" alt="" class="card-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="deleteSlide bi bi-x-circle-fill" viewBox="0 0 16 16" data-slide-id="<?= $diapo["SlideshowImageURL"] ?>" data-slide-path="<?= $diapo["SlideshowImagePath"] ?>">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                            </svg>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    <?php
    }
    public function manageDiaporama()
    {
    ?>
        <div class="NewsInfo">
            <div class="Handler">
                <h3>Diaporama Management</h3>
            </div>
            <?php
            $this->showDiapoImages();
            ?>
            <form id="AddDiapo" style="margin-bottom: 50px;" action="/Project/Api/api.php" method="post" enctype="multipart/form-data">
                <div>
                    <div>
                        <select name="SlideType" id="SlideType">
                            <option>Choose the type of the slide</option>
                            <option value="Ad">Ad</option>
                            <option value="News">News</option>
                        </select>
                    </div>
                    <div id="SlideNews" style="display: none;">
                        <select name="NewsID" id="News">
                            <option value="pub">Choose News to display</option>
                            <?php
                            require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/Admin/BrandsPageController.php');
                            $controller = new AdminNewsPageController();
                            $news = $controller->getNews();
                            foreach ($news as $new) {
                            ?>
                                <option value="<?= $new['NewsID'] ?>"><?= $new['Title'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div id="SlideAd" style="display: none;">
                        <div>
                            <label for="Slideurl">URL</label>
                            <input type="text" name="Slideurl" id="Slideurl" placeholder="Enter the URL of the slide">
                        </div>
                        <div>
                            <label for="Slideimage">Image</label>
                            <input type="file" name="Slideimage" id="Slideimage" accept="image/*">
                        </div>
                    </div>
                    <input type="hidden" name="AddNewSlide" value="1">


                </div>

                <button type="submit" name="AddDiapo">Add Diaporama</button>
            </form>


        </div>

    <?php
    }
    public function manageSocial()
    {
    ?>
        <div class="NewsInfo">
            <div class="Handler">
                <h3>Social Media Management</h3>
            </div>
            <?php
            $this->showSocialManagement();
            ?>


        </div>

    <?php
    }
    public function manageGuide()
    {
    ?>
        <div class="NewsInfo">
            <div class="Handler">
                <h3>Guide Management</h3>
                <a href="/Project/Admin/guide/">Go to Page</a>
            </div>


        </div>

<?php
    }
    public function showSettingsPage()
    {
        $this->showNavbar();
        $this->manageSocial();
        $this->manageDiaporama();
        $this->manageGuide();
        $this->showFooter();
    }
}
