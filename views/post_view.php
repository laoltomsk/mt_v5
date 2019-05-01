<?php
require_once("view.php");

class PostView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader();
        ?><div id="post">

            <h2><?php echo $data['post']['title']?></h2>
            <p><?php echo date("d.m.Y H:i", $data['post']['id']) ?></p>
            <p>Категория: <?php echo $data['post']['category'] ?></p>
            <?php echo $data['post']['text'] ?>
            <p>По материалам <?php echo $data['post']['src'] ?></p>
            <p>(C) <?php echo $data['post']['author'] ?></p>
            <p>Теги:
            <?php for ($i = 0; $i < count($data['post']['tags']); $i++) {
                echo $data['post']['tags'][$i];
                if ($i != count($data['post']['tags'])-1) {
                    echo ", ";
                };
            } ?>
            </p>
            <p></p>
        <?php
        $this->template->getFooter();
    }
}