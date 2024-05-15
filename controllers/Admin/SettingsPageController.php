<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/SettingsPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/models/HomePageModel.php');
class AdminSettingsPageController
{
    public function AddSocialMedia()
    {
        $model = new HomePageModel();
        if (!empty($_FILES['image']['name'])) {

            $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/Project/public/images/';

            $tempFile = $_FILES['image']['tmp_name'];
            $targetFile = $targetFolder . $_FILES['image']['name'];
            if (move_uploaded_file($tempFile, $targetFile)) {
            }
            $imageID = $model->AddLogo($_FILES['image']['name']);
        }
        $mdeiaID = $model->AddSocialMedia($_POST['type'], $_POST['url'], $imageID);
        echo json_encode([$_POST['type'], $_POST['url'], $_FILES['image']['name'], $mdeiaID, $imageID]);
    }
    public function deletMedia()
    {
        $model = new HomePageModel();
        $imagePath = $_POST['imagePath'];
        $imageDirectory = '../public/images/';
        $imagePath = $imageDirectory . $imagePath;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $model->deletMedia($_POST['mediaId'], $_POST['ImageID']);
        echo json_encode("Media Deleted");
    }
    public function AddNewSlide()
    {
        $model = new HomePageModel();
        if ($_POST['SlideType'] == 'Ad') {
            if (!empty($_FILES['Slideimage']['name'])) {

                $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/Project/public/images/';

                $tempFile = $_FILES['Slideimage']['tmp_name'];
                $targetFile = $targetFolder . $_FILES['Slideimage']['name'];
                if (move_uploaded_file($tempFile, $targetFile)) {
                }

                $imageID = $model->AddLogo($_FILES['Slideimage']['name']);
                $model->AddNewSlide($imageID, $_POST['Slideurl']);
            }
        } else {
            $ImageID = $model->getNewsImage($_POST['NewsID']);
            $url = "http://localhost/Project/news/detail/?id=" . $_POST['NewsID'];
            $model->AddNewSlide($ImageID, $url);
        }
        header('Location: /Project/Admin/settings/');
        exit();
    }
    public function deleteSlide()
    {
        $model = new HomePageModel();
        $imagePath = $_POST['slidePath'];
        $imageDirectory = '../public/images/';
        $imagePath = $imageDirectory . $imagePath;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $model->deleteSlide($_POST['slideID']);
        echo json_encode("Slide Deleted");
    }
    public function showSettingsPage()
    {
        $view = new AdminSettingsPageView();
        $view->showSettingsPage();
    }
}
