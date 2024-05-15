<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/LayoutView.php');

class ReviewPageView extends LayoutView
{
    public function showVehicleDetails($id)
    {

        $controller = new VehiclePageController();
        $vehicle = $controller->getVehicleByID($id);
?>
        <div class="vehicle-details">
            <div class="vehicle-details-head">
                <div>
                    <div>
                        <div>
                            <img src="/Project/public/images/<?= $vehicle["Logo"] ?>" alt="<?= $vehicle["Logo"] ?>">
                        </div>
                        <h1><?= $vehicle["VehiculeName"] ?></h1>
                    </div>
                    <div>
                        Starts at <h2><?= $vehicle["IndicativePrice"] ?></h2>
                    </div>
                    <a id="showDetailsButton" href="/Project/vehicle/?id=<?= $id ?>">Show Details</a>
                </div>
                <div>
                    <img src="/Project/public/images/<?= $vehicle["VehicleImage"] ?>" alt="<?= $vehicle["VehicleImage"] ?>">
                </div>
            </div>
        </div>
    <?php
    }

    public function showReviewList($reviews)
    {
        foreach ($reviews as $review) {
            $this->showReviewCard($review);
        }
    }

    public function showReview()
    {
    ?>
        <div class="Review-details">
            <h1>Reviews</h1>
            <p>Here’s a list of reviews given for this car.</p>
            <div id="reviews-list">
                <p>There are no reviews for this brand.</p>
            </div>
            <nav>
                <ul id="pagination" class="pagination justify-content-center">

                </ul>
            </nav>
        </div>
<?php

    }

    public function showReviewPage($id)
    {
        $this->showHeader();
        $this->showMenu();
        $this->showVehicleDetails($id);
        $this->showReview();
        $this->showFooter();
    }
}
