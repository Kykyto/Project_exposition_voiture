<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/views/Admin/LoginPageView.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Project/Models/LoginModel.php');
class AdminLoginPageController
{
    public function handleLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = new LoginModel();
        $user = $login->login($username, $password);
        if ($user) {
            session_start();
            if ($user['admin'] == 1) {
                $_SESSION['admin'] = true;
                $_SESSION['UserID'] = $user['UserID'];
                header('Location: /Project/Admin/home/');
                exit();
            }
            $_SESSION['UserID'] = $user['UserID'];
            header('Location: /Project/');
            exit();
        } else {
            header('Location: /Project/Admin/login/?error=1');
        }
    }
    public function handleSignup()
    {
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $date = $_POST['DateOfBirth'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $login = new LoginModel();
        $user = $login->signup($username, $firstname, $lastname, $email, $date, $gender, $password);
        print_r($user);
        if ($user) {
            session_start();
            if ($user['admin'] == 1) {
                $_SESSION['admin'] = true;
                $_SESSION['UserID'] = $user['UserID'];
                header('Location: /Project/Admin/home/');
                exit();
            }
            $_SESSION['UserID'] = $user['UserID'];
            header('Location: /Project/');
            exit();
        } else {
            header('Location: /Project/Admin/login/?error=2');
        }
    }
    public function handleLogout()
    {
        session_start();
        if (isset($_SESSION['UserID'])) {
            session_destroy();
        }
        header('Location: /Project/Admin/login/');
    }
    public function showLoginPage($error)
    {
        $view = new AdminLoginPageView();
        $view->showLoginPage($error);
    }
}
