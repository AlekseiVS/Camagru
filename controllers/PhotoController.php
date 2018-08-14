<?php
class PhotoController{

    public function actionCabinet(){
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            header('Location: /change_user_data');
        }

        require_once(ROOT . '/views/site/error404.php');

        return true;



    }

    public function actionGallery(){

        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            require_once(ROOT . '/views/site/gallery.php');
        }
        else
            require_once(ROOT . '/views/site/error404.php'); //Надо подключить галеерею с ограниченными правами
        // пока пользователь не зарегестрируется

        return true;
    }


    public function actionCamera(){
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            require_once(ROOT . '/views/site/camera.php');//Подключить страницу камеры!!!
        }
        else
            require_once(ROOT . '/views/site/error404.php');

        return true;

    }


    public function actionCamera_make(){
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

        //Оброботать Ajax запроч

//            require_once(ROOT . '/views/site/camera.php');//Подключить страницу камеры!!!
        }
        else
            require_once(ROOT . '/views/site/error404.php');

        return true;

    }

//    public function actionChange_user_data(){
//        if (isset($_SESSION['userId'])) {
//            $userId = $_SESSION['userId'];
//            $user = User::getUserById($userId);
//        }
//        require_once(ROOT . '/views/site/cabinet.php');
//
//        return true;
//
//    }

    public function actionGallery_user(){
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            require_once(ROOT . '/views/site/cabinet.php');
        }
        else
            require_once(ROOT . '/views/site/error404.php');

        return true;

    }


}


?>