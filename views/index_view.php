<?php
require_once("view.php");

class IndexView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader(siteTitle, siteDescription, '', siteLogo, false);
        if ($this->template instanceof MobileTemplate) {
            ?>
            <!--lots of code by Gleb Panteleev-->
            <div class='list_news_mpp w-slider'>
                <div class="m-subhead-block top">
                    <div class="data"><img src="/assets/mobile/e.gif" alt="" /><p> ТОП материалы</p></div>
                </div>
                <div class="owl-carousel owl-theme">
                    <?php for ($i = 0; $i < count($data['ads']['top3']); $i++) { ?>
                    <section id="bn<?php echo $i?>" class="item block_news" onclick="url_loc='https://mobiltelefon.ru/<?php echo $data['ads']['top3'][$i]['id'] ?>'; setTimeout('auto_loc()', 50);" style="width: 715px;">
                        <div class="cell">
                            <div id="bn<?php echo $i?>mpp" class="mpp" style="background-image: url('<?php echo $data['ads']['top3'][$i]['pic'] ?>'); background-size: cover; background-position: center;"><a href="/post_<?php echo $data['ads']['top3'][$i]['id'] ?>.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_<?php echo $data['ads']['top3'][$i]['id'] ?>.html';"><img class="config" src="/assets/mobile/e_cmpp.png" alt="" /></a></div>
                        </div>
                        <div class="cell">
                            <h2><a href="/post_<?php echo $data['ads']['top3'][$i]['id'] ?>.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_<?php echo $data['ads']['top3'][$i]['id'] ?>.html';"><?php echo $data['ads']['top3'][$i]['title'] ?></a></h2>
                            <p class="line2"><?php echo date("d.m.Y H:i", $data['ads']['top3'][$i]['id']); ?>&nbsp;|&nbsp;<img class="cnt_viewed_" src="/assets/mobile/beye2.svg" alt="" />&nbsp;<?php echo $data['ads']['top3'][$i]['views'] ?> |&nbsp;<a href="/post_<?php echo $data['ads']['top3'][$i]['id'] ?>.html#mc-container" class="mc-counter" onclick="url_loc0 = url_loc2='https://mobiltelefon.ru/post_<?php echo $data['ads']['top3'][$i]['id'] ?>.html#mc-container'; setTimeout('auto_loc()', 50);"><img class="cnt_commented_" src="/assets/mobile/bcmnt.svg" alt="" />&nbsp;-&nbsp;</a></p>
                        </div>
                    </section>
                    <?php } ?>
                </div>
            </div>
            <div class='m-subhead-block last'>
                <div class='data'><img src='/assets/mobile/e.gif' alt='' /><p> Последние материалы</p></div>
            </div>
            <div id="list_news"><?php
                for ($i = 0; $i < count($data['news']); $i++) {
                    $this->template->printNewsCard($data['news'][$i]);
                }
            ?>
            </div>
            <div id="btn_dload" class="btn_dload loadMoreButton" onclick="LoadMoreFromIndexPage(<?php echo end($data['news'])['id'] ?>);">
                <img src="/assets/mobile/e.gif" alt="" /><br />
            </div>
            <?php }
            else {
                ?>
                <h1>Топ-материалы</h1>
                <div class="top_blocks">
                    <?php for ($i = 0; $i < count($data['ads']['top3']); $i++) { ?>
                        <div class="top_block" onclick="Redirect('/post_<?php echo $data['ads']['top3'][$i]['id'] ?>.html')">
                            <div class="thumbnail">
                                <img src="<?php echo $data['ads']['top3'][$i]['pic'] ?>">
                            </div>
                            <h2><?php echo $data['ads']['top3'][$i]['title'] ?></h2>
                        </div>
                    <?php }
                    for ($i = 0; $i < count($data['ads']['top3']); $i++) { ?>
                        <div class="top_block">
                            <div class="counts">
                                <span class="eye"><-></span> <?php echo $data['ads']['top3'][$i]['views'] ?> <span class="clock">Ф</span> <?php echo date("H:i d.m.Y", $data['ads']['top3'][$i]['id']); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- блоки с счётчиками вынесены отдельно, т.к. должны выравниваться по нижнему краю, а без флекса это иначе не сделать -->
                </div>
                <h1>Все материалы</h1>
                <div id="list_news"><?php
                    for ($i = 0; $i < count($data['news']); $i++) {
                        $this->template->printNewsCard($data['news'][$i]);
                    }
                    ?>
                </div>
                <button id="load_more" class="loadMoreButton" onclick="LoadMoreFromIndexPage(<?php echo end($data['news'])['id'] ?>)">Больше материалов</button>
                <?php
            }
        $this->template->getFooter();
    }
}