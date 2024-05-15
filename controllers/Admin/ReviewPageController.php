<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/ReviewPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/ReviewModel.php');

class AdminReviewPageController
{
    public function getReviews()
    {
        $model = new ReviewModel();
        return $model->getReviews();
    }
    public function updateReview()
    {
        $model = new ReviewModel();
        $model->updateReview($_POST['ReviewID'], $_POST['status']);
        echo json_encode("Review updated");
    }
    public function deleteReview()
    {
        $model = new ReviewModel();
        $model->deleteReview($_POST['ReviewID']);
        echo json_encode("Review deleted");
    }

    public function showReviewPage()
    {
        $view = new AdminReviewPageView();
        $view->showReviewPage();
    }
}
