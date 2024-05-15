<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/NewsPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/NewsDetailsPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/NewsModel.php');


class NewsPageController
{
    public function getNews($offset, $limit)
    {
        $model = new NewsModel();
        return $model->getNews($offset, $limit);
    }
    public function getNewsByID($id)
    {
        $model = new NewsModel();
        return $model->getNewsByID($id);
    }
    public function getNombreNews()
    {
        $model = new NewsModel();
        return $model->getNombreNews();
    }
    public function showNewsPage()
    {
        $view = new NewsPageView();
        $view->showNewsPage();
    }
    public function showNewsDetailsPage($id)
    {
        $view = new NewsDetailsPageView();
        $view->showNewsDetailsPage($id);
    }
}
