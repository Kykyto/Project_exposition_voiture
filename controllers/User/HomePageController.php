<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/HomePageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/HomePageModel.php');
class HomePageController
{
    public function getSocialMedia()
    {
        $model = new HomePageModel();
        return $model->getSocialMedia();
    }
    public function getDiaporama()
    {
        $model = new HomePageModel();
        return $model->getDiaporama();
    }
    public function getComparaison($id)
    {
        $model = new HomePageModel();
        if ($id == 0) {
            return $model->getComparaison();
        }
        return $model->getPopularComparaison($id);
    }
    public function showHomePage()
    {
        $view = new HomePageView();
        $view->showHomePage();
    }
}
