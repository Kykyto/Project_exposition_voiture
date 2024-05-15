<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/ComparePageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/CompareModel.php');

class ComparePageController
{
    public function getCompare($id)
    {
        $model = new CompareModel();
        return $model->getCompare($id);
    }
    public function showComparePage($vehicleIDs)
    {
        $view = new ComparePageView();
        $view->showComparePage($vehicleIDs);
    }
}
