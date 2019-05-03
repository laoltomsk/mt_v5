<?php
require_once("model.php");

class TipModel extends Model
{
    public function getData($db)
    {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            $tips = array();

            $queryResults = $db->query("SELECT * FROM `tips`");

            while ($queryResult = $queryResults->fetch_array) {
                $tips[] = array(
                    "tip" => $queryResult['tip'],
                    "contact" => $queryResult['contact'],
                    "id" => $queryResult['id']
                );
            }
        }
        return $tips;
    }

    public function setData($db, $tip = "", $contact = "")
    {
        {
            $tip = mysqli_real_escape_string($db, $tip);
            $contact = mysqli_real_escape_string($db, $contact);

            $db->query("INSERT INTO `tips` (`tip`, `contact`) VALUES '$tip', '$contact'");
        }
    }

    public function deleteData($db, $id = 0)
    {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            $id = $id * 1;
            $db->query("DELETE FROM `tips` WHERE `id` = $id");
        }
    }
}