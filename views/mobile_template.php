<?php
require_once("template.php");

class MobileTemplate extends Template {
    public function getHeader($title, $description, $category, $pic, $isArticle) {
        ?>
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <title><?php echo $title ?></title>
            <!--lots of code by Gleb Panteleev-->
            <meta charset="UTF-8">
            <meta property="og:title" content="<?php echo $title ?>"/>
            <meta property="og:image" content="<?php echo $pic ?>" />
            <meta property="og:image:secure_url" content="<?php echo $pic ?>" />
            <?php if ($isArticle) { ?><meta property="og:type" content="article"/><?php } ?>
            <meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>"/>
            <meta property="og:locale" content="ru_RU"/>
            <meta content='True' name='HandheldFriendly' />
            <meta content='width=761px; initial-scale=0.50; maximum-scale=0.50;minimum-scale=0.50;' name='viewport' />
            <meta name="viewport" content="width=761px" />
            <meta name="twitter:card" content="summary_large_image"/>
            <meta name="twitter:site" content="@mobiltelefon_ru"/>
            <meta name="twitter:creator" content="@mobiltelefon_ru">
            <meta name="twitter:title" content="<?php echo $title ?>"/>
            <meta name="twitter:description" content="<?php echo $description ?>"/>
            <meta name="twitter:image" content="<?php echo $pic ?>"/>
            <link rel="image_src" href="<?php echo $pic ?>"/>
            <meta property="og:site_name" content="mobiltelefon.ru"/>
            <meta name="description" content="<?php echo $description ?>">
            <meta property="og:description" content="<?php echo $description ?>"/>
            <meta name="keywords" content="<?php echo siteKeyWords ?>">
            <meta name="robots" content="index,follow">
            <meta name="google-site-verification" content="UDX_nuGeNzWBLXRAwO_a5dCVRSMTXIYW1E_BelG9a24" />
            <meta name="theme-color" content="#1180aa">
            <meta name="msapplication-navbutton-color" content="#1180aa">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="#1180aa">
            <link rel="icon" type="image/x-icon" href="/assets/mobile/favicon.ico">
            <link rel="shortcut icon" type="image/x-icon" href="/assets/mobile/favicon.ico" />
            <link rel="icon" sizes="192x192" href="/assets/mobile/touch-icon-192x192.png">
            <link rel="apple-touch-icon-precomposed" sizes="180x180" href="/assets/mobile/apple-touch-icon-180x180-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/assets/mobile/apple-touch-icon-152x152-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/mobile/apple-touch-icon-144x144-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/assets/mobile/apple-touch-icon-120x120-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/mobile/apple-touch-icon-114x114-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/assets/mobile/apple-touch-icon-76x76-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/mobile/apple-touch-icon-72x72-precomposed.png">
            <link rel="apple-touch-icon-precomposed" href="/assets/mobile/apple-touch-icon-precomposed.png">
            <link rel="stylesheet" href="/libs/OwlCarousel2-master/dist/assets/owl.carousel.min.css" type='text/css'/>
            <link rel="stylesheet" href="/libs/OwlCarousel2-master/dist/assets/owl.theme.default.min.css" type='text/css'/>
            <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed&amp;subset=cyrillic,latin' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Roboto:400,300&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
            <link href="/assets/mobile/mf_index_m___highslide.css?t=24" rel="stylesheet">
            <link href="/assets/mobile/mf_stretching_m2.css?t=1" rel="stylesheet">
            <link href="/assets/mobile/index_m_wout_strch.css?t=18" rel="stylesheet">
            <link href="/assets/mobile/mod_m.css?t=18" rel="stylesheet">
            <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script src="/libs/OwlCarousel2-master/dist/owl.carousel.min.js"></script>
            <script type="text/javascript">
                window.jQuery || document.write('<script type="text/javascript" src="/assets/mobile/jquery_1.11.0.min.js"><\/script>');
            </script>
            <script src="/assets/mobile/mf_highslide_m___mt_m.js?t=24"></script>
            <script src="/assets/mobile/ldo.js?t=18"></script>
            <link rel="stylesheet" href="/styles/sitemap_style.css">
            <title>Мобильный телефон: новости и обзоры</title>

            <script src="/scripts/scripts.js"></script>
        </head>
        <body>
		    <div id="main-wrapper">
                <header id="header_mob_mt">
                    <img onclick="set_visible_m_menu(true);" src="/assets/mobile/e.gif" class="emu_a nogalleryimg" alt="Меню" title="Меню"><img class="cnt-plus-mod" src="http://ad.adriver.ru/cgi-bin/rle.cgi?sid=1&bt=21&ad=676844&pid=2884937&bid=6088804&bn=6088804&rnd=74658369" alt="" />
                    <a class="logo" href="/"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Mobiltelefon.ru" title="Mobiltelefon.ru"></a>
                    <img src="/assets/mobile/e.gif" class="emu_a nogalleryimg" alt="">
                </header>
                <div id="shadow100"><span onclick="set_visible_m_menu(false);">&nbsp;</span></div>
                <nav>
                    <ul>
                        <li><a class="main <?php if ($category === "") echo "main_ selected"?>" href="/"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Главная" title="Главная">Главная</a></li>
                        <li><a class="news <?php if ($category === "news") echo "news_ selected"?>" href="/contents_main_0.html"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Новости" title="Новости">Новости</a></li>
                        <li><a class="reviews <?php if ($category === "reviews") echo "reviews_ selected"?>" href="/contents_obzor_0.html"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Обзоры" title="Обзоры">Обзоры</a></li>
                        <li><a class="blog <?php if ($category === "blog") echo "blog_ selected"?>" href="/contents_blog_0.html"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Статьи" title="Статьи">Статьи</a></li>
                        <li><a class="cash-btn" target="_blank" href="http://ad.adriver.ru/cgi-bin/click.cgi?sid=1&bt=2&ad=676844&pid=2884937&bid=6088803&bn=6088803&rnd=74658369"><img src="http://ad.adriver.ru/cgi-bin/rle.cgi?sid=1&bt=21&ad=676844&pid=2884937&bid=6088804&bn=6088804&rnd=74658369" class="nogalleryimg" alt="" /></a></li>
                        <li><a class="yt" rel="nofollow" target="blank_" href="https://www.youtube.com/subscription_center?add_user=mobiltelefonru"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Канал на YouTube" title="Канал на YouTube">YouTube</a></li>
                        <li><a class="vk" rel="nofollow" target="blank_" href="https://vk.com/mobiltelefon_ru"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Группа ВКонтакте" title="Группа ВКонтакте">ВКонтакте</a></li>
                        <li><a class="tg" rel="nofollow" target="blank_" href="https://t.me/mobiltelefonru"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Следить в Telegram" title="Следить в Telegram">Telegram</a></li>
                        <li><a class="tw" rel="nofollow" target="blank_" href="https://twitter.com/mobiltelefon_ru"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Следить в Twitter" title="Следить в Twitter">Twitter</a></li>
                        <li><a class="fb" rel="nofollow" target="blank_" href="https://www.facebook.com/Mobiltelefon.ru"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Подписаться на Facebook" title="Подписаться на Facebook">Facebook</a></li>
                        <li><a class="ins" rel="nofollow" target="blank_" href="https://instagram.com/mobiltelefonru"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Мы в Instagram" title="Мы в Instagram">Instagram</a></li>
                        <li><a rel="nofollow" href="#maincontent">пропустить</a></li>
                    </ul>
                    <p id="footer_nav"><a rel="nofollow" href="/google-search.html?cx=partner-pub-6942085025091392:8495246713&cof=FORID%3A11&ie=windows-1251&q=&sa=%CF%EE%E8%F1%EA"><img src="/assets/mobile/e.gif" class="nogalleryimg" alt="Поиск" title="Поиск">Поиск&nbsp;</a></p>
                </nav>
                <div class="main_content">
			        <a href="http://ad.adriver.ru/cgi-bin/click.cgi?sid=1&bt=2&ad=676844&pid=2884935&bid=6088799&bn=6088799&rnd=1990748742" target="_blank" class="gr-bn">
                        <div class="gr-bn-cell">
                            <div class="gr-bn-content">
                              <img src="/assets/mobile/e.gif" class="gr-bn-ico nogalleryimg" alt="" /><div class="gr-bn-text">VIVO V15 | V15 Pro – ТОП!</div><img src="http://ad.adriver.ru/cgi-bin/rle.cgi?sid=1&bt=21&ad=676844&pid=2884935&bid=6088800&bn=6088800&rnd=131796908" class="gr-bn-px nogalleryimg" alt="" />
                            </div>
                        </div>
                    </a>
        <?php
    }

