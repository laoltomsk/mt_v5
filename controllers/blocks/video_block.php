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

    public function printCode()
    {
        print "\r\n<br><br>";
        print "\r\n<div style=\"text-align: center;\"><video src=\"".$this->link."\" controls ";
        if ($this->isVertical) {
            print "height=\"725\"";
        } else {
            print "height=\"407\"";
        }
        print "></video></div>";
    }
}