<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/HomePageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/models/CompareModel.php');
class AdminHomePageController
{
    public function handleCompare()
    {
        $model = new CompareModel();
        $model->handleCompare($_POST['vehicleID1'], $_POST['vehicleID2']);
        echo json_encode("Compare updated");
    }
    public function showHomePage()
    {
        $view = new AdminHomePageView();
        $view->showHomePage();
    }
}
