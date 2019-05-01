<?php
require_once("model.php");

class NewsModel extends Model {
    public function getData($db) {
        $news = array();
        $queryResults = $db->query("SELECT * FROM `tb_uri` LEFT JOIN `tb_pages_viewed` ON `tb_uri`.`uri` = `tb_pages_viewed`.`uri` ORDER BY `tb_uri`.`uri` DESC LIMIT 0, 50");
        while ($queryResult = $queryResults->fetch_array()) {
            $news[] = array(
                'title' => $queryResult['title'],
                'category' => $queryResult['category'],
                'id' => $queryResult['id'],
                'text' => $queryResult['text'],
                'lead' => $queryResult['lead'],
                'pic' => $queryResult['pic'],
                'views' => $queryResult['cnt_view']
            );
        }
        return $news;
    }
}