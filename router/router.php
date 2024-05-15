<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/User/HomePageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/User/ComparePageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/User/NewsPageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/User/GuidePageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/User/BrandsPageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/User/ContactPageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/User/ReviewPageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/User/vehiclePageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/User/ProfilePageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/Admin/LoginPageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/Admin/HomePageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/Admin/BrandsPageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/Admin/ReviewPageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/Admin/UsersPageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/Admin/NewsPageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/Admin/GuidePageController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/controllers/Admin/SettingsPageController.php');
session_start();
$request = $_SERVER['REQUEST_URI'];
$error = 0;
$AdminVehiculeid = 0;
$id = 0;
$vehicleIDs = [];
if (isset($_GET['AdminVehiculeid'])) {
    $AdminVehiculeid = $_GET['AdminVehiculeid'];
    $request = explode('?', $request)[0];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $request = explode('?', $request)[0];
}
if (isset($_GET['vehicleID1']) && isset($_GET['vehicleID2'])) {
    $vehicleIDs[] = $_GET['vehicleID1'];
    $vehicleIDs[] = $_GET['vehicleID2'];
    if (isset($_GET['vehicleID3'])) {
        $vehicleIDs[] = $_GET['vehicleID3'];
    }
    if (isset($_GET['vehicleID4'])) {
        $vehicleIDs[] = $_GET['vehicleID4'];
    }
    $request = explode('?', $request)[0];
}
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    $request = explode('?', $request)[0];
} else {
    $error = 0;
}

if (substr($request, -1) !== '/') {
    $request .= '/';
}

if (strpos($request, "Admin") && isset($_SESSION['admin']) && ($request == "/Project/Admin/" || $request == "/Project/Admin/login/") && $request != "/Project/Admin/Api/api.php") {
    header("Location: /Project/Admin/home/");
    exit();
}

if (strpos($request, "Admin") && !isset($_SESSION['admin']) && !($request == "/Project/Admin/" || $request == "/Project/Admin/login/" && $request != "/Project/Admin/Api/api.php")) {
    header("Location: /Project/Admin/login/");
    exit();
}

switch ($request) {
    case "/Project/Admin/":
        $controller = new AdminLoginPageController();
        $controller->showLoginPage($error);
        break;
    case "/Project/Admin/login/":
        $controller = new AdminLoginPageController();
        $controller->showLoginPage($error);
        break;
    case "/Project/Admin/home/":
        $controller = new AdminHomePageController();
        $controller->showHomePage();
        break;
    case "/Project/Admin/brands/":
        $controller = new AdminBrandsPageController();
        $controller->showBrandsPage();
        break;
    case "/Project/Admin/brand/add/":
        $controller = new AdminBrandsPageController();
        $controller->showAddBrandPage();
        break;
    case "/Project/Admin/brand/update/":
        $controller = new AdminBrandsPageController();
        $controller->showUpdateBrandPage($id);
        break;
    case "/Project/Admin/brand/details/":
        $controller = new AdminBrandsPageController();
        $controller->showBrandDetailsPage($id);
        break;
    case "/Project/Admin/brand/details/update/":
        $controller = new AdminBrandsPageController();
        $controller->showUpdateVehiclePage($id);
        break;
    case "/Project/Admin/vehicle/add/":
        $controller = new AdminBrandsPageController();
        $controller->showAddVehiclePage();
        break;
    case "/Project/Admin/news/":
        $controller = new AdminNewsPageController();
        $controller->showNewsPage();
        break;
    case "/Project/Admin/guide/":
        $controller = new AdminGuidePageController();
        $controller->showGuidePage();
        break;
    case "/Project/Admin/reviews/":
        $controller = new AdminReviewPageController();
        $controller->showReviewPage();
        break;
    case "/Project/Admin/users/":
        $controller = new AdminUsersPageController();
        $controller->showUsersPage();
        break;
    case "/Project/Admin/users/modify/":
        $controller = new AdminUsersPageController();
        $controller->showModifyUserPage($id);
        break;
    case "/Project/Admin/news/update/":
        $controller = new AdminNewsPageController();
        $controller->showUpdateNewsPage($id);
        break;
    case "/Project/Admin/news/Add/":
        $controller = new AdminNewsPageController();
        $controller->showAddNewsPage();
        break;
    case "/Project/Admin/settings/":
        $controller = new AdminSettingsPageController();
        $controller->showSettingsPage();
        break;
    case "/Project/":
        $controller = new HomePageController();
        $controller->showHomePage();
        break;
    case "/Project/compare/":
        $controller = new ComparePageController();
        $controller->showComparePage($vehicleIDs);
        break;
    case "/Project/news/":
        $controller = new NewsPageController();
        $controller->showNewsPage();
        break;
    case "/Project/news/detail/":
        $controller = new NewsPageController();
        $controller->showNewsDetailsPage($id);
        break;
    case "/Project/guide/":
        $controller = new GuidePageController();
        $controller->showGuidePage();
        break;
    case "/Project/guide/detail/":
        $controller = new GuidePageController();
        $controller->showGuideDetailsPage($id);
        break;
    case "/Project/brands/":
        $controller = new BrandsPageController();
        $controller->showBrandsPage();
        break;
    case "/Project/brand/":
        $controller = new BrandsPageController();
        $controller->showBrandPage($id);
        break;
    case "/Project/vehicle/":
        $controller = new VehiclePageController();
        $controller->showVehicleDetailsPage($id);
        break;
    case "/Project/reviews/":
        $controller = new ReviewPageController();
        $controller->showReviewsPage();
        break;
    case "/Project/review/":
        $controller = new ReviewPageController();
        $controller->showReviewPage($id);
        break;
    case "/Project/review/brand/":
        $controller = new ReviewPageController();
        $controller->showReviewBrandPage($id);
        break;
    case "/Project/contact/":
        $controller = new ContactPageController();
        $controller->showContactPage();
        break;
    case "/Project/profile/":
        $controller = new ProfilePageController();
        $controller->showProfilePage();
        break;
}
