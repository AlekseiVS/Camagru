<?php
class Photo{
    static function saveSrcImgAndUserId($id_user, $src_img){
        $db = Db::getConnection();

        $data =  date("Y-m-d H:i:s"); //  -час-мин-сек

        $sql = 'INSERT INTO img (id_user, src_img, data) VALUES (:id_user, :src_img, :data)';

        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $result->bindParam(':src_img', $src_img, PDO::PARAM_STR);
        $result->bindParam(':data', $data, PDO::PARAM_STR);

        return $result->execute();
    }


    static function getDataTableImgUsers(){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM img INNER JOIN users ON img.id_user = users.id';

        $result = $db->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();

    }
}

?>