    public function getFooter()
    {
        ?>
                </div>
                <div class="appendix"></div>
                <footer id="footer_mob_mt">
                    <p>
                        <!-- noindex -->
                        <form class="form_pc" action="./" method="post">
                            <input type="hidden" name="layoutType" value="classic" />
                            <button type="submit">Полная версия</button>
                        </form>
                        <!--/ noindex -->
                    </p>
                    <p class="cpy">&copy; Mobiltelefon.ru, 2006 - 2018</p>
                </footer>
            </div>
        <script type="text/javascript">
            <!--//<![CDATA[
            chk_ncs(true);
            cnt_bns = 38377;
            setTimeout('initial_mpp0(null, true)', 200);	snd_gt_st_pixel(true, false);
            function init_redraw(i){
                if (i < 3){
                    setTimeout('init_redraw('+(i+1)+')', 780);
                }
            }
            init_redraw(0);
            $(document).ready(function () {
                    'use strict';

                    buildOwnC();
                    $(window).resize(buildOwnC());
                }
            );

            //]]>-->
        </script>
        </body>
        </html>
        <?php
    }

    public function printNewsCard($news)
    {
        ?>
        <section data-id="<?php print $news['id'] ?>" class="block_news" onclick="url_loc='https://mobiltelefon.ru/post_<?php print $news['id'] ?>.html'; setTimeout('auto_loc()', 50);">
            <div class="cell">
                <div class="mpp" style="background-image: url('<?php print $news['pic'] ?>'); background-size: cover; background-position: center;"><a href="/post_<?php print $news['id'] ?>.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_<?php print $news['id'] ?>.html';"><img class="config" src="/assets/mobile/e_cmpp.png" alt="" /></a></div>
            </div>
            <div class="cell">
                <h2><a href="/post_<?php print $news['id'] ?>.html" onclick="url_loc0 = 'https://mobiltelefon.ru/post_<?php print $news['id'] ?>.html';"><?php print $news['title'] ?></a></h2>
                <p class="line2"><?php print getRussianCategoryName($news['category']) ?>&nbsp;|&nbsp;<?php echo date("d.m.Y H:i", $news['id']); ?>&nbsp;|&nbsp;<img class="cnt_viewed_" src="/assets/mobile/beye2.svg" alt="" />&nbsp;<?php print $news['views'] ?>&nbsp;|&nbsp;<a href="/post_<?php print $news['id'] ?>.html#mc-container" class="mc-counter" onclick="url_loc0 = url_loc2='https://mobiltelefon.ru/post_<?php print $news['id'] ?>.html#mc-container'; setTimeout('auto_loc()', 50);"><img class="cnt_commented_" src="/assets/mobile/bcmnt.svg" alt="" />&nbsp;-&nbsp;</a></p>
            </div>
        </section>
        <?php
    }
}