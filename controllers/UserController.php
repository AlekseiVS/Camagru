<?php
class UserController
{
    public function actionRegister()
    {

        $name = '';
        $email = '';
        $password = '';
        $result = false;




        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'The name can not be less than two characters';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Invalid email address';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password must not be shorter than 6 characters';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'This email is already in use!';
            }
            if ($errors == false) {

                $token = User::createToken();
                $result = User::register($name, $email, $password, $token);
                User::sendLinkConfirmToEmail($email, $token);

            }

        }
        else if (isset($_SESSION['userId'])) {
            header("Location: /error404");
        } else {
            require_once(ROOT . '/views/site/register.php');
        }
        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Invalid email address';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password must not be shorter than 6 characters';
            }
//            if (!($status = User::checkSatatus($email))) {
//                $errors[] = 'You did not confirm the registration by link on your mail';
//            }

            // Проверяем существует ли пользователь и
            $userId = User::checkUserData($email, $password);
            $statusUser = User::checkSatatus($email);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Invalid login data';
            }
            if ($statusUser == false) {
                $errors[] = 'You did not confirm the registration by link on your mail';
            } else {
//                 Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
//                 Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet");
            }

        }
        else if (isset($_SESSION['userId'])) {
            header("Location: /error404");
        }

        require_once(ROOT . '/views/site/login.php');

        return true;
    }


    public function actionForgot()
    {
        $email = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Invalid email address';
            }
            if (!User::checkEmailExists($email)) {
                $errors[] = 'No such email address';
            }
            if ($errors == false) {
                $userData = User::getUserByEmail($email);
                $result = User::sendPasswordToEmail($userData);
            }
        }

        if (isset($_SESSION['userId'])) {
            header("Location: /error404");
        } else {
            require_once(ROOT . '/views/site/forgot.php');
        }

        return true;
    }


    public function actionConfirm()
    {
        $result = false;

        $email = '';
        $token = '';
        $password = '';

        if (isset($_GET['email']) && $_GET['token']) {
            $email = $_GET['email'];
            $token = $_GET['token'];

            $result = User::confirmLinkThroughEmailToken($email, $token);
            if ($result) {
                User::changeStatus($email);
                header("Location: /login");
            }
        }
        header("Location: /login");
    }


    public function actionLogout()
    {
        session_start();
        unset($_SESSION['userId']);
        header('Location: /login');
    }




    public function actionError404()
    {
        $userId = $_SESSION['userId'];
        $user = User::getUserById($userId);

        require_once(ROOT . '/views/site/error404.php');

        return true;
    }








    public function actionChange_user_data(){
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        $errors = false;

        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);


            if (isset($_POST['submit']) && isset($_POST['name'])) {
                if (!User::checkName( $_POST['name'])) {
                    $errors[] = 'The name can not be less than two characters';
                }
                else{
                    $name = $_POST['name'];
                }

                if($errors == false){
                    $result = User::editName($userId, $name);
                }
            }

            if (isset($_POST['submit']) && isset($_POST['email'])) {
                if (!User::checkName( $_POST['email'])) {
                    $errors[] = 'Invalid email address';
                }
                else{
                    $email = $_POST['email'];
                }

                if($errors == false){
                    $result = User::editName($userId, $email);
                }
            }

            if (isset($_POST['submit']) && isset($_POST['password'])) {
                if (!User::checkName( $_POST['password'])) {
                    $errors[] = 'The name can not be less than two characters';
                }
                else{
                    $password = $_POST['password'];
                }

                if($errors == false){
                    $result = User::editName($userId, $password);
                }
            }
            require_once(ROOT . '/views/site/change_user_data.php');
        }
//        if(isset($_SESSION['userId']))
//        {
//            require_once(ROOT . '/views/site/change_user_data.php');
//        }
        else// if(!isset($_SESSION['userId'])) {
            require_once(ROOT . '/views/site/error404.php');
        //}
        // переделать на пользователь не авторизирован,
        // сделать это на всех страницах кабинета + сделать пользователь уже авторизирован
        // на страницах с регистрацией и авторизацикй вместо страницы 404!!!

        return true;


    }


}
?>