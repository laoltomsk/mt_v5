<?php
require_once("model.php");

class NewsModel extends Model {
    public function getData($db, $category = '', $tag = '', $from = infinity, $offset = 0, $onpage = newsOnPage) {
        $news = array();

        $category = mysqli_real_escape_string($db, $category);
        $tag = mysqli_real_escape_string($db, $tag);

        $categoryFilter = '';
        if ($category !== '') {
            $categoryFilter = "AND `tb_uri`.`category` = '$category'";
        }
        if ($tag === '') {
            $queryResults = $db->query("SELECT * FROM `tb_uri`
              LEFT JOIN `tb_pages_viewed` ON `tb_uri`.`uri` = `tb_pages_viewed`.`uri`
              WHERE `tb_uri`.`uri` < {$from} ".$categoryFilter."
              ORDER BY `tb_uri`.`uri` DESC LIMIT {$offset}, {$onpage}");
        }
        else {
            $queryResults = $db->query("SELECT * FROM `tb_uri`
              LEFT JOIN `tb_pages_viewed` ON `tb_uri`.`uri` = `tb_pages_viewed`.`uri`
              INNER JOIN `tb_pages` ON `tb_uri`.`id` = `tb_pages`.`uri_id`
              INNER JOIN `tb_tag` ON `tb_pages`.`tag_id` = `tb_tag`.`id` AND `tb_tag`.`name` = '{$tag}'
              WHERE `tb_uri`.`uri` < {$from} ".$categoryFilter."
              ORDER BY `tb_uri`.`uri` DESC LIMIT {$offset}, {$onpage}");
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