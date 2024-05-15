<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/GuidePageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/GuideDetailsPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/GuideModel.php');


class GuidePageController
{
    public function getGuides($offset, $limit)
    {
        $model = new GuideModel();
        return $model->getGuides($offset, $limit);
    }
    public function getNombreGuides()
    {
        $model = new GuideModel();
        return $model->getNombreGuides();
    }
    public function getGuideByID($id)
    {
        $model = new GuideModel();
        return $model->getGuideByID($id);
    }
    public function showGuidePage()
    {
        $view = new GuidePageView();
        $view->showGuidePage();
    }
    public function showGuideDetailsPage($id)
    {
        $view = new GuideDetailsPageView();
        $view->showGuideDetailsPage($id);
    }
}
