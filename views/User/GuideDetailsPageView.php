<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/LayoutView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/User/GuidePageController.php');

class GuideDetailsPageView extends LayoutView
{


    public function showGuideDetails($id)
    {
        $controller = new GuidePageController();
        $guide = $controller->getGuideByID($id);


?>
        <div class="news-details">
            <div class="news-header">
                <div>
                    <h1><?= $guide['Title'] ?></h1>
                    <p>Published · <?= date('jS M Y', strtotime($guide['Date'])) ?></p>
                </div>
                <div>
                    <img src="/Project/public/images/<?= $guide['ImagePath'] ?>" alt="<?= $guide['ImagePath'] ?>">
                </div>
            </div>
            <?php
            ?>
            <p>
                <?= $guide['Description'] ?>
            </p>
        </div>
<?php
    }

    public function showGuideDetailsPage($id)
    {
        $this->showHeader();
        $this->showMenu();
        $this->showGuideDetails($id);
        $this->showFooter();
    }
}

?>