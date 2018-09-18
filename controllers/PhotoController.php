<?php
class PhotoController{

    public function actionCabinet(){
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            header('Location: /change_user_data');
        }
        else
            header('Location: /you_are_not_registration');

        return true;

    }



    public function actionGallery_page(){

        if(isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            $url = $_SERVER['REQUEST_URI'];
            $page = substr($url, 14, 3);
            $page = intval($page);
            $offset = ($page - 1) * 6;


            $result1 = Photo::getDataTableImgUsersGalleryPage($offset);

            foreach ($result1 as $key => $row) {
                $result2[$key] = Photo::getDataTableComments($row['id_img']);
                $count = 0;
                foreach ($result2[$key] as $array)
                    $count++;
                $count_comments[$row['id_img']]['count'] = $count;
                $count_like[$row['id_img']]['count'] = Photo::getDataTableLike($row['id_img']);
            }

            $total = Photo::getTotalProductsGalleryPage();
            $limit = 6;
            $index = 'page-';

            $pagination = new Pagination($total, $page, $limit, $index);

            require_once(ROOT . '/views/site/gallery.php');

        }
        else if(!isset($_SESSION['userId'])){

            $url = $_SERVER['REQUEST_URI'];
            $page = substr($url, 14, 3);
            $page = intval($page);
            $offset = ($page - 1) * 6;

            $result1 = Photo::getDataTableImgUsersGalleryPage($offset);

            $total = Photo::getTotalProductsGalleryPage();
            $limit = 6;
            $index = 'page-';

            $pagination = new Pagination($total, $page, $limit, $index);

            require_once(ROOT . '/views/site/gallery.php');
        }
        return true;
    }




    public function actionGallery_user(){
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            $url = $_SERVER['REQUEST_URI'];
            $page = substr($url, 19, 3);
            $page = intval($page);
            $offset = ($page - 1) * 6;

            $result1 = Photo::getDataTableImgUsersGalleryUser($offset, $userId);

            foreach ($result1 as $key => $row){
                $result2[$key] = Photo::getDataTableComments($row['id_img']);
                $count = 0;
                foreach ($result2[$key] as $array)
                    $count++;
                $count_comments[$row['id_img']]['count'] = $count;
                $count_like[$row['id_img']]['count'] = Photo::getDataTableLike($row['id_img']);
            }
            $result3['user_name_gallery'] = $user['name'];

            $total = Photo::getTotalProductsGalleryUser($userId);
            $total =  intval($total);
            $limit = 6;
            $index = 'page-';

            $pagination = new Pagination($total, $page, $limit, $index);

            require_once(ROOT . '/views/site/gallery_user.php');
        }
        return true;
    }


    public function actionCamera_view(){

        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            require_once(ROOT . '/views/site/camera.php');
        }
        else
           header('Location: /you_are_not_registration');

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
        else
            header('Location: /error404');


        return true;

    }




    public function actionPhoto_save(){
        if (isset($_SESSION['userId']) && isset($_POST['photo'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);

            $img = preg_replace("/^.+base64,/", "", $_POST['photo']);
            $img = str_replace(' ','+',$img);
            $img = base64_decode($img);

            $name_img = time();
            $src_img = "template/image/".$name_img.".png";

            //save to folder
            file_put_contents($src_img, $img);

            //save to db
            Photo::saveSrcImgAndUserId($userId, $src_img);

            echo 'Your photo has been added to the gallery';


        }
        else
            header('Location: /error404');


        return true;

    }


    public function actionComment_save(){
        if (isset($_SESSION['userId']) && isset($_POST['comment'])) {
            $userId = $_SESSION['userId'];

            $user = User::getUserById($userId);

//          записать в БД id_img/user_id/comment в table comments
            Photo::saveIdImgUserNameCommentToTableComments($user['name'], $_POST['img_id'], htmlentities($_POST['comment'], ENT_HTML5));

            $dataTableImg = Photo::getDataTableImg($_POST['img_id']);
            $userDataForSendEmail = User::getUserById($dataTableImg['id_user']);
            if ($userDataForSendEmail['message'] == '0')
                User::sendCommentToEmail($userDataForSendEmail['email'], $_POST['comment'], $user['name']);


            $result = [
                'name' => $user['name'],
                'comment' => $_POST['comment']
            ];

            echo json_encode($result);

        }
        else
            header('Location: /error404');

        return true;

    }



    public function actionLike_save(){
        if (isset($_SESSION['userId']) && isset($_POST['img_id'])) {
            $userId = $_SESSION['userId'];

            $user = User::getUserById($userId);

            $res = Photo::checkLike($user['id'], $_POST['img_id']);
            if (!$res){
                Photo::saveIdImgUserNameToTableLikes($user['id'], $_POST['img_id']);
            }
            else
                Photo::delLike($user['id'], $_POST['img_id']);

            $count = Photo::getDataTableLike($_POST['img_id']);
            echo json_encode($count);

        }
        else
            header('Location: /error404');

        return true;

    }




    public function actionLike_color(){
//        echo 'aaa';
        if (isset($_SESSION['userId']) && isset($_POST)) {
            $userId = $_SESSION['userId'];

            $user = User::getUserById($userId);

            foreach ($_POST as $key => $id) {
                $res = Photo::checkLike($user['id'], $id);
                if($res){
                    $array_id[] = $id;
                }
            }

            if(isset($array_id) && $array_id != '')
                echo json_encode($array_id);
            else
                echo 'error';


        }
        else
            echo 'error';

        return true;

    }


    public function actionDel_user_photo_block(){
        if (isset($_SESSION['userId']) && isset($_POST['img_id'])) {
            $userId = $_SESSION['userId'];

            $user = User::getUserById($userId);
            $img_id = $_POST['img_id'];

            Photo::delCommentsFromImg($img_id);
            Photo::delLike($user['id'], $img_id);
            Photo::delImageFromImg($img_id);

            echo $img_id;
        }
        else
            header('Location: /error404');
        return true;
    }



}

?>