<?php
class Photo{
    static function saveSrcImgAndUserId($id_user, $src_img){
        $db = Db::getConnection();

        $date =  date("Y-m-d H:i:s"); //  -час-мин-сек

        $sql = 'INSERT INTO img (id_user, src_img, date) VALUES (:id_user, :src_img, :date)';

        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':src_img', $src_img, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);

        return $result->execute();
    }





    static function saveIdImgUserNameCommentToTableComments($user_name, $id_img, $comment){
        $db = Db::getConnection();

        $sql = 'INSERT INTO comments (user_name, id_img, comment) VALUES (:user_name, :id_img, :comment)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);

        return $result->execute();
    }



    static function checkLike($id_user, $id_img){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM likes WHERE id_user = :id_user AND id_img = :id_img';

        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->execute();

        return $result->fetch();
    }

//--------------------------------------------------------------------------------

    static function delLike($id_user, $id_img){
        $db = Db::getConnection();

        $sql = 'DELETE FROM likes WHERE id_user = :id_user AND id_img = :id_img';

        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->execute();
//        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->fetch();

    }




    static function delCommentsFromImg($id_img){
        $db = Db::getConnection();

        $sql = 'DELETE FROM comments WHERE id_img = :id_img';

        $result = $db->prepare($sql);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->execute();

        $result->fetch();

    }



    static function delImageFromImg($id_img){
        $db = Db::getConnection();

        $sql = 'DELETE FROM img WHERE id_img = :id_img';

        $result = $db->prepare($sql);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->execute();

        $result->fetch();

    }



//------------------------------------------------------------------------------------
    static function getDataTableLike($id_img)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM likes WHERE id_img = :id_img';

        $result = $db->prepare($sql);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->execute();

        $array = $result->fetchAll();

        $count = 0;
        foreach ($array as $row)
            $count++;
        return ($count);

    }



    static function saveIdImgUserNameToTableLikes($id_user, $id_img){
        $db = Db::getConnection();

        $sql = 'INSERT INTO likes (id_user, id_img) VALUES (:id_user, :id_img)';

        $result = $db->prepare($sql);

        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);

        $result->execute();
    }


    static function getDataTableComments($id_img){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM comments WHERE id_img = :id_img';

        $result = $db->prepare($sql);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $res = $result->fetchAll();

        return  (array_reverse($res));

//        return $res;
    }



    static function getDataTableImg($id_img){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM img WHERE id_img = :id_img';

        $result = $db->prepare($sql);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $res = $result->fetch();

        return  ($res);
    }



    static function getDataTableImgUsersGalleryUser($offset, $id_user){
        $db = Db::getConnection();

//        $sql = 'SELECT * FROM img INNER JOIN users ON img.id_user = users.id WHERE img.id_user = :id_user LIMIT 6 OFFSET '.$offset;

        $sql = 'SELECT * FROM img INNER JOIN users ON img.id_user = users.id WHERE img.id_user = :id_user ORDER BY img.date DESC LIMIT 6 OFFSET '.$offset;

        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll();

    }




    ///////////////////////////////////////////////////////////////////////////////////////


    static function getDataTableImgUsersGalleryPage($offset){
        $db = Db::getConnection();

//        $sql = 'SELECT * FROM img INNER JOIN users ON img.id_user = users.id WHERE img.id_user = :id_user LIMIT 6 OFFSET '.$offset.'ORDER BY img.id_img DESC';

        $sql = 'SELECT * FROM img INNER JOIN users ON img.id_user = users.id ORDER BY img.date DESC LIMIT 6 OFFSET :offset';
//        $sql = 'SELECT * FROM img, users WHERE img.id_user = users.id ORDER BY img.date DESC LIMIT 6 OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll();

    }



//    static function getDataTableImgUsersGalleryPage($offset){
//        $db = Db::getConnection();
//
////        $sql = 'SELECT * FROM img INNER JOIN users ON img.id_user = users.id WHERE img.id_user = :id_user LIMIT 6 OFFSET '.$offset.'ORDER BY img.id_img DESC';
//
//        $sql = 'SELECT * FROM img INNER JOIN users ON img.id_user = users.id LIMIT 6 OFFSET :offset';
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
//        $result->execute();
//
//        return $result->fetchAll();
//
//    }


    static function getTotalProductsGalleryPage(){
        $db = Db::getConnection();

        $result = $db->query('SELECT COUNT(*) AS count FROM img');
        $row = $result->fetch();

        return $row['count'];
    }

    static function getTotalProductsGalleryUser($id_user){
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) AS count FROM img WHERE id_user = :id_user';

        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();

        return $row['count'];
    }


}

?>