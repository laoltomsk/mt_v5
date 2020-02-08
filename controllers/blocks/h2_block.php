<?php
require_once("block.php");

class h2Block extends Block
{
    private $content;

    public function __construct($block)
    {
        $this->content = $block->content;
    }

    public function generate()
    {
        $result =  "\r\n<br><br>";
        $result .= "\r\n<h2 class=\"subhead_dTable_v2\">".$this->content."</h2>";
        return $result;
    }
}