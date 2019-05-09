<?php
require_once("template.php");

class PCTemplate extends Template {
    public function getHeader($title, $description, $category, $pic, $isArticle) {
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

            <script src="/scripts/loadMoreScripts.js"></script>
        </head>
        <body>
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
                <div class="categories">
                    <a href="/contents_main_0.html" class="category">Новости</a>
                    <a href="/contents_obzor_0.html" class="category">Обзоры</a>
                    <a href="/contents_blog_0.html" class="category">Статьи</a>
                    <a href="#" class="category inactive">Каталог</a>
                    <a href="#" class="category inactive">Видео</a>
                    <a href="#" class="category tag">#mwc2019</a>
                    <input>
                </div>
            </header>
        <?php switch ($category) {
            case "news":
                ?> <b>Новости</b> --- <a href="/contents_obzor_0.html">Обзоры</a> --- <a href="/contents_blog_0.html">Статьи</a>
                <?php break;
            case "reviews":
                ?> <a href="/contents_main_0.html">Новости</a> --- <b>Обзоры</b> --- <a href="/contents_blog_0.html">Статьи</a>
                <?php break;
            case "blog":
                ?> <a href="/contents_main_0.html">Новости</a> --- <a href="/contents_obzor_0.html">Обзоры</a> --- <b>Статьи</b>
                <?php break;
            default:
                ?> <a href="/contents_main_0.html">Новости</a> --- <a href="/contents_obzor_0.html">Обзоры</a> --- <a href="/contents_blog_0.html">Статьи</a>
                <?php break;
        }
    }

    public function getFooter()
    {
        ?>
        <p><a href="/sendtip.html">Прислать новость</a></p>
        <p><b>Mobiltelefon.ru, 2019</b></p>
        </div>
        </body>
        </html>
        <?php
    }
}