<?php
require_once("block.php");

class megabonusBlock extends Block
{
    public function __construct($block)
    {
    }

    public function generate()
    {
        $result = "\r\n<br>";
        $result .= "\r\n<p>Экономьте на заказах в интернете благодаря кэшбеку! <a "
        . "href=\"https://megabonus.com/?u=1077671&amp;utm_source=mobiltelefon.ru&amp;utm_medium=article&amp;utm_campaign=release\">"
        . "Возвращайте деньги с покупок вместе с нами и «Мегабонус».</a> Кешбэк-сервис «Мегабонус» предлагает до 40% "
        . "кешбека в более чем 2000 магазинах-партнерах. Начинайте экономить по-крупному прямо сейчас.</p>";
        return $result;
    }
}