<?php
require_once("template.php");

class PCTemplate extends Template {
    public function getHeader($title, $description, $category, $pic, $isArticle, $ads) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title><?php echo $title ?></title>

            <meta charset="UTF-8">
            <meta property="og:title" content="<?php echo $title ?>"/>
            <meta property="og:image" content="<?php echo $pic ?>" />
            <meta property="og:image:secure_url" content="<?php echo $pic ?>" />
            <?php if ($isArticle) { ?><meta property="og:type" content="article"/><?php } ?>
            <meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>"/>
            <meta property="og:locale" content="ru_RU"/>
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
            <meta name="viewport" content="width=device-width">
            <meta name="keywords" content="<?php echo siteKeyWords ?>">
            <meta name="robots" content="index,follow">
            <meta name="google-site-verification" content="UDX_nuGeNzWBLXRAwO_a5dCVRSMTXIYW1E_BelG9a24" />
            <meta name="theme-color" content="#1180aa">
            <meta name="msapplication-navbutton-color" content="#1180aa">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="#1180aa">
            <link rel="icon" type="image/x-icon" href="/assets/pc/favicon.ico">
            <link rel="shortcut icon" type="image/x-icon" href="/assets/pc/favicon.ico" />
            <link rel="icon" sizes="192x192" href="/assets/pc/touch-icon-192x192.png">
            <link rel="apple-touch-icon-precomposed" sizes="180x180" href="/assets/pc/apple-touch-icon-180x180-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/assets/pc/apple-touch-icon-152x152-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/pc/apple-touch-icon-144x144-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/assets/pc/apple-touch-icon-120x120-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/pc/apple-touch-icon-114x114-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/assets/pc/apple-touch-icon-76x76-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/pc/apple-touch-icon-72x72-precomposed.png">
            <link rel="apple-touch-icon-precomposed" href="/assets/pc/apple-touch-icon-precomposed.png">
            <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext" rel="stylesheet">
            <link rel="stylesheet" href="/styles/style.css">
            <link rel="stylesheet" href="/styles/sitemap_style.css">

            <script src="/scripts/scripts.js"></script>
        </head>
        <body>
        <?php if ($ads['branding']) { ?>
            <style>
                #main-wrapper {
                    margin-top: 178px;
                }

                #aroundPage {
                    background-image: url("/photo/rek/branding/<?php echo $ads['branding']->id ?>_1280.jpg");
                    background-color: <?php echo $ads['branding']->color ?>;
                }

                @media (min-width: 1281px) {
                    #aroundPage {
                        background-image: url("/photo/rek/branding/<?php echo $ads['branding']->id ?>_1440.jpg");
                    }
                }

                @media (min-width: 1681px) {
                    #aroundPage {
                        background-image: url("/photo/rek/branding/<?php echo $ads['branding']->id ?>_1920.jpg");
                    }
                }
            </style>
            <div id="aroundPage">
                <?php $sep = strpos($ads['branding']->link, "?") === false ? "?" : "&"; ?>
                <a href="<?php echo $ads['branding']->link.$sep."rnd=".rand(0, infinity) ?>" target="blank_">
                    <?php if ($ads['branding']->pixel != "") {
                        $sep = strpos($ads['branding']->pixel, "?") === false ? "?" : "&"; ?>
                        <img src="<?php echo $ads['branding']->pixel.$sep."rnd=".rand(0, infinity) ?>"
                    <?php } ?>
                </a>
            </div>
        <?php } ?>
        <div id="main-wrapper">
            <header>
                <div class="social_btns">
                    <span class="social_btn" id="youtube_btn">YT</span>
                    <span class="social_btn" id="telegram_btn">TG</span>
                    <span class="social_btn" id="vk_btn">VK</span>
                    <span class="social_btn" id="instagram_btn">IG</span>
                    <span class="social_btn" id="facebook_btn">FB</span>
                    <span class="social_btn" id="twitter_btn">TW</span>
                </div>
                <div class="logo">
                    <a href="/"><img src="/assets/pc/logo.png" alt="mobiltelefon.ru logo"></a>
                </div>
                <div class="grayline">
                    <div class="categories">
                        <a href="/contents_main_0.html" class="category">Новости</a>
                        <a href="/contents_obzor_0.html" class="category">Обзоры</a>
                        <a href="/contents_blog_0.html" class="category">Статьи</a>
                        <a href="#" class="category inactive">Каталог</a>
                        <a href="#" class="category inactive">Видео</a>
                        <a href="#" class="category tag">#mwc2019</a>
                    </div>
                    <div class="searchfield">
                        <input>
                    </div>
                </div>
            </header>
            <div id="main-content">
        <?php
    }

    public function getFooter($ads)
    {
        ?>
            </div>
            <div id="right_column">
                <a id="sendtip" href="/sendtip.html">Прислать материал</a>
                <a id="right_banner" href="#">
                    <img src="https://mobiltelefon.ru/photo/rek/15_banners_260x500.jpg">
                </a>
                <h1>Видео</h1>
                <div class="videoblock" onclick="Redirect('https://youtu.be/I8lkWNgLfmc')">
                    <div class="thumbnail">
                        <img src="http://i.ytimg.com/vi/I8lkWNgLfmc/maxresdefault.jpg">
                    </div>
                    <h2>Какое-то рандомное видео</h2>
                </div>
                <div class="videoblock" onclick="Redirect('https://youtu.be/dqs_W-eAneQ')">
                    <div class="thumbnail">
                        <img src="http://i.ytimg.com/vi/dqs_W-eAneQ/maxresdefault.jpg">
                    </div>
                    <h2>Видео с длинным названием, которое займёт не одну и не две строчки</h2>
                </div>
                <div class="videoblock" onclick="Redirect('https://youtu.be/Bu9qRSMaGsc')">
                    <div class="thumbnail">
                        <img src="http://i.ytimg.com/vi/Bu9qRSMaGsc/maxresdefault.jpg">
                    </div>
                    <h2>Видос о ксяоми</h2>
                </div>
                <a id="subscription" href="https://www.youtube.com/subscription_center?add_user=mobiltelefonru">Подписаться</a>
                <a id="morevids" href="https://www.youtube.com/user/mobiltelefonru/videos">Больше видео</a>
            </div>
        </div>
        </body>
        </html>
        <?php
    }

    public function printNewsCard($news)
    {
        ?>
        <section data-id="<?php print $news['id'] ?>" class="block_news" onclick="Redirect('/post_<?php print $news['id']?>.html')">
            <div class="thumbnail">
                <img src="<?php print $news['pic'] ?>">
            </div>
            <h2><a href="/post_<?php print $news['id'] ?>.html"><?php print $news['title'] ?></a></h2>
            <div class="counts">
                <span class="eye"><-></span> <?php print $news['views'] ?>
                <span class="clock">Ф</span> <?php print date("d.m.Y H:i", $news['id']) ?>
            </div>
            <p><?php print $news['lead'] ?></p>
        </section>
        <?php
    }
}