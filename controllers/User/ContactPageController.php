<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/User/ContactPageView.php');


class ContactPageController
{
    public function showContactPage()
    {
        $view = new ContactPageView();
        $view->showContactPage();
    }
}
