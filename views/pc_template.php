<?php
require_once("template.php");

class PCTemplate extends Template {
    public function getHeader() {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Мобильный телефон: новости и обзоры</title>
        </head>
        <body>
        <h1>Главная страница (десктопная версия)</h1>
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