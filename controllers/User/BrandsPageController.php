<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/BrandPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/BrandsPageView.php');


class BrandsPageController
{
    public function showBrandsPage()
    {
        $view = new BrandsPageView();
        $view->showBrandsPage();
    }
    public function getBrandByID($id)
    {
        $model = new BrandModel();
        return $model->getBrandByID($id);
    }
    public function getVehiculesByBrandID($id)
    {
        $model = new BrandModel();
        if (isset($_SESSION['UserID']))
        {
            return $model->getVehiculesByBrandID($id, $_SESSION['UserID']);
        }
        return $model->getVehiculesByBrandID($id, null);
    }
    public function showBrandPage($id)
    {
        $view = new BrandPageView();
        $view->showBrandPage($id);
    }
    public function getVehiculeDetails()
    {
        $view = new BrandPageView();
        $view->showVehicleDetails($_GET['vehiculeDetailsID']);
    }
}
