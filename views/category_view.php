<?php
require_once("view.php");

class CategoryView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader("Мобильный телефон: ".getRussianCategoryName($data['category']), siteDescription, $data['category'], siteLogo, false);
        ?>
        <?php if ($this->template instanceof PCTemplate)
            print "<h1>".getRussianCategoryName($data['category'])."</h1>" ?>
        <div id="list_news"><?php
            for ($i = 0; $i < count($data['news']); $i++) {
                $this->template->printNewsCard($data['news'][$i]);

            }
            ?>
        </div>
        <?php
        if ($this->template instanceof MobileTemplate) {
            ?>
            <div id="btn_dload" class="btn_dload loadMoreButton" onclick="LoadMoreFromCategory(<?php echo end($data['news'])['id'] ?>, '<?php echo $data['category'] ?>');">
                <img src="/assets/mobile/e.gif" alt="" /><br />
            </div>
            <?php
        } else {
            ?>
            <button id="load_more" class="loadMoreButton" onclick="LoadMoreFromCategory(<?php echo end($data['news'])['id'] ?>, '<?php echo $data['category'] ?>')">Больше материалов</button>
            <?php
        }
        $this->template->getFooter();
    }
}