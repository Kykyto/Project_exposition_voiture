<?php
require_once("../controllers/Admin/LoginPageController.php");
require_once("../controllers/Admin/BrandsPageController.php");
require_once("../controllers/Admin/HomePageController.php");
require_once("../controllers/Admin/ReviewPageController.php");
require_once("../controllers/Admin/UsersPageController.php");
require_once("../controllers/Admin/NewsPageController.php");
require_once("../controllers/Admin/GuidePageController.php");
require_once("../controllers/Admin/SettingsPageController.php");
require_once("../controllers/User/NewsPageController.php");
require_once("../controllers/User/GuidePageController.php");
require_once("../controllers/User/ReviewPageController.php");
require_once("../controllers/User/BrandsPageController.php");

if (isset($_POST['login'])) {
    $controller = new AdminLoginPageController();
    $controller->handleLogin();
}

if (isset($_POST['signup'])) {
    $controller = new AdminLoginPageController();
    $controller->handleSignup();
}

if (isset($_GET['logout'])) {
    $controller = new AdminLoginPageController();
    $controller->handleLogout();
}


if (isset($_POST['brandID'])) {
    $controller = new AdminBrandsPageController();
    $models = $controller->getModelsByBrand($_POST['brandID']);
    echo json_encode($models);
}
if (isset($_POST['modelID'])) {
    $controller = new AdminBrandsPageController();
    $years = $controller->getYearsByModel($_POST['modelID']);
    echo json_encode($years);
}
if (isset($_GET['modelID']) && isset($_GET['year'])) {
    $controller = new AdminBrandsPageController();
    $versions = $controller->getVersionByModel($_GET['modelID']);
    echo json_encode($versions);
}


if (isset($_GET['offset']) && isset($_GET['limit'])) {
    $controller = new NewsPageController();
    $news = $controller->getNews($_GET['offset'], $_GET['limit']);
    echo json_encode($news);
}

if (isset($_GET['guide']) && isset($_GET['offset']) && isset($_GET['limit'])) {
    $controller = new GuidePageController();
    $guides = $controller->getGuides($_GET['offset'], $_GET['limit']);
    echo json_encode($guides);
}


if (isset($_GET['getNews'])) {
    $controller = new NewsPageController();
    $news = $controller->getNombreNews();
    echo json_encode($news);
}

if (isset($_GET['getGuides'])) {
    $controller = new GuidePageController();
    $guides = $controller->getNombreGuides();
    echo json_encode($guides);
}

if (isset($_GET['getReviewsbyID'])) {
    $controller = new ReviewPageController();
    $reviews = $controller->getNombreReviewsByID($_GET['getReviewsbyID']);
    echo json_encode($reviews);
}

if (isset($_GET['getReviewsBrandbyID'])) {
    $controller = new ReviewPageController();
    $reviews = $controller->getNombreReviewsBrandByID($_GET['getReviewsBrandbyID']);
    echo json_encode($reviews);
}

if (isset($_GET['id']) && isset($_GET['showReviewPage'])) {
    $controller = new ReviewPageController();
    echo $controller->getVehicleReviews($_GET['id'], $_GET['showReviewPage']);
}

if (isset($_GET['id']) && isset($_GET['showReviewBrandPage'])) {
    $controller = new ReviewPageController();
    echo $controller->getBrandReviews($_GET['id'], $_GET['showReviewBrandPage']);
}


if (isset($_POST['note']) && isset($_POST['review']) && isset($_POST['VehicleID'])) {
    session_start();
    if (isset($_SESSION['UserID'])) {
        $controller = new ReviewPageController();
        $controller->AddReview();
    } else {
        echo json_encode("You need to be logged in to post a review");
    }
}

if (isset($_POST['note']) && isset($_POST['review']) && isset($_POST['BrnadID'])) {
    session_start();
    if (isset($_SESSION['UserID'])) {
        $controller = new ReviewPageController();
        $controller->AddBrnadReview();
    } else {
        echo json_encode("You need to be logged in to post a review");
    }
}

if (isset($_POST['updateUser'])) {
    $controller = new AdminUsersPageController();
    $controller->modifyUser();
}

if (isset($_GET['toggleUser'])) {
    $controller = new AdminUsersPageController();
    $controller->toggleUser();
}

if (isset($_POST['blockUser'])) {
    $controller = new AdminUsersPageController();
    $controller->blockUser();
}

if (isset($_POST['updateReview'])) {
    $controller = new AdminReviewPageController();
    $controller->updateReview();
}

if (isset($_POST['deleteReview'])) {
    $controller = new AdminReviewPageController();
    $controller->deleteReview();
}

if (isset($_POST['deleteUser'])) {
    $controller = new AdminUsersPageController();
    $controller->deleteUser();
}

if (isset($_POST['deletMedia'])) {
    $controller = new AdminSettingsPageController();
    $controller->deletMedia();
}

if (isset($_POST['AddNewSlide'])) {
    $controller = new AdminSettingsPageController();
    $controller->AddNewSlide();
}

if (isset($_POST['deleteSlide'])) {
    $controller = new AdminSettingsPageController();
    $controller->deleteSlide();
}

if (isset($_POST['deleteNewsImage'])) {
    $controller = new AdminNewsPageController();
    $controller->deleteImage();
}

if (isset($_POST['AddGuide'])) {
    $controller = new AdminGuidePageController();
    $controller->AddGuide();
}

if (isset($_POST['updateGuide'])) {
    $controller = new AdminGuidePageController();
    $controller->updateGuide();
}

if (isset($_POST['deleteGuide'])) {
    $controller = new AdminGuidePageController();
    $controller->deleteGuide();
}

if (isset($_POST['comparison'])) {
    $controller = new AdminHomePageController();
    $controller->handleCompare();
}

if (isset($_POST['updatedImages'])) {
    $controller = new AdminNewsPageController();
    $controller->updateNews();
}

if (isset($_POST['AddNews'])) {
    $controller = new AdminNewsPageController();
    $controller->AddNews();
}

if (isset($_POST['AddBrand'])) {
    $controller = new AdminBrandsPageController();
    $controller->AddBrand();
}

if (isset($_POST['UpdateBrand'])) {
    $controller = new AdminBrandsPageController();
    $controller->UpdateBrand();
}

if (isset($_POST['AddVehicle'])) {
    $controller = new AdminBrandsPageController();
    $controller->AddVehicle();
}

if (isset($_POST['UpdateVehicle'])) {
    $controller = new AdminBrandsPageController();
    $controller->UpdateVehicle();
}

if (isset($_POST['deleteNews'])) {
    $controller = new AdminNewsPageController();
    $controller->deleteNews();
}

if (isset($_POST['deleteVehicle'])) {
    $controller = new AdminBrandsPageController();
    $controller->deleteVehicle($_POST['VehicleID']);
}

if (isset($_POST['deleteBrand'])) {
    $controller = new AdminBrandsPageController();
    $controller->deleteBrand();
}

if (isset($_GET['vehiculeDetailsID'])) {
    $controller = new BrandsPageController();
    $controller->getVehiculeDetails();
}

if (isset($_POST['addFavorite'])) {
    $controller = new AdminUsersPageController();
    $controller->addFavorite();
}

if (isset($_POST['url']) && isset($_POST['type'])) {
    $controller = new AdminSettingsPageController();
    $controller->AddSocialMedia();
}

if (isset($_POST['deleteFavorite'])) {
    $controller = new AdminUsersPageController();
    $controller->deleteFavorite();
}
