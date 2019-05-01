<?php
require_once("model.php");

class NewsModel extends Model {
    public function getData($db, $category = '', $tag = '', $from = 999999999999, $page = 0) {
        $news = array();

        $offset = $page * 20;
        $categoryFilter = '';
        if ($category !== '') {
            $categoryFilter = "AND `category` = `$category`";
        }
        if ($tag === '') {
            $queryResults = $db->query("SELECT * FROM `tb_uri`
              LEFT JOIN `tb_pages_viewed` ON `tb_uri`.`uri` = `tb_pages_viewed`.`uri` ".$categoryFilter."
              WHERE `tb_uri`.`uri` < {$from}
              ORDER BY `tb_uri`.`uri` DESC LIMIT {$offset}, 20");
        }
        else {
            $queryResults = $db->query("SELECT * FROM `tb_uri`
              LEFT JOIN `tb_pages_viewed` ON `tb_uri`.`uri` = `tb_pages_viewed`.`uri` ".$categoryFilter."
              INNER JOIN `tb_pages` ON `tb_uri`.`id` = `tb_pages`.`uri_id`
              INNER JOIN `tb_tag` ON `tb_pages`.`tag_id` = `tb_tag`.`id` AND `tb_tag`.`name` = '{$tag}'
              WHERE `tb_uri`.`uri` < {$from}
              ORDER BY `tb_uri`.`uri` DESC LIMIT {$offset}, 20");
        }

        while ($queryResult = $queryResults->fetch_array()) {
            $news[] = array(
                'title' => $queryResult['title'],
                'category' => $queryResult['category'],
                'id' => $queryResult['uri'],
                'text' => $queryResult['text'],
                'lead' => $queryResult['lead'],
                'pic' => $queryResult['pic'],
                'views' => $queryResult['cnt_view']
            );
        }
        return $news;
    }
}