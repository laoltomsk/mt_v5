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

        $rekInfo = json_decode($db->query("SELECT * FROM `ads`")->fetch_array()['json']);
        if (count($rekInfo->branding) > 0) {
            $brandingNum = rand(0, count($rekInfo->branding)-1);
            $ads['branding'] = $rekInfo->branding[$brandingNum];
        }
        else {
            $ads['branding'] = false;
        }
        if (count($rekInfo->mobileBranding) > 0) {
            $brandingNum = rand(0, count($rekInfo->mobileBranding)-1);
            $ads['mobileBranding'] = $rekInfo->mobileBranding[$brandingNum];
        }
        else {
            $ads['mobileBranding'] = false;
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
        return false;
    }

    public function addBranding($db, $id, $pic1280, $pic1440, $pic1920, $link, $pixel, $color) {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            move_uploaded_file($pic1280["tmp_name"], "../photo/rek/branding/{$id}_1280.jpg");
            move_uploaded_file($pic1440["tmp_name"], "../photo/rek/branding/{$id}_1440.jpg");
            move_uploaded_file($pic1920["tmp_name"], "../photo/rek/branding/{$id}_1920.jpg");

            $newBranding = new stdClass();
            $newBranding->id = $id;
            $newBranding->link = $link;
            $newBranding->pixel = $pixel;
            $newBranding->color = $color;

            $rekInfo = json_decode($db->query("SELECT * FROM `ads`")->fetch_array()['json']);
            $rekInfo->branding[] = $newBranding;
            $rekInfo = json_encode($rekInfo);
            $db->query("UPDATE `ads` SET `json` = '{$rekInfo}'");

            return true;
        }
        return false;
    }

    public function removeBranding($db, $id) {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            unlink("../photo/rek/branding/{$id}_1280.jpg");
            unlink("../photo/rek/branding/{$id}_1440.jpg");
            unlink("../photo/rek/branding/{$id}_1920.jpg");

            $rekInfo = json_decode($db->query("SELECT * FROM `ads`")->fetch_array()['json']);
            $newBrandingInfo = [];
            for ($i = 0; $i < count($rekInfo->branding); $i++) {
                if ($rekInfo->branding[$i]->id != $id)
                    $newBrandingInfo[] = $rekInfo->branding[$i];
            }
            $rekInfo->branding = $newBrandingInfo;
            $rekInfo = json_encode($rekInfo);
            $db->query("UPDATE `ads` SET `json` = '{$rekInfo}'");

            return true;
        }
        return false;
    }

    public function getAllBrandings($db) {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            $rekInfo = json_decode($db->query("SELECT * FROM `ads`")->fetch_array()['json']);
            return $rekInfo->branding;
        }
        return false;
    }

    public function addMobileBranding($db, $id, $pic761, $link, $pixel, $color) {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            move_uploaded_file($pic761["tmp_name"], "../photo/rek/branding/{$id}_761.jpg");

            $newBranding = new stdClass();
            $newBranding->id = $id;
            $newBranding->link = $link;
            $newBranding->pixel = $pixel;
            $newBranding->color = $color;

            $rekInfo = json_decode($db->query("SELECT * FROM `ads`")->fetch_array()['json']);
            $rekInfo->mobileBranding[] = $newBranding;
            $rekInfo = json_encode($rekInfo);
            $db->query("UPDATE `ads` SET `json` = '{$rekInfo}'");

            return true;
        }
        return false;
    }

    public function removeMobileBranding($db, $id) {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            unlink("../photo/rek/branding/{$id}_761.jpg");

            $rekInfo = json_decode($db->query("SELECT * FROM `ads`")->fetch_array()['json']);
            $newBrandingInfo = [];
            for ($i = 0; $i < count($rekInfo->mobileBranding); $i++) {
                if ($rekInfo->mobileBranding[$i]->id != $id)
                    $newBrandingInfo[] = $rekInfo->mobileBranding[$i];
            }
            $rekInfo->mobileBranding = $newBrandingInfo;
            $rekInfo = json_encode($rekInfo);
            $db->query("UPDATE `ads` SET `json` = '{$rekInfo}'");

            return true;
        }
        return false;
    }

    public function getAllMobileBrandings($db) {
        if ($_SESSION['user'] === 'mtnews' && $_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            $rekInfo = json_decode($db->query("SELECT * FROM `ads`")->fetch_array()['json']);
            return $rekInfo->mobileBranding;
        }
        return false;
    }
}