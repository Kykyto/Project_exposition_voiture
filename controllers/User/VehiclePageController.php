<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/VehicleDetailsPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/VehicleModel.php');


class VehiclePageController
{
    public function getVehicleByID($id)
    {
        $model = new VehicleModel();
        return $model->getVehicleByID($id);
    }
    public function showVehicleDetailsPage($id)
    {
        $view = new VehicleDetailsPageView();
        $view->showVehicleDetailsPage($id);
    }
}
