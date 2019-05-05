<?php
require_once("template.php");

class MobileTemplate extends Template {
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
            <!--<meta name="theme-color" content="#1180aa">
            <meta name="msapplication-navbutton-color" content="#1180aa">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="#1180aa">-->

            <script> //находится здесь временно, до этапа вёрстки
                function LoadMoreFromIndexPage(from) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('get', '/controllers/getMorePosts.php?from='+from)
                    xhr.send();
                    xhr.onload = function() {
                        document.getElementById("news").innerHTML += xhr.responseText;
                        let newsCount = document.getElementsByTagName("h3").length;
                        let id = document.getElementsByTagName("h3")[newsCount-1].getAttribute("data-id");
                        document.getElementsByTagName("button")[0].setAttribute("onclick", "LoadMoreFromIndexPage("+id+")");
                    }
                }

                function LoadMoreFromCategory(from, category) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('get', '/controllers/getMorePostsByCategory.php?from='+from+'&category='+category);
                    xhr.send();
                    xhr.onload = function() {
                        document.getElementById("news").innerHTML += xhr.responseText;
                        let newsCount = document.getElementsByTagName("h3").length;
                        let id = document.getElementsByTagName("h3")[newsCount-1].getAttribute("data-id");
                        document.getElementsByTagName("button")[0].setAttribute("onclick", "LoadMoreFromCategory("+id+",'"+category+"')");
                    }
                }

                function LoadMoreByTag(from, category, tag) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('get', '/controllers/getMorePostsByTag.php?from='+from+'&category='+category+'&tag='+tag);
                    xhr.send();
                    xhr.onload = function() {
                        document.getElementById("news").innerHTML += xhr.responseText;
                        let newsCount = document.getElementsByTagName("h3").length;
                        let id = document.getElementsByTagName("h3")[newsCount-1].getAttribute("data-id");
                        document.getElementsByTagName("button")[0].setAttribute("onclick", "LoadMoreFromCategory("+id+",'"+category+"'&tag='"+tag+"')");
                    }
                }

                function AddView(id) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('get', '/controllers/addViewToPost.php?id='+id);
                    xhr.send();
                }
            </script>
        </head>
        <body>
        <h1>(мобильная версия)</h1>
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
        <p><b>Mobiltelefon.ru, 2019</b></p>
        </body>
        </html>
        <?php
    }
}