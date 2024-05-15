<?php
class AdminLayoutView
{

    public function showNavbar()
    {
?>
        <div class="header-container">
            <a href="/Project/Admin/" class="logo">
                <img src="/Project/public/images/logo1.png" alt="">
                <h2>AutoVS</h2>
            </a>
            <div class="Profile">
                <a href="/Project/profile/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </a>
                <a class="logout" href="/Project/Api/api.php?logout=1">
                    <p>Logout</p>
                    <img src="/Project/public/images/logout.png" alt="logout">
                </a>
            </div>
        </div>
    <?php
    }
    public function slider($images)
    {
    ?>
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <?php
                    foreach ($images as $image) {
                    ?>
                        <div class="card swiper-slide">
                            <img src="/Project/public/images/<?= $image ?>" alt="" class="card-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
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
    public function showFooter()
    {
    ?>
        <div class="footer-menu">
            <ul>
                <li><a href="/Project/">Home</a></li>
                <li><a href="/Project/news/">News</a></li>
                <li><a href="/Project/compare/">Comparator</a></li>
                <li><a href="/Project/brands/">Brands</a></li>
                <li><a href="/Project/guide/">Guides</a></li>
                <li><a href="/Project/contact/">Contact</a></li>
            </ul>
            <div class="social">
                <?php
                $this->showSocialMedia();
                ?>

            </div>

            <p>© 2023 AutoVS. All rights reserved.</p>
        </div>

        <?php
    }
    public function showSocialMedia()
    {
        $controller = new HomePageController();
        $socialMedia = $controller->getSocialMedia();
        foreach ($socialMedia as $media) {
        ?>
            <a href="<?php echo $media["URL"] ?>">
                <img src="/Project/public/images/<?php echo $media["ImagePath"] ?>" alt="<?php echo $media["Type"] ?>">
            </a>
<?php
        }
    }
}
