<?php
class Photo{
    static function saveSrcImgAndUserId($id_user, $src_img){
        $db = Db::getConnection();

        $sql = 'INSERT INTO img (id_user, src_img) VALUES (:id_user, :src_img)';

        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $result->bindParam(':src_img', $src_img, PDO::PARAM_STR);

        return $result->execute();
    }
}

?>