<?php
require_once("model.php");

class PostModel extends Model {
    public function getData($db, $id = 0) {

        $id = $id * 1;

        $queryResults = $db->query("SELECT * FROM `tb_uri`
          INNER JOIN `tb_pages_viewed` ON `tb_uri`.`uri` = `tb_pages_viewed`.`uri`
          INNER JOIN `tb_pages` ON `tb_uri`.`id` = `tb_pages`.`uri_id`
          WHERE `tb_uri`.`uri` = $id");

        if ($queryResult = $queryResults->fetch_array()) {
            $news = array(
                'title' => $queryResult['title'],
                'category' => $queryResult['category'],
                'id' => $queryResult['uri'],
                'text' => $queryResult['text'],
                'lead' => $queryResult['lead'],
                'pic' => $queryResult['pic'],
                'views' => $queryResult['cnt_view'],
                'author' => $queryResult['author'],
                'src' => $queryResult['src'],
                'tags' => Array()
            );

            $queryResults = $db->query("SELECT * FROM `tb_pages` 
              INNER JOIN `tb_tag` ON `tb_pages`.`tag_id` = `tb_tag`.`id`
              AND `tb_pages`.`uri_id` = {$queryResult['uri_id']}");


            while ($queryResult = $queryResults->fetch_array()) {
                $news['tags'][] = $queryResult['name'];
            }
        }
        return $news;
    }
}