<?php
require_once("model.php");

class AdsModel extends Model {
    public function getData($db) {
        $ads = array();
        $ads['top3'] = array();

        $queryResults = $db->query("SELECT * FROM `top3`
              JOIN `tb_uri` ON `tb_uri`.`uri` = `top3`.`uri`
              LEFT JOIN `tb_pages_viewed` ON `tb_uri`.`uri` = `tb_pages_viewed`.`uri`");

        while ($queryResult = $queryResults->fetch_array()) {
            $ads['top3'][] = array(
                'title' => $queryResult['title'],
                'category' => $queryResult['category'],
                'id' => $queryResult['uri'],
                'text' => $queryResult['text'],
                'lead' => $queryResult['lead'],
                'pic' => $queryResult['pic'],
                'views' => $queryResult['cnt_view']
            );
        }

        return $ads;
    }

    public function setTop3($db, $index1, $index2, $index3) {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            $index1 = mysqli_real_escape_string($db, $index1);
            $index2 = mysqli_real_escape_string($db, $index2);
            $index3 = mysqli_real_escape_string($db, $index3);

            $db->query("DELETE FROM `top3`");
            $db->query("INSERT INTO `top3` (`uri`) VALUES ('$index1')");
            $db->query("INSERT INTO `top3` (`uri`) VALUES ('$index2')");
            $db->query("INSERT INTO `top3` (`uri`) VALUES ('$index3')");
            return true;
        }
    }
}