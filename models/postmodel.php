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

    public function setData($db, $title, $category, $text, $lead, $pic, $author, $src, $tags, $id = 0)
    {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            $id = $id * 1;

            $title = mysqli_real_escape_string($db, $title);
            $category = mysqli_real_escape_string($db, $category);
            $text = mysqli_real_escape_string($db, $text);
            $lead = mysqli_real_escape_string($db, $lead);
            $pic = mysqli_real_escape_string($db, $pic);
            $author = mysqli_real_escape_string($db, $author);
            $src = mysqli_real_escape_string($db, $src);
            $tags = mysqli_real_escape_string($db, $tags);

            $dateReg = date("Y-m-d H:i:s");

            if ($id == 0) {
                $id = time();
                $timeString = date("Y-m-d H:i:s", $id);
                $db->query("INSERT INTO `tb_uri` (`title`, `date_reg`, `category`, `uri`, `text`, `lead`,
                 `pic`, `author`, `src`) VALUES ('$title', '$dateReg', '$category', '$id', '$text', '$lead',
                 '$pic', '$author', '$src')");
                $dbUriId = $db->insert_id;

                $db->query("INSERT INTO `tb_pages_viewed` (`uri`, `date_reg`, `date_upd`, `cnt_view`)
                  VALUES ('$id', '$dateReg', '$dateReg', 0)");

                $tags = explode(", ", $tags);
                for ($i = 0; $i < count($tags); $i++) {
                    $tagsFound = $db->query("SELECT * FROM `tb_tag` WHERE `name` = '{$tags[$i]}'");

                    if ($tagFound = $tagsFound->fetch_array()) {
                        $dbTagId = $tagFound['id'];
                    } else {
                        $db->query("INSERT INTO `tb_tag` (`name`) VALUES ('{$tags[$i]}')");
                        $dbTagId = $db->insert_id;
                    }

                    $db->query("INSERT INTO `tb_pages` (`tag_id`, `uri_id`, `date_post`, `date_reg`)
                      VALUES ($dbTagId, $dbUriId, '$timeString', '$dateReg')");
                }
            } else {
                $timeString = date("Y-m-d H:i:s", $id);
                $db->query("UPDATE `tb_uri` SET `title` = '$title', `category` = '$category', `text` = '$text',
                  `lead` = '$lead', `pic` = '$pic', `author` = '$author', `src` = '$src' WHERE `uri` = $id");
                $dbUriId = $db->insert_id;

                $tags = explode(", ", $tags);
                $db->query("DELETE * FROM `tb_pages` WHERE `uri_id` = $dbUriId");
                for ($i = 0; $i < count($tags); $i++) {
                    $tagsFound = $db->query("SELECT * FROM `tb_tag` WHERE `name` = '{$tags[$i]}'");

                    if ($tagFound = $tagsFound->fetch_array()) {
                        $dbTagId = $tagFound['id'];
                    } else {
                        $db->query("INSERT INTO `tb_tag` (`name`) VALUES ('{$tags[$i]}')");
                        $dbTagId = $db->insert_id;
                    }

                    $db->query("INSERT INTO `tb_pages` (`tag_id`, `uri_id`, `date_post`, `date_reg`)
                      VALUES ($dbTagId, $dbUriId, '$timeString', '$dateReg')");
                }
            }
            return $id;
        }
        return false;
    }

    public function deleteData($db, $id = 0)
    {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            $id = $id * 1;

            $queryResults = $db->query("SELECT * FROM `tb_uri` WHERE `uri` = '$id'");
            if ($queryResult = $queryResults->fetch_array()) {
                $dbUriId = $queryResult['id'];
                $db->query("DELETE FROM `tb_pages` WHERE `uri_id` = $dbUriId");
                $db->query("DELETE FROM `tb_uri` WHERE `uri` = '$id'");
                $db->query("DELETE FROM `tb_pages_viewed` WHERE `uri` = '$id'");
                return true;
            }
            return false;
        }
        return false;
    }

    public function addView($db, $id) {
        $id = $id * 1;

        $db->query("UPDATE `tb_pages_viewed` SET `cnt_view` = `cnt_view`+1 WHERE `uri` = '$id'");
    }
}