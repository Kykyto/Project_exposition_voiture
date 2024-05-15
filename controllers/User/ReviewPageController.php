<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/NewsPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/ReviewDetailsPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/ReviewPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/ReviewBrandPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/ReviewModel.php');


class ReviewPageController
{
    public function getPopularReviews($id)
    {
        $model = new ReviewModel();
        return $model->getPopularReviews($id);
    }
    public function getPopularBrandReviews($id)
    {
        $model = new ReviewModel();
        return $model->getPopularBrandReviews($id);
    }
    public function getVehicleReviews($id, $page = 1)
    {
        $model = new ReviewModel();
        $view = new ReviewPageView();
        $view->showReviewList($model->getVehicleReviews($id, $page));
    }
    public function getBrandReviews($id, $page = 1)
    {
        $model = new ReviewModel();
        $view = new ReviewPageView();
        $view->showReviewList($model->getBrandReviews($id, $page));
    }
    public function getNombreReviewsByID($id)
    {
        $model = new ReviewModel();
        return $model->getNombreReviewsByID($id);
    }
    public function getNombreReviewsBrandByID($id)
    {
        $model = new ReviewModel();
        return $model->getNombreReviewsBrandByID($id);
    }
    public function postReview($data)
    {
        $model = new ReviewModel();
        return $model->getPopularReviews($data);
    }
    public function AddReview()
    {
        $model = new ReviewModel();
        $model->AddReview($_POST['VehicleID'], $_SESSION['UserID'], $_POST['review'], $_POST['note']);
        echo json_encode("Review added successfully");
    }
    public function AddBrnadReview()
    {
        $model = new ReviewModel();
        $model->AddBrnadReview($_POST['BrnadID'], $_SESSION['UserID'], $_POST['review'], $_POST['note']);
        echo json_encode("Review added successfully");
    }
    public function showReviewPage($id)
    {
        $view = new ReviewPageView();
        $view->showReviewPage($id);
    }
    public function showReviewBrandPage($id)
    {
        $view = new ReviewBrandPageView();
        $view->showReviewBrandPage($id);
    }
    public function showReviewsPage()
    {
        $view = new ReviewsPageView();
        $view->showReviewsPage();
    }
}
