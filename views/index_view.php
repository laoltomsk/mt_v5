<?php
require_once("view.php");

class IndexView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader();

        for ($i = 0; $i < count($data['news']); $i++) {
            ?>
            <h3><?php print $data['news'][$i]['title'] ?></h3>
            <p><?php print $data['news'][$i]['lead'] ?></p>
            <img src="<?php print $data['news'][$i]['pic'] ?>">
            <p>Views: <?php print $data['news'][$i]['views'] ?></p>
            <br><br>
            <?php
        }

        $this->template->getFooter();
    }
}