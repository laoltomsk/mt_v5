<?php
require_once("view.php");

class IndexView extends View {
    public function show($data) {
        $this->checkMobile();

        $this->template->getHeader(siteTitle, siteDescription, '', siteLogo, false);
        if ($this->template instanceof MobileTemplate) {
            ?>
            <div class='list_news_mpp w-slider'>
                <div class="m-subhead-block top">
                    <div class="data"><img src="/assets/mobile/e.gif" alt="" /><p> ТОП материалы</p></div>
                </div>
                <div class="owl-carousel owl-theme">
                    <section id="bn0" class="item block_news" onclick="url_loc='https://mobiltelefon.ru/post_1556798020.html'; setTimeout('auto_loc()', 50);" style="width: 715px;">
                        <div class="cell">
                            <div id="bn0mpp" class="mpp" style="background-image: url('https://mobiltelefon.ru/photo/may19/03/a50.jpg'); background-size: cover; background-position: center;"><a href="/post_1556798020.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_1556798020.html';"><img class="config" src="/assets/mobile/e_cmpp.png" alt="" /></a></div>
                        </div>
                        <div class="cell">
                            <h2><a href="/post_1556798020.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_1556798020.html';">Samsung Galaxy A50 получил большой апдейт для камеры</a></h2>                              <p class="line2">2&nbsp;мая&nbsp;2019, 14:53&nbsp;|&nbsp;<img class="cnt_viewed_" src="/assets/mobile/beye2.svg" alt="" />&nbsp;9960&nbsp;|&nbsp;<a href="/post_1556798020.html#mc-container" class="mc-counter" onclick="url_loc0 = url_loc2='https://mobiltelefon.ru/post_1556798020.html#mc-container'; setTimeout('auto_loc()', 50);"><img class="cnt_commented_" src="/assets/mobile/bcmnt.svg" alt="" />&nbsp;-&nbsp;</a></p>
                        </div>
                    </section>
                    <section id="bn1" class="item block_news" onclick="url_loc='https://mobiltelefon.ru/post_1556787730.html'; setTimeout('auto_loc()', 50);" style="width: 715px;">
                        <div class="cell">
                            <div id="bn1mpp" class="mpp" style="background-image: url('https://mobiltelefon.ru/photo/may19/03/psmart.jpg'); background-size: cover; background-position: center;"><a href="/post_1556787730.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_1556787730.html';"><img class="config" src="/assets/mobile/e_cmpp.png" alt="" /></a></div>
                        </div>
                        <div class="cell">
                            <h2><a href="/post_1556787730.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_1556787730.html';">Huawei P Smart 2019 за 8890 рублей в МТС</a></h2>                              <p class="line2">2&nbsp;мая&nbsp;2019, 12:02&nbsp;|&nbsp;<img class="cnt_viewed_" src="/assets/mobile/beye2.svg" alt="" />&nbsp;7375&nbsp;|&nbsp;<a href="/post_1556787730.html#mc-container" class="mc-counter" onclick="url_loc0 = url_loc2='https://mobiltelefon.ru/post_1556787730.html#mc-container'; setTimeout('auto_loc()', 50);"><img class="cnt_commented_" src="/assets/mobile/bcmnt.svg" alt="" />&nbsp;-&nbsp;</a></p>
                        </div>
                    </section>
                    <section id="bn2" class="item block_news" onclick="url_loc='https://mobiltelefon.ru/post_1556795224.html'; setTimeout('auto_loc()', 50);" style="width: 715px;">
                        <div class="cell">
                            <div id="bn2mpp" class="mpp" style="background-image: url('https://mobiltelefon.ru/photo/may19/03/3axl.jpg'); background-size: cover; background-position: center;"><a href="/post_1556795224.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_1556795224.html';"><img class="config" src="/assets/mobile/e_cmpp.png" alt="" /></a></div>
                        </div>
                        <div class="cell">
                            <h2><a href="/post_1556795224.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_1556795224.html';">Новые данные о цене Google Pixel 3a и 3a XL и причем здесь Nexus 5X</a></h2>                              <p class="line2">2&nbsp;мая&nbsp;2019, 14:07&nbsp;|&nbsp;<img class="cnt_viewed_" src="/assets/mobile/beye2.svg" alt="" />&nbsp;3583&nbsp;|&nbsp;<a href="/post_1556795224.html#mc-container" class="mc-counter" onclick="url_loc0 = url_loc2='https://mobiltelefon.ru/post_1556795224.html#mc-container'; setTimeout('auto_loc()', 50);"><img class="cnt_commented_" src="/assets/mobile/bcmnt.svg" alt="" />&nbsp;-&nbsp;</a></p>
                        </div>
                    </section>
                </div>
            </div>
            <div class='m-subhead-block last'>
                <div class='data'><img src='/assets/mobile/e.gif' alt='' /><p> Последние материалы</p></div>
            </div>
            <?php
        }
        ?><div id="list_news"><?php
            for ($i = 0; $i < count($data['news']); $i++) {
                ?>
                <h3 data-id="<?php print $data['news'][$i]['id'] ?>"><?php print $data['news'][$i]['title'] ?></h3>
                <p><?php print $data['news'][$i]['lead'] ?></p>
                <img src="<?php print $data['news'][$i]['pic'] ?>">
                <p>Views: <?php print $data['news'][$i]['views'] ?></p>
                <a href="/post_<?php print $data['news'][$i]['id'] ?>.html">Читать</a>
                <br><br>
                <?php
            }

            ?>
        </div>
        <button onclick="LoadMoreFromIndexPage(<?php echo end($data['news'])['id'] ?>)">Ещё!</button>
        <?php
        $this->template->getFooter();
    }
}