<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/LayoutView.php');

class ReviewBrandPageView extends LayoutView
{

    public function showReviewList($reviews)
    {
        foreach ($reviews as $review) {
            $this->showReviewCard($review);
        }
    }

    public function showReview($id)
    {
?>
        <div class="Review-details">
            <h1>Reviews</h1>
            <p>Here’s a list of reviews given for this brand.</p>
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
    public function showReviewBrandCard($vehicule)
    {
    ?>

        <div class="Brand-VehicleCard">
            <div>
                <img src="/Project/public/images/<?= $vehicule['ImagePath'] ?>" alt="<?= $vehicule['ImagePath'] ?>">
            </div>
            <div>
                <h1><?= $vehicule['VehiculeName'] ?> <?= $vehicule['ModelYear'] ?></h1>
                <h4><?= $vehicule['IndicativePrice'] ?> <span>Starting Price</span></h4>
                <p><span>Rating :</span> <?php $this->showStars($vehicule['Note']) ?></p>
            </div>
            <?php
            if (isset($_SESSION['UserID'])) {
            ?>
                <div class="favorite-logo" data-favorite="<?= $vehicule['favorite'] ?>" data-vehicleID="<?= $vehicule['VehicleID'] ?>" data-userID="<?= $_SESSION['UserID'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="heart-icon bi bi-heart-fill <?= $vehicule['favorite'] ? "show" : "not-show" ?>" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="heart-icon bi bi-heart <?= $vehicule['favorite'] ? "not-show" : "show" ?>" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                    </svg>
                </div>
            <?php

            }
            ?>


            <a href="/Project/review/?id=<?= $vehicule['VehicleID'] ?>">
                View Reviews
            </a>

        </div>
    <?php
    }
    public function showBrand($id)
    {
        $controller = new BrandsPageController();
        $brand = $controller->getBrandByID($id);
    ?>
        <div class="brands-details">
            <div class="brands-header">
                <div>
                    <h1><?= $brand['BrandName'] ?></h1>
                    <div>
                        <p>Country Of Origin</p>
                        <h4><?= $brand['CountryOfOrigin'] ?></h4>
                    </div>
                    <div>
                        <p>Siege Social</p>
                        <h4><?= $brand['Siegesocial'] ?></h4>
                    </div>
                    <div>
                        <p>Year Of Establishment</p>
                        <h4><?= $brand['YearOfEstablishment'] ?></h4>
                    </div>
                </div>
                <div>
                    <img src="/Project/public/images/<?= $brand['ImagePath'] ?>" alt="<?= $brand['ImagePath'] ?>">
                </div>
            </div>

        </div>
        <div class="Brand-details">
            <h1>Vehicules</h1>
            <p>Here’s a list of Vehicules for this brand.</p>
            <div>
                <?php
                $vehicules = $controller->getVehiculesByBrandID($id);
                foreach ($vehicules as $vehicule) {
                    $this->showReviewBrandCard($vehicule);
                }
                ?>
            </div>
        </div>
<?php
    }

    public function showReviewBrandPage($id)
    {
        $this->showHeader();
        $this->showMenu();
        $this->showBrand($id);
        $this->showReview($id);
        $this->showFooter();
    }
}
