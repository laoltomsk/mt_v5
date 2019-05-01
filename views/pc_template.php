<?php
require_once("template.php");

class PCTemplate extends Template {
    public function getHeader() {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Мобильный телефон: новости и обзоры</title>
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
            </script>
        </head>
        <body>
        <h1>Главная страница (десктопная версия)</h1>
        <a href="/contents_main_0.html">Новости</a> --- <a href="/contents_obzor_0.html">Обзоры</a> --- <a href="/contents_blog_0.html">Статьи</a>
        <?php
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