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
            $name = htmlentities($_POST['name'], ENT_HTML5);
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
                $password = md5($password);
                $result = User::register($name, $email, $password, $token);

                User::sendLinkConfirmToEmail($email, $token);

            }

        }
        else if (isset($_SESSION['userId'])) {
            header("Location: /you_are_registration");
        }

        require_once(ROOT . '/views/site/register.php');

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


            $userId = User::checkUserData($email, $password);

            $statusUser = User::checkStatus($email);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Invalid login data';
            }
            if ($statusUser == false) {
                $errors[] = 'You did not confirm the registration by link on your mail';
            }
            if ($errors == false){
//                 Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
//                 Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet");
            }

        }
        else if (isset($_SESSION['userId'])) {
            header("Location: /you_are_registration");
        }

        require_once(ROOT . '/views/site/login.php');

        return true;
    }


    public function actionForgot_password()
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
                $result = User::sendLinkChangeDataUser($email, $userData['token']);
            }
        }
        else if (isset($_SESSION['userId'])) {
            header("Location: /you_are_registration");
        }

        require_once(ROOT . '/views/site/forgot.php');

        return true;
    }



    public function actionChange_data()
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
                $userData = User::getUserByEmail($email);
                $_SESSION['userId'] = $userData['id'];

                header("Location: /change_user_data");
            }
        }
        else
            header("Location: /forgot_password");
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
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            require_once(ROOT . '/views/site/error404.php');
        }
        require_once(ROOT . '/views/site/error404.php');

        return true;
    }


    public function actionYou_are_registration()
    {
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            require_once(ROOT . '/views/site/you_are_registration.php');
        }
        return true;
    }


    public function actionYou_are_not_registration()
    {
        if (!isset($_SESSION['userId'])) {
            require_once(ROOT . '/views/site/you_are_not_registration.php');
        }
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
                    $result = User::editName($userId, htmlentities($name, ENT_HTML5));
                }
            }

            if (isset($_POST['submit']) && isset($_POST['email'])) {
                if (!User::checkEmail( $_POST['email'])) {
                    $errors[] = 'Invalid email address';
                }
                else{
                    $email = $_POST['email'];
                }

                if($errors == false){
                    $result = User::editEmail($userId, $email);
                }
            }

            if (isset($_POST['submit']) && isset($_POST['password'])) {
                if (!User::checkPassword( $_POST['password'])) {
                    $errors[] = 'The name can not be less than two characters';
                }
                else{
                    $password = $_POST['password'];
                }

                if($errors == false){
                    $result = User::editPassword($userId, $password);
                }
            }
            require_once(ROOT . '/views/site/change_user_data.php');
        }
        else if(!isset($_SESSION['userId']))
            header("Location: /you_are_not_registration");

        return true;
    }


}
?>