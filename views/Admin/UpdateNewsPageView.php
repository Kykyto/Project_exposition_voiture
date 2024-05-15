<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LayoutView.php');
class AdminUpdateNewsPageView extends AdminLayoutView
{
    public function slider($images)
    {
?>
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <?php
                    foreach ($images as $image) {
                    ?>
                        <div class="card newsCard swiper-slide">
                            <img src="/Project/public/images/<?= $image ?>" alt="" class="card-img" data-imgsrc="<?= $image ?>">
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
    public function content($id)
    {
        $controller = new AdminNewsPageController();
        $news = $controller->getNewsByID($id);
    ?>
        <div class="NewsInfo">
            <div>
                <h3>News Details</h3>
            </div>
            <form id="updateNewsForm" action="/Project/Api/api.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="hidden" name="NewsID" id="NewsID" value="<?= $news['NewsID'] ?>">
                    <div>
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" value="<?= $news['Title'] ?>" required>
                    </div>
                    <div>
                        <label for="Content">Content</label>
                        <textarea name="Content" id="content" cols="30" rows="10" placeholder="Enter the details of the News ..." required><?= $news['Content'] ?></textarea>
                    </div>
                    <div>
                        <label for="images">Images</label>
                        <?php $this->slider($news['Images']); ?>
                        <input type="file" name="images[]" id="images" accept="image/*" multiple>
                    </div>
                    <input type="hidden" id="updatedImages" name="updatedImages" value="">


                </div>
                <button type="submit" name="updateNews">Update</button>
            </form>
        </div>

<?php
    }
    public function showNewsPage($id)
    {
        $this->showNavbar();
        $this->content($id);
        $this->showFooter();
    }
}
