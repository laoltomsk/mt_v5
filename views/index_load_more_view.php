<?php
require_once("view.php");

class IndexLoadMoreView extends View {
    public function show($data) {
        for ($i = 0; $i < count($data['news']); $i++) {
            ?>
            <section data-id="<?php print $data['news'][$i]['id'] ?>" class="block_news" onclick="url_loc='https://mobiltelefon.ru/post_<?php print $data['news'][$i]['id'] ?>.html'; setTimeout('auto_loc()', 50);">
                <div class="cell">
                    <div class="mpp" style="background-image: url('<?php print $data['news'][$i]['pic'] ?>'); background-size: cover; background-position: center;"><a href="/post_<?php print $data['news'][$i]['id'] ?>.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_<?php print $data['news'][$i]['id'] ?>.html';"><img class="config" src="/assets/mobile/e_cmpp.png" alt="" /></a></div>
                </div>
                <div class="cell">
                    <h2><a href="/post_<?php print $data['news'][$i]['id'] ?>.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_<?php print $data['news'][$i]['id'] ?>.html';"><?php print $data['news'][$i]['title'] ?></a></h2>
                    <p class="line2"><?php print getRussianCategoryName($data['news'][$i]['category']) ?>&nbsp;|&nbsp;<?php echo date("d.m.Y H:i", $data['news'][$i]['id']); ?>&nbsp;|&nbsp;<img class="cnt_viewed_" src="/assets/mobile/beye2.svg" alt="" />&nbsp;<?php print $data['news'][$i]['views'] ?>&nbsp;|&nbsp;<a href="/post_<?php print $data['news'][$i]['id'] ?>.html#mc-container" class="mc-counter" onclick="url_loc0 = url_loc2='https://mobiltelefon.ru/post_1557337757.html#mc-container'; setTimeout('auto_loc()', 50);"><img class="cnt_commented_" src="/assets/mobile/bcmnt.svg" alt="" />&nbsp;-&nbsp;</a></p>
                </div>
            </section>
            <?php
        }
    }
}