<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/UsersPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/ModifyUserPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/UserModel.php');


class AdminUsersPageController
{

    public function getUsers()
    {
        $model = new UserModel();
        return $model->getUsers();
    }
    public function getUserById($id)
    {
        $model = new UserModel();
        return $model->getUserById($id);
    }
    public function modifyUser()
    {
        $model = new UserModel();
        $model->modifyUser($_POST['UserID'], $_POST['username'], $_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $_POST['DateOfBirth'], $_POST['Gender']);
        header("Location: /Project/profile/");
        exit();
    }
    public function toggleUser()
    {
        $model = new UserModel();
        $model->toggleUser($_GET['UserID'], $_GET['toggleUser']);
        header("Location: /Project/Admin/users/modify/?id=" . $_GET['UserID']);
        exit();
    }
    public function deleteUser()
    {
        $model = new UserModel();
        $model->deleteUser($_GET['UserID']);
        echo json_encode("User deleted");
    }
    public function blockUser()
    {
        $model = new UserModel();
        $model->toggleUser($_POST['UserID'], 1);
    }
    public function showUsersPage()
    {
        $view = new AdminUsersPageView();
        $view->showUsersPage();
    }
    public function showModifyUserPage($id)
    {
        $view = new AdminModifyUsersPageView();
        $view->showUserPage($id);
    }
    public function addFavorite()
    {
        $model = new UserModel();
        $model->addFavorite($_POST['VehicleID'], $_POST['UserID']);
        echo json_encode("Favorite added successfully");
    }
    public function deleteFavorite()
    {
        $model = new UserModel();
        $model->deleteFavorite($_POST['VehicleID'], $_POST['UserID']);
        echo json_encode("Favorite deleted successfully");
    }
}
