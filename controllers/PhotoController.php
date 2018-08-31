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

            $result1 = Photo::getDataTableImgUsers();

            foreach ($result1 as $key => $row){
                $result2[$key] = Photo::getDataTableComments($row['id_img']);
            }

            echo '<pre style="color: #fff;">';
            var_dump($result2);
            echo '</pre>';


//            $result2 = Photo::getDataTableComments($data['id_img']);
//Сделать запрос в TableComments вытащить данные user_name/comment


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

        if (isset($_SESSION['userId']) && isset($_POST['overlay'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);


            $img1 = $_POST['overlay'];
            $img2 = preg_replace("/^.+base64,/", "", $_POST['img']);
            $img2 = str_replace(' ','+',$img2);
            $img2 = base64_decode($img2);
            $gd_photo = imagecreatefromstring($img2);
            $gd_filter = imagecreatefrompng($img1);
            imagecopy($gd_photo, $gd_filter, 0, 0, 0, 0, 400, 300);
            ob_start();
                imagepng($gd_photo);
                $image_data = ob_get_contents();
            ob_end_clean();
            echo "data:image/png;base64," . base64_encode($image_data);

        }
        else if(isset($_SESSION['userId'])){
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);
            require_once(ROOT . '/views/site/error404.php');
        }
        else
            require_once(ROOT . '/views/site/error404.php');


        return true;

    }




    public function actionPhoto_save(){
        if (isset($_SESSION['userId']) && isset($_POST['photo'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            $checkPng = explode(".", $_POST['photo']);
            if ($checkPng[1] === "png") {
                exit;
            }

            $img = preg_replace("/^.+base64,/", "", $_POST['photo']);
            $img = str_replace(' ','+',$img);
            $img = base64_decode($img);

            $name_img = time();
            $src_img = "template/image/".$name_img.".png";

            //Сохранение в папку
            file_put_contents($src_img, $img);

            //Сохранение в БД
            Photo::saveSrcImgAndUserId($userId, $src_img);


        }
        else if(isset($_SESSION['userId'])){
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);
            require_once(ROOT . '/views/site/error404.php');
        }
        else
            require_once(ROOT . '/views/site/error404.php');

        return true;

    }







    public function actionComment_save(){
        if (isset($_SESSION['userId']) && isset($_POST['comment'])) {
            $userId = $_SESSION['userId'];

            $user = User::getUserById($userId);

//          записать в БД id_img/user_id/comment в table comments
            Photo::saveIdImgUserNameCommentToTableComments($user['name'], $_POST['img_id'], $_POST['comment']);

            $result = [
                'name' => $user['name'],
                'comment' => $_POST['comment']
            ];

            echo json_encode($result);
//          echo $_POST['comment']; Спросить у макса или так правильно или нет?
        }
        else if(isset($_SESSION['userId'])){
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);
            require_once(ROOT . '/views/site/error404.php');
        }
        else
            require_once(ROOT . '/views/site/error404.php');

        return true;

    }









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