<?php
require_once("block.php");

class endBlock extends Block
{
    private $name;

    private $src;

    public function __construct($block)
    {
        $this->name = $block->name;
        $this->src = $block->src;
    }

    public function printCode()
    {
        global $author;
        print "\r\n<br><br>";
        print "\r\n<p>© ".$this->name.". <a href=\"/\">Mobiltelefon</a></p>";
        $author = $this->name;
        if ($this->src !== "") {
            print "\r\n<br>";
            print "\r\n<p>По материалам ".$this->src."</p>";
        }
    }
}