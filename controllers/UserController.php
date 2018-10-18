<?php
class UserController
{
    public function actionLogo()
    {
        if(isset($_SESSION['userId'])){
            header("Location: /gallery/page-1");
        }
        else
            header("Location: /login");
    }



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

            if (preg_match("/\s{1,}/", $name))
                $errors[] = 'Do not use spaces in the name!';
            if (!User::checkName($name))
                $errors[] = 'The name can not be less than two characters.';
            if (!User::checkEmail($email))
                $errors[] = 'Invalid email address.';
            if (User::checkEmailExists($email))
                $errors[] = 'This email is already in use!';
            if (preg_match("/\s{1,}/", $password))
                $errors[] = 'Do not use spaces in the password!';
            if (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password))
                $errors[] = 'The password should consist of at least 8 characters, a small letter, a large letter and digit';
            if ($errors == false) {
                $token = User::createToken();
                $password = md5($password);
                $result = User::register($name, $email, $password, $token);
                User::sendLinkConfirmToEmail($email, $token);
            }

        }
        else if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);
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

            if (!User::checkEmail($email)) {
                $errors[] = 'Invalid email address';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password must not be shorter than 6 characters';
            }

            $userId = User::checkUserData($email, $password);
            $statusUser = User::checkStatus($email);

            if ($userId == false) {
                $errors[] = 'Invalid login data';
            }
            if ($statusUser == false) {
                $errors[] = 'You did not confirm the registration by link on your mail';
            }
            if ($errors == false){
                User::auth($userId);
                $userId = $_SESSION['userId'];
                $user = User::getUserById($userId);
                header("Location: /cabinet");
            }
        }
        else if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);
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
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);
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
        return true;
    }

    public function actionLogout()
    {
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
                if (!User::checkName($_POST['name'])) {
                    $errors[] = 'The name can not be less than two characters';
                }
                if (preg_match("/\s{1,}/", $_POST['name']))
                    $errors[] = 'Do not use spaces in the name!';
                else{
                    $name = $_POST['name'];
                }
                if($errors == false){
                    $result = User::editName($userId, htmlentities($name, ENT_HTML5));
                    $name = '';
                }
            }
            if (isset($_POST['submit']) && isset($_POST['email'])) {
                if (!User::checkEmail($_POST['email'])) {
                    $errors[] = 'Invalid email address';
                }
                if (User::checkEmailExists($_POST['email']))
                    $errors[] = 'This email is already in use!';
                else{
                    $email = $_POST['email'];
                }

                if($errors == false){
                    $result = User::editEmail($userId, $email);
                    $email = '';
                }
            }
            if (isset($_POST['submit']) && isset($_POST['password'])) {

                if (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $_POST['password']))
                    $errors[] = 'The password should consist of at least 8 characters, a small letter, a large letter and numbers';
                if (preg_match("/\s{1,}/", $_POST['password']))
                    $errors[] = 'Do not use spaces in the password!';
                else{
                    $password = $_POST['password'];
                }
                if($errors == false){
                    $result = User::editPassword($userId, $password);
                    $password = '';
                }
            }
            if (isset($_POST['submit']) && isset($_POST['message'])) {
                $message = $_POST['message'];

                User::editMessage($userId, $message);

            }
            require_once(ROOT . '/views/site/change_user_data.php');
        }
        else if(!isset($_SESSION['userId']))
            header("Location: /you_are_not_registration");

        return true;
    }

}
?>