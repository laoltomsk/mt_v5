<?php
require_once("block.php");

class videoBlock extends Block
{
    private $link;

    private $isVertical;

    public function __construct($block)
    {
        $this->link = $block->link;
        $this->isVertical = $block->isVertical;
    }

    public function generate()
    {
        $result = "\r\n<br><br>";
        $result .= "\r\n<div style=\"text-align: center;\"><video src=\"".$this->link."\" controls ";
        if ($this->isVertical) {
            $result .= "height=\"725\"";
        } else {
            $result .= "height=\"407\"";
        }
        $result .= "></video></div>";
        return $result;
    }
}