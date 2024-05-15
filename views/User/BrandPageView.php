<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/LayoutView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/User/BrandsPageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Controllers/User/VehiclePageController.php');


class BrandPageView extends LayoutView
{


    public function showReviews($id)
    {
?>
        <div class="Review-Container">
            <h1>Popular Reviews</h1>
            <p>Here’s how the most-popular reviews for this Brand.</p>
            <?php
            $controller = new ReviewPageController();
            $reviews = $controller->getPopularBrandReviews($id);
            foreach ($reviews as $review) {
                $this->showReviewCard($review);
            }
            if (count($reviews) == 0) {
                echo "<p>There are no reviews for this brand</p>";
            }
            ?>
            <a href="/Project/reviews/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                </svg> View All Reviews</a>
        </div>
    <?php
    }
    public function showAddReviews($id)
    {
    ?>
        <div class="Add-Review-Container">
            <h1>Add a Review</h1>
            <p>Have you used car from this Brand? Rate it</p>
            <form id="reviewForm" action="/Project/Api/api.php" method="post">
                <input type="hidden" name="BrnadID" value="<?= $id ?>">
                <div>
                    <textarea name="review" id="review" cols="30" rows="10" placeholder="Enter your review"></textarea>
                </div>
                <div class="give-rate">
                    <label for="note">Note : </label>
                    <input type="hidden" name="note" id="note" value="0">
                    <div class="rating--star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="rating-star bi bi-star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="rating-star bi bi-star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="rating-star bi bi-star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="rating-star bi bi-star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="rating-star bi bi-star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                    </div>
                </div>
                <button type="button" id="ReviewSubmitButton">Submit</button>
            </form>
        </div>
    <?php
    }

    public function showSelectVehicule($id)
    {
    ?>
        <div class="Select-Vehicule-Container">
            <h1>Select a Vehicule</h1>
            <p>Choose a vehicule to see its specefications.</p>
            <select name="id" id="vehiculeSelect">
                <option value="">Choose a vehicule</option>
                <?php
                $controller = new BrandsPageController();
                $vehicules = $controller->getVehiculesByBrandID($id);
                foreach ($vehicules as $vehicule) {
                ?>
                    <option value="<?= $vehicule['VehicleID'] ?>"><?= $vehicule['VehiculeName'] ?> <?= $vehicule['ModelYear'] ?></option>
                <?php
                }
                ?>
            </select>
            <div id="vehicule-details-brand"></div>
        </div>
        <?php
    }

    public function showDetailsCard($data)
    {
        if ($data['title'] == "Note & Price") {
        ?>
            <div>
                <a class="collapsee">
                    <h4><?= $data['title'] ?></h4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#0071eb" class="bi bi-dash-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8" />
                    </svg>
                </a>
                <div>
                    <div>
                        <h3>Note</h3>
                        <p><?php echo $data['data']['Note'] ? $data['data']['Note'] : "0" ?> / 5 <?php $this->showStars($data['data']['Note']) ?></p>
                    </div>
                    <div>
                        <h3>Price</h3>
                        <p><?= $data['data']['IndicativePrice'] ?></p>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>

            <div>
                <a class="collapsee">
                    <h4><?= $data['title'] ?></h4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#0071eb" class="bi bi-dash-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8" />
                    </svg>
                </a>
                <div>
                    <?php
                    foreach ($data['data'] as $key => $value) {
                    ?>
                        <div>
                            <h3><?= $key ?></h3>
                            <p><?= $value ?></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
    }


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
                </div>
                <div>
                    <img src="/Project/public/images/<?= $vehicle["VehicleImage"] ?>" alt="<?= $vehicle["VehicleImage"] ?>">
                </div>
            </div>
            <div class="vehicle-details-body">
                <div class="vehicle-details-card">
                    <?php
                    $sections = [
                        "Overview" => ["BrandName", "ModelName", "Version", "ModelYear"],
                        "Note & Price" => ["Note", "IndicativePrice"],
                        "Engine Specifications" => ["EngineName", "EngineType", "Power"],
                        "Performance" => ["Acceleration", "TopSpeed"],
                        "Consumption" => ["Consumption"],
                        "Dimensions & Capacity" => ["Dimensions", "Capacity", "VitesseTYPE"],
                    ];

                    foreach ($sections as $sectionTitle => $sectionFields) {
                        $sectionData = array_intersect_key($vehicle, array_flip($sectionFields));
                        $this->showDetailsCard(['title' => $sectionTitle, 'data' => $sectionData]);
                    }
                    ?>

                </div>
            </div>
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
            <p>Here’s a list of principle Vehicules for this brand.</p>
            <div>
                <?php
                $vehicules = $controller->getVehiculesByBrandID($id);
                foreach ($vehicules as $vehicule) {
                    $this->showCard($vehicule);
                }
                if (count($vehicules) == 0) {
                    echo "<p>There are no vehicules for this brand</p>";
                }
                ?>
            </div>
        </div>
<?php
    }

    public function showBrandPage($id)
    {
        $this->showHeader();
        $this->showMenu();
        $this->showBrand($id);
        $this->showSelectVehicule($id);
        $this->showFooter();
    }
}
