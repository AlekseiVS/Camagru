<?php

//include_once ROOT.'/models/Category.php';
//include_once ROOT.'/models/Product.php';
//include_once ROOT.'/components/Pagination.php';

class CatalogController{

    public function actionPage($page){

//        echo $page;

        if(isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::getUserById($userId);


            $url = $_SERVER['REQUEST_URI'];
            $page = substr($url, 14, 3);
            $page = intval($page);

            $offset = ($page - 1) * 5;


            $result1 = Photo::getDataTableImgUsers1($offset);

//            echo '<pre>';
//            var_dump($result1);
//            echo '</pre>';



            foreach ($result1 as $key => $row) {
                $result2[$key] = Photo::getDataTableComments($row['id_img']);
                $count = 0;
                foreach ($result2[$key] as $array)
                    $count++;
                $count_comments[$row['id_img']]['count'] = $count;
                $count_like[$row['id_img']]['count'] = Photo::getDataTableLike($row['id_img']);

            }

//        $total = Photo::getTotalProducts(); // Разобраться!!!

            //Создает объект Pagination -постраничная навигация
            $pagination = new Pagination(8, $page, 4, 'page-');

            require_once(ROOT . '/views/site/catalog.php');

        }
        else if(!isset($_SESSION['userId'])){

            $url = $_SERVER['REQUEST_URI'];
            $page = substr($url, 14, 3);
            $page = intval($page);

            $offset = ($page - 1) * 4;

            $result1 = Photo::getDataTableImgUsers1($offset);
            $pagination = new Pagination(8, $page, 4, 'page-');

            require_once(ROOT . '/views/site/catalog.php');

//            require_once(ROOT . '/views/site/gallery.php'); //Надо подключить галеерею с ограниченными правами
            // пока пользователь не зарегестрируется
        }
        return true;
    }


}

?>