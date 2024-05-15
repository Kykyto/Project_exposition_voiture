<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/GuidePageView.php');

class AdminGuidePageController
{
    public function getAllGuides()
    {
        $model = new GuideModel();
        return $model->getAllGuides();
    }
    public function AddGuide()
    {
        $model = new GuideModel();
        if (!empty($_FILES['image']['name'])) {

            $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/Project/public/images/';

            $tempFile = $_FILES['image']['tmp_name'];
            $targetFile = $targetFolder . $_FILES['image']['name'];
            if (move_uploaded_file($tempFile, $targetFile)) {
            }
            $model->AddGuide($_POST['title'], $_POST['Description'], $_FILES['image']['name']);
        }
        header('Location: /Project/Admin/guide');
        exit();
    }
    public function updateGuide()
    {
        $model = new GuideModel();
        $model->updateGuide($_POST['guideID'], $_POST['title'], $_POST['description']);
        if (!empty($_FILES['image']['name'])) {

            $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/Project/public/images/';

            $tempFile = $_FILES['image']['tmp_name'];
            $targetFile = $targetFolder . $_FILES['image']['name'];
            $imagePath = $targetFolder . $_POST['imageName'];
            if (file_exists($imagePath)) {
                if (unlink($imagePath)) {
                }
            }
            if (move_uploaded_file($tempFile, $targetFile)) {
            }
            $model->updateGuideImage($_POST['guideID'], $_FILES['image']['name']);
        }
        echo json_encode("Guide Updated");
    }
    public function deleteGuide()
    {
        $model = new GuideModel();
        $model->deleteGuide($_POST['ImageID']);
        echo json_encode("Guide Deleted");
    }
    public function showGuidePage()
    {
        $view = new AdminGuidePageView();
        $view->showGuidePage();
    }
}
