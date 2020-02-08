<?php
require_once("block.php");

class redbuttonBlock extends Block
{
    private $link;

    private $text;

    public function __construct($block)
    {
        $this->link = $block->link;
        $this->text = $block->text;
    }

    public function generate()
    {
        $result = "\r\n<br>";
        $result .= "\r\n<div style=\"text-align: center; font-size: 115%; margin: auto; width: fit-content; padding: 0.7rem; background-color: #b80000; border-radius: 0.7rem; letter-spacing: 0.1rem;\">";
        $result .= "<a style=\"color:white\" href=\"".$this->link."\">".$this->text."</a></div>";
        return $result;
    }
}