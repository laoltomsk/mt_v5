<?php
require_once("block.php");

class paragraphBlock extends Block
{
    private $content;

    public function __construct($block)
    {
        $this->content = $block->content;
    }

    public function printCode()
    {
        print "\r\n<br><br>";
        print "\r\n<p>".$this->content."</p>";
    }
}