<?php
require_once("block.php");

class youtubeBlock extends Block
{
    private $id;

    public function __construct($block)
    {
        $this->id = $block->id;
    }

    public function printCode()
    {
        print "\r\n<br><br>";
        print "\r\n<div style=\"text-align: center;\"><iframe width=\"725\" height=\"408\" "
                ."src=\"https://www.youtube.com/embed/$this->id\" frameborder=\"0\" "
                ."allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>"
                ."</iframe></div>";
    }
}