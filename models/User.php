<?php
class User{
    public static function register($name, $email, $password, $token){
        $db = Db::getConnection();

        $sql = 'INSERT INTO users (name, email, password, token, status) VALUES (:name, :email, :password, :token, 0)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':token', $token, PDO::PARAM_STR);

        return $result->execute();
    }


    public static function createToken(){
        $token = "QWERTYUIOP";
        $token2 = str_shuffle($token);
        $token2 = substr($token2, 0, 7);

        if ($token2) {
            return $token2;
        }
        return false;
    }






//--------------------------Edit user data--------------------------------------------


    public static function editName($id, $name)
    {
        $db = Db::getConnection();

        $sql = "UPDATE users SET name = :name WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);

        return $result->execute();
    }



    public static function editPassword($id, $password)
    {
        $db = Db::getConnection();


        $sql = "UPDATE users SET password = :password WHERE id = :id";
//        $sql = "UPDATE users SET name = :name, password = :password, email = :email  WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function editEmail($id, $email)
    {
        $db = Db::getConnection();


        $sql = "UPDATE users SET email = :email WHERE id = :id";
//        $sql = "UPDATE users SET name = :name, password = :password, email = :email  WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);

        return $result->execute();
    }

//------------------------------------------------------------------------------------------







    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        var_dump($user);
        if ($user) {
            return $user['id'];
        }
        return false;
    }


    public static function checkSatatus($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->execute();

        $userData = $result->fetch();
        if ($userData['status'] == 1) {
            return true;
        }
        return false;
    }




    public static function getUserByEmail($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
//        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $userData = $result->fetch();
        if ($userData) {
            return $userData;
        }

        return false;
    }





    public static function confirmLinkThroughEmailToken($email, $token)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);;
        $result->execute();

        $userData = $result->fetch();
        if ($userData['token'] == $token) {
            return true;
        }
        return false;
    }





    public static function changeStatus($email){
        $db = Db::getConnection();

        $sql = 'UPDATE users SET status=1 WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
    }




    public static function sendPasswordToEmail($userData){
        $to = $userData['email'];
        $subject = 'Change password!';
        $message = 'Your password: '.$userData['password'];
        $headers = 'From: osokoliu@gmail.com' . "\r\n" .
            'Reply-To: osokoliu@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if(mail($to, $subject, $message, $headers)){
            return true;
        }

        return false;
    }


    public static function sendLinkConfirmToEmail($email, $token){
        $to = $email;
        $subject = 'Confirm registration';
        $message = 'Your link confirm: http://localhost:8080/confirm/?email='.$email.'&token='.$token;
        $headers = 'From: osokoliu@gmail.com' . "\r\n" .
            'Reply-To: osokoliu@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

//        var_dump($to)."/n";
//        var_dump($message);
        if(mail($to, $subject, $message, $headers)){
            return true;
        }
        else
            return false;

    }






    public static function auth($userId)
    {
        $_SESSION['userId'] = $userId;
    }
//
//    public static function checkLogged()
//    {
//        // Если сессия есть, вернем идентификатор пользователя
//        if (isset($_SESSION['user'])) {
//            return $_SESSION['user'];
//        }
//
//        header("Location: login");
//    }
//
//    public static function isGuest()
//    {
//        if (isset($_SESSION['userId'])) {
//            return false;
//        }
//        return true;
//    }





    public static function checkName($name){
        if (strlen($name) >=2){
            return true;
        }
        return false;
    }


    public static function checkPassword($password){
        if (strlen($password) >=6){
            return true;
        }
        return false;
    }

    public static function checkEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }










    public static function checkEmailExists($email){
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;

    }



    public static function getUserById($id){
        if ($id){
            $db = Db::getConnection();
            $sql = 'SELECT * FROM users WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            //Указываем что хоти получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }


}
?>