<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/LayoutView.php');

class GuidePageView extends LayoutView
{

    public function showGuideCard($guideItem)
    {
        $shortenedTitle = strlen($guideItem['Title']) > 30 ? substr($guideItem['Title'], 0, 30) . '...' : $guideItem['Title'];
        $shortenedContent = strlen($guideItem['Description']) > 110 ? substr($guideItem['Description'], 0, 110) . '...' : $guideItem['Description'];
        $shortenedContent = str_pad($shortenedContent, 110, ' ', STR_PAD_RIGHT);
?>
        <a href="/Project/guide/detail/?id=<?= $guideItem['GuideSettingID'] ?>" class="news-card">
            <div>
                <img src="/Project/public/images/<?= $guideItem['ImagePath'] ?>" alt="<?= $guideItem['ImagePath'] ?>">
            </div>
            <div>

                <h1><?= $shortenedTitle ?></h1>
                <p><?= $shortenedContent ?></p>
                <h3>Published · <?= date('jS M Y', strtotime($guideItem['Date'])) ?></h3>
            </div>
        </a>
    <?php
    }

    public function showGuides()
    {
        $offset = 0;
        $limit = 12;
    ?>
        <div class="news">
            <h1>Buying Guides</h1>
            <div id="news-container">
                <?php
                $controller = new GuidePageController();
                $guideData = $controller->getGuides($offset, $limit);
                foreach ($guideData as $guide) {
                    $this->showGuideCard($guide);
                }
                ?>
            </div>
            <?php
            $nombre = $controller->getNombreGuides();
            if ($nombre["NumberOfGuides"] > $limit) {
                echo '<button id="load-moreguides-btn">Load More</button>';
            }
            ?>
        </div>
<?php

    }

    public function showGuidePage()
    {
        $this->showHeader();
        $this->showMenu();
        $this->showGuides();
        $this->showFooter();
    }
}
