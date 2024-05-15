<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/NewsPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/UpdateNewsPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/AddNewsPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/NewsModel.php');

class AdminNewsPageController
{
    public function getNews()
    {
        $model = new NewsModel();
        return $model->getAllNews();
    }
    public function getNewsByID($id)
    {
        $model = new NewsModel();
        return $model->getNewsByID($id);
    }
    public function updateReview()
    {
        $model = new ReviewModel();
        $model->updateReview($_POST['ReviewID'], $_POST['status']);
        echo json_encode("Review updated");
    }
    public function updateNews()
    {
        $model = new NewsModel();
        $model->updateNews($_POST['NewsID'], $_POST['title'], $_POST['Content']);
        $imageArray = explode(',', $_POST['updatedImages']);
        if (!empty($_FILES['images']['name'][0])) {
            $imagesArray = [];

            $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/Project/public/images/';

            foreach ($_FILES['images']['name'] as $key => $imageName) {
                $tempFile = $_FILES['images']['tmp_name'][$key];
                $targetFile = $targetFolder . $imageName;
                if (in_array($imageName, $imageArray)) {
                    if (move_uploaded_file($tempFile, $targetFile)) {

                        $imagesArray[] = $imageName;
                    }
                }
            }
            $model->InsertImages($_POST['NewsID'], $imagesArray);
        }
        echo json_encode("News Updated");
    }
    public function AddNews()
    {
        $model = new NewsModel();
        $newsID = $model->AddNews($_POST['title'], $_POST['Content']);

        if (!empty($_FILES['images']['name'][0])) {
            $imagesArray = [];

            $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/Project/public/images/';

            foreach ($_FILES['images']['name'] as $key => $imageName) {
                $tempFile = $_FILES['images']['tmp_name'][$key];
                $targetFile = $targetFolder . $imageName;
                if (move_uploaded_file($tempFile, $targetFile)) {
                    $imagesArray[] = $imageName;
                }
            }
            $model->InsertImages($newsID, $imagesArray);
        }
        header("Location: /Project/Admin/news/");
        exit();
    }
    public function deleteImage()
    {
        $model = new NewsModel();
        $imageDirectory = '../public/images/';
        $filename = $_POST['deleteNewsImage'];
        $id = $_POST['id'];

        $imagePath = $imageDirectory . $filename;

        if (file_exists($imagePath)) {
            if (unlink($imagePath)) {
                $model->deleteImage($id, $filename);
                echo json_encode(['success' => true, 'message' => 'Image deleted successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete the image.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Image ' . $imagePath . ' not found.']);
        }
    }
    public function deleteReview()
    {
        $model = new ReviewModel();
        $model->deleteReview($_POST['ReviewID']);
        echo json_encode("Review deleted");
    }
    public function deleteNews()
    {
        $model = new NewsModel();
        $model->deleteNews($_POST['NewsID']);
        $images = $model->getNewsImages($_POST['NewsID']);
        $imageDirectory = '../public/images/';
        foreach ($images as $image) {
            $imagePath = $imageDirectory . $image['ImagePath'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
                $model->deleteImage($_POST['NewsID'], $image['ImagePath']);
            }
        }
        echo json_encode("News deleted");
    }

    public function showNewsPage()
    {
        $view = new AdminNewsPageView();
        $view->showNewsPage();
    }
    public function showUpdateNewsPage($id)
    {
        $view = new AdminUpdateNewsPageView();
        $view->showNewsPage($id);
    }
    public function showAddNewsPage()
    {
        $view = new AdminAddNewsPageView();
        $view->showNewsPage();
    }
}
