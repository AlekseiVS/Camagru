<?php
class Photo{
    static function saveSrcImgAndUserId($id_user, $src_img){
        $db = Db::getConnection();

        $date =  date("Y-m-d H:i:s"); //  -час-мин-сек

        $sql = 'INSERT INTO img (id_user, src_img, date) VALUES (:id_user, :src_img, :date)';

        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $result->bindParam(':src_img', $src_img, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);

        return $result->execute();
    }





    static function saveIdImgUserNameCommentToTableComments($user_name, $id_img, $comment){
        $db = Db::getConnection();

        $sql = 'INSERT INTO comments (user_name, id_img, comment) VALUES (:user_name, :id_img, :comment)';

        $result = $db->prepare($sql);
//        $result->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $result->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_STR);
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
        $result->setFetchMode(PDO::FETCH_ASSOC);

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
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->fetch();

    }




    static function delCommentsFromImg($id_img){
        $db = Db::getConnection();

        $sql = 'DELETE FROM comments WHERE id_img = :id_img';

        $result = $db->prepare($sql);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->fetch();

    }



    static function delImageFromImg($id_img){
        $db = Db::getConnection();

        $sql = 'DELETE FROM img WHERE id_img = :id_img';

        $result = $db->prepare($sql);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

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
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $array = $result->fetchAll();
//        var_dump($array);
        $count = 0;
        foreach ($array as $row)
            $count++;
//        var_dump($count);
        return ($count);

    }



    static function saveIdImgUserNameToTableLikes($id_user, $id_img){
        $db = Db::getConnection();

        $sql = 'INSERT INTO likes (id_user, id_img) VALUES (:id_user, :id_img)';

        $result = $db->prepare($sql);
//        $result->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_STR);

        $result->execute();
    }







    static function getDataTableComments($id_img){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM comments WHERE id_img = :id_img';

        $result = $db->prepare($sql);
        $result->bindParam(':id_img', $id_img, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }




//    static function getDataTableImgUsers(){
//        $db = Db::getConnection();
//
//        $sql = 'SELECT * FROM img INNER JOIN users ON img.id_user = users.id';
//
//        $result = $db->prepare($sql);
//        $result->execute();
//        $result->setFetchMode(PDO::FETCH_ASSOC);
//
//        return $result->fetchAll();
//
//    }

    static function getDataTableImgUsers2($offset, $id_user){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM img INNER JOIN users ON img.id_user = users.id WHERE img.id_user = '.$id_user.' LIMIT 4 OFFSET '.$offset;

        $result = $db->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);


        $result = $result->fetchAll();


//            echo "<pre style = 'color: #fff;'>";
//            var_dump($result);
//            echo '<pre>';

            return $result;

//        foreach ($result as $value){
//            if($value['id_user'] === $id_user)
//                $res[] = $value;
//        }

//        echo "<pre style = 'color: #fff;'>";
//        var_dump($res);
//        echo '<pre>';



//        echo "<pre style = 'color: #fff;'>";
//        var_dump($result);
//        echo '<pre>';
//        if (!res)
//        return $res;


    }




    static function getDataTableImgUsers1($offset){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM img INNER JOIN users ON img.id_user = users.id LIMIT 4 OFFSET '.$offset;//' LIMIT '.$offset;

        $result = $db->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();

    }



    //Сколько страниц нужно делать!!!

    static function getTotalProducts(){
        $db = Db::getConnection();

        $result = $db->query('SELECT COUNT(*) AS count FROM img');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

//        var_dump($row);

        return $row['count'];

    }

    static function getTotalProducts2($id_user){
        $db = Db::getConnection();

//        $sql = 'SELECT * FROM likes WHERE id_img = :id_img';

        $result = $db->query('SELECT COUNT(*) AS count FROM img WHERE id_user = '.$id_user);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

//        var_dump($row);

        return $row['count'];

    }


}

?>