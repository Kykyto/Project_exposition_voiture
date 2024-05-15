<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/LayoutView.php');

class NewsPageView extends LayoutView
{

    public function showNewsCard($newsItem)
    {
        $shortenedTitle = strlen($newsItem['Title']) > 30 ? substr($newsItem['Title'], 0, 30) . '...' : $newsItem['Title'];
        $shortenedContent = strlen($newsItem['Content']) > 110 ? substr($newsItem['Content'], 0, 110) . '...' : $newsItem['Content'];
        $shortenedContent = str_pad($shortenedContent, 110, ' ', STR_PAD_RIGHT);
?>
        <a href="/Project/news/detail/?id=<?= $newsItem['NewsID'] ?>" class="news-card">
            <div>
                <img src="/Project/public/images/<?= $newsItem['ImagePath'] ?>" alt="<?= $newsItem['ImagePath'] ?>">
            </div>
            <div>

                <h1><?= $shortenedTitle ?></h1>
                <p><?= $shortenedContent ?></p>
                <h3>Published · <?= date('jS M Y', strtotime($newsItem['Date'])) ?></h3>
            </div>
        </a>
    <?php
    }

    public function showNews()
    {
        $offset = 0;
        $limit = 12;
    ?>
        <div class="news">
            <h1>Vehicle News</h1>
            <div id="news-container">
                <?php
                $controller = new NewsPageController();
                $newsData = $controller->getNews($offset, $limit);

                foreach ($newsData as $newsItem) {
                    $this->showNewsCard($newsItem);
                }
                ?>
            </div>
            <?php
            $nombre = $controller->getNombreNews();
            if ($nombre["NumberOfNews"] > $limit) {
                echo '<button id="load-more-btn">Load More</button>';
            }
            ?>
        </div>
<?php

    }

    public function showNewsPage()
    {
        $this->showHeader();
        $this->showMenu();
        $this->showNews();
        $this->showFooter();
    }
}
