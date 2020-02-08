<?php
require_once("block.php");

class paragraphBlock extends Block
{
    private $content;

    public function __construct($block)
    {
        $this->content = $block->content;
    }

    public function generate()
    {
        $result = "\r\n<br><br>";
        $result .= "\r\n<p>".$this->content."</p>";
        return $result;
    }
}