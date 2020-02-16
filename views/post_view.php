<?php
require_once("view.php");

class PostView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader($data['post']['title'], $data['post']['lead'], $data['post']['category'], $data['post']['pic'], true, $data['ads']);
        ?><div id="post">

            <h2><?php echo $data['post']['title']?></h2>
            <p><?php echo date("d.m.Y H:i", $data['post']['id']) ?></p>
            <p>Категория: <?php echo $data['post']['category'] ?></p>
            <?php echo $data['post']['text'] ?>
            <p>По материалам <?php echo $data['post']['src'] ?></p>
            <p>(C) <?php echo $data['post']['author'] ?></p>
            <p>Теги:
            <?php for ($i = 0; $i < count($data['post']['tags']); $i++) {
                echo "<a href='/".$data['post']['category']."/".$data['post']['tags'][$i]."'>".$data['post']['tags'][$i]."</a>";
                if ($i != count($data['post']['tags'])-1) {
                    echo ", ";
                };
            } ?>
            </p>
            <?php if (checkAdmin()) { ?>
                <a href="/postdelete_<?php echo $data['post']['id'] ?>.html">Удалить</a><br>
                <a href="/postedit_<?php echo $data['post']['id'] ?>.html">Редактировать</a>
            <?php } ?>
        <script>
            AddView(<?php echo $data['post']['id'] ?>);
        </script>
        </div>
        <?php
        $this->template->getFooter($data['ads']);
    }
}