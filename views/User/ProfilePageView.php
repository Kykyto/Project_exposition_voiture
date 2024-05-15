<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/LayoutView.php');

class ProfilePageView extends LayoutView
{

    public function modifyUser($id)
    {
        $controller = new AdminUsersPageController();
        $user = $controller->getUserById($id);
?>
        <div class="userInfo">
            <div>
                <h3>User informations</h3>
            </div>
            <form action="/Project/Api/api.php" method="post">
                <div>
                    <input type="hidden" name="UserID" value="<?= $user['UserID'] ?>">
                    <div>
                        <label for="Username">Username</label>
                        <input id="Username" name="username" type="text" value="<?= $user['username'] ?>" required>
                    </div>
                    <div>
                        <label for="Firstname">Firstname</label>
                        <input id="Firstname" name="FirstName" type="text" value="<?= $user['FirstName'] ?>" required>
                    </div>
                    <div>
                        <label for="Lastname">Lastname</label>
                        <input id="Lastname" name="LastName" type="text" value="<?= $user['LastName'] ?>" required>
                    </div>
                    <div>
                        <label for="Gender">Gender</label>
                        <select id="Gender" name="Gender" required>
                            <option value="Male" <?= $user['Gender'] == 'Male' ? "selected" : "" ?>>Male</option>
                            <option value="Female" <?= $user['Gender'] == 'Female' ? "selected" : "" ?>>Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="DateOfBirth">Date Of Birth</label>
                        <input id="DateOfBirth" name="DateOfBirth" type="date" value="<?= $user['DateOfBirth'] ?>" required>
                    </div>
                    <div>
                        <label for="Email">Email</label>
                        <input id="Email" name="Email" type="email" value="<?= $user['Email'] ?>" required>
                    </div>
                </div>
                <button type="submit" name="updateUser">Update</button>
            </form>
        </div>

    <?php
    }
    public function showVehCard($vehicule)
    {
    ?>

        <div class="Brand-VehicleCard" data-vehicleID="<?= $vehicule['VehicleID'] ?>">
            <div>
                <img src="/Project/public/images/<?= $vehicule['ImagePath'] ?>" alt="<?= $vehicule['ImagePath'] ?>">
            </div>
            <div>
                <h1><?= $vehicule['VehiculeName'] ?> <?= $vehicule['ModelYear'] ?></h1>
                <h4><?= $vehicule['IndicativePrice'] ?> <span>Starting Price</span></h4>
                <p><span>Rating :</span> <?php $this->showStars($vehicule['Note']) ?></p>
            </div>
            <div class="delete-favorite-logo" data-vehicleID="<?= $vehicule['VehicleID'] ?>" data-userID="<?= $_SESSION['UserID'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                </svg>
            </div>

            <a id="cardDetails" href="/Project/vehicle/?id=<?= $vehicule['VehicleID'] ?>">
                View Details
            </a>

        </div>
    <?php
    }
    public function showFavorite()
    {
        $controller = new ProfilePageController();
        $favorites = $controller->getFavorite();
    ?>
        <div class="userInfo">
            <div>
                <h3>Favorites</h3>
            </div>
            <div class="favorite-container">
                <?php
                foreach ($favorites as $favorite) {
                    $this->showVehCard($favorite);
                }
                if (count($favorites) == 0) {
                    echo "<p>There are no favorite vehicles for this profile</p>";
                }
                ?>
            </div>
        </div>
    <?php
    }
    public function showReviewCardProfile($review)
    {
    ?>
        <div class="Review-Card">
            <div>
                <div><?= strtoupper($review['UserName'][0]); ?></div>
                <div>
                    <div><?= $review['UserName']; ?></div>
                    <div>
                        <div><?php $this->showStars($review['Rating']) ?></div>
                        <span><?= date('jS M Y', strtotime($review['Date'])) ?></span>
                    </div>
                </div>
            </div>
            <div style="display: flex; align-items:center;justify-content:space-between;">
                <div style="flex: 1 1 0%;">
                    <?= $review['Comment']; ?>
                </div>
                <a href="<?php echo $review['BrandID'] ? "/Project/brand/?id=" . $review['BrandID'] : "/Project/vehicle/?id=" . $review['VehicleID'] ?>">
                    Link
                </a>
            </div>
        </div>
    <?php
    }
    public function showReviews($id)
    {
        $controller = new ProfilePageController();
        $reviews = $controller->getReviews($id);
    ?>
        <div class="profile-reviews">
            <div>
                <h3>User Notaions</h3>
            </div>
            <div class="reviews-container">
                <?php
                foreach ($reviews as $review) {
                    $this->showReviewCardProfile($review);
                }
                if (count($reviews) == 0) {
                    echo "<p>There are no reviews for this profile</p>";
                }
                ?>
            </div>
        </div>
<?php
    }


    public function showProfilePage()
    {
        $this->showHeader();
        $this->showMenu();
        $this->modifyUser($_SESSION['UserID']);
        $this->showFavorite();
        $this->showReviews($_SESSION['UserID']);
        $this->showFooter();
    }
}
