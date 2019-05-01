<?php
require_once("view.php");

class CategoryView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader();
        ?><div id="news"><?php
            for ($i = 0; $i < count($data['news']); $i++) {
                ?>
                <h3 data-id="<?php print $data['news'][$i]['id'] ?>"><?php print $data['news'][$i]['title'] ?></h3>
                <p><?php print $data['news'][$i]['lead'] ?></p>
                <img src="<?php print $data['news'][$i]['pic'] ?>">
                <p>Views: <?php print $data['news'][$i]['views'] ?></p>
                <br><br>
                <?php
            }

            ?>
        </div>
        <button onclick="LoadMoreFromCategory(<?php echo end($data['news'])['id'] ?>, '<?php echo $data['category'] ?>')">Ещё!</button>
        <?php
        $this->template->getFooter();
    }
}