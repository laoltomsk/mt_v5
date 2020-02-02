<?php
require_once("view.php");

class TipsView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Mobiltelefon.ru: присланные новости", siteDescription, '', siteLogo, false, $data['ads']);
        ?><?php
        for ($i = 0; $i < count($data['tips']); $i++) {
            ?>
            <p><?php print $data['tips'][$i]['tip'] ?></p>
            <p>Канал связи: <?php print $data['tips'][$i]['contact'] ?></p>
            <a href="/tipdelete_<?php print $data['tips'][$i]['id'] ?>.html">Удалить</a>
            <br><br>
            <?php
        }
        $this->template->getFooter($data['ads']);
    }
}