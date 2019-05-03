<?php
require_once("model.php");

class UserModel extends Model {
    public function getData($db, $login = '', $password = '') {
        $login = mysqli_real_escape_string($db, $login);
        $password = mysqli_real_escape_string($db, $password);

        $passwordHash = customHash($password, $login);

        $queryResults = $db->query("SELECT * FROM `users`
              WHERE `login` = '$login' AND `password` = '$passwordHash'");

        if ($queryResult = $queryResults->fetch_array()) {
            return true;
        }
        return false;
    }
}