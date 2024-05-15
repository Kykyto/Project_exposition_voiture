<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/LayoutView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/User/NewsPageController.php');

class NewsDetailsPageView extends LayoutView
{


    public function showNewsDetails($id)
    {
        $controller = new NewsPageController();
        $news = $controller->getNewsByID($id);

        $images = array_map(function ($imagePath) {
            return [
                'SlideshowLinkURL' => '#',
                'SlideshowImagePath' => $imagePath,
            ];
        }, $news['Images']);

?>
        <div class="news-details">
            <div class="news-header">
                <div>
                    <h1><?= $news['Title'] ?></h1>
                    <p>Published · <?= date('jS M Y', strtotime($news['Date'])) ?></p>
                </div>
                <div>
                    <?php
                    $this->showNewsDiaporama($news['Images']);
                    ?>
                    <p>
                        <!-- <img src="/Project/public/images/<?= $news['Images'][0] ?>" alt="<?= $news['Images'][0] ?>"> -->
                </div>
            </div>
            <p>
                <?= $news['Content'] ?>
            </p>

            </p>
        </div>
    <?php
    }
    public function showNewsDiaporama($diaporama)
    {
    ?>
        <div id="carouselAuto" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner ">
                <?php


                $i = 0;
                foreach ($diaporama as $slide) {
                    if ($i == 0) {
                ?>
                        <img src="/Project/public/images/<?php echo $slide ?>" class="d-block w-100" alt="<?php echo $slide ?>">
                    <?php
                    } else {
                    ?>
                        <img src="/Project/public/images/<?php echo $slide ?>" class="d-block w-100" alt="<?php echo $slide ?>">
                <?php
                    }
                    $i = $i + 1;
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAuto" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselAuto" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
<?php
    }

    public function showNewsDetailsPage($id)
    {
        $this->showHeader();
        $this->showMenu();
        $this->showNewsDetails($id);
        $this->showFooter();
    }
}

?>