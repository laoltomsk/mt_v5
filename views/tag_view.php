<?php
require_once("view.php");

class TagView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Mobiltelefon.ru: ".getRussianCategoryName($data['category'])." по тегу ".$data['tag'], siteDescription, $data['category'], siteLogo, false);
        ?>
        <?php if ($this->template instanceof PCTemplate)
            print "<h1>".getRussianCategoryName($data['category'])." по тегу ".$data['tag']."</h1>" ?>
        <div id="list_news"><?php
            for ($i = 0; $i < count($data['news']); $i++) {
                $this->template->printNewsCard($data['news'][$i]);
            }
            ?>
        </div>
        <?php
        if ($this->template instanceof MobileTemplate) {
            ?>
            <div id="btn_dload" class="btn_dload loadMoreButton" onclick="LoadMoreByTag(<?php echo end($data['news'])['id'] ?>, '<?php echo $data['category'] ?>', '<?php echo $data['tag'] ?>');">
                <img src="/assets/mobile/e.gif" alt="" /><br />
            </div>
            <?php
        } else {
            ?>
            <button id="load_more" class="loadMoreButton" onclick="LoadMoreByTag(<?php echo end($data['news'])['id'] ?>, '<?php echo $data['category'] ?>', '<?php echo $data['tag'] ?>')">Больше материалов</button>
            <?php
        }
        $this->template->getFooter();
    }
}