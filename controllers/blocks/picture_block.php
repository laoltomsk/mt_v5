<?php
require_once("block.php");

class pictureBlock extends Block
{
    private $picsId;

    private $columns;

    private $isInvisible;

    private $setSizes;

    private $saveNames;

    private $files;

    private $subscript;

    public function __construct($block)
    {
        $this->picsId = $block->picsId;
        $this->columns = $block->columns;
        $this->isInvisible = $block->isInvisible;
        $this->setSizes = $block->setSizes;
        $this->saveNames = $block->saveNames;
        $this->files = $block->files ?? NULL;
        $this->subscript = $block->subscript;
    }

    public function generate()
    {
        $result = $this->printBeginning();

        if ($this->setSizes)
            $result .= $this->processImagesAndPrintCodeForImages();
        else
            $result .= $this->printCodeForImages();

        $result .= $this->printEnding();

        return $result;
    }

    private function processImagesAndPrintCodeForImages() {
        global $currentPicIndex;

        //немного инициализации
        $result = "";
        $name = NamingHelpers::remove_quotes($_POST['title']);
        $engname = NamingHelpers::convert_to_translit($name);
        $curdate = strtolower(date("Fy/d"));
        $pics = $_FILES[$this->picsId];
        $maxwidth = PictureHelpers::getTotalWidth($this->columns);

        $picsNum = count($pics['name']);
        $currentPicNumber = 0;
        $rowsCount = ceil($picsNum / $this->columns);
        //цикл по строкам
        for ($row = 0; $row < $rowsCount; $row++) {
            $result .= "\r\n";

            //считаем суммарную ширину изображений в строках
            $sumwidth = 0;
            $sumratio = 0;
            for ($col = 0, $numberOfPic = $currentPicNumber; $col < $this->columns && $numberOfPic < $picsNum; $col++, $numberOfPic++) {
                $pic = $pics["tmp_name"][$numberOfPic];
                $sumwidth += getimagesize($pic)[IMAGESIZE_X];
                $sumratio += getimagesize($pic)[IMAGESIZE_X] / getimagesize($pic)[IMAGESIZE_Y];
            };

            if ($sumwidth <= $maxwidth) {
                //если не нужны ресайзы (т.е. картинки влазят)
                for ($col = 0; $col < $this->columns && $currentPicNumber < $picsNum; $col++) {

                    $tmpname = $pics["tmp_name"][$currentPicNumber];
                    $oldname = $pics["name"][$currentPicNumber];
                    $filetype = PictureHelpers::getFileType($oldname);
                    $size = getimagesize($tmpname);
                    $newname = PictureHelpers::getNewName($oldname, $engname, $currentPicIndex, $filetype, $this->saveNames);

                    if ($filetype === "png" || $filetype === "bmp") {
                        $src = PictureHelpers::openImage($tmpname, $filetype);
                        PictureHelpers::convertPngOrBmpToJpg($src, $filetype, $tmpname, $newname);
                    }
                    PictureHelpers::pushImage($tmpname, $newname, $curdate, false);

                    //выводим код картинки
                    $result .= "<img src=\"/photo/$curdate/$newname\" alt=\"$name\" "
                        . "width=\"{$size[IMAGESIZE_X]}\" height=\"{$size[IMAGESIZE_Y]}\" title=\"\" />";
                    $currentPicIndex++;
                    $currentPicNumber++;
                }
            } else {
                //если нужно делать ресайз
                $height = $maxwidth / $sumratio;
                for ($col = 0; $col < $this->columns && $currentPicNumber < $picsNum; $col++) {

                    $tmpname = $pics["tmp_name"][$currentPicNumber];
                    $oldname = $pics["name"][$currentPicNumber];
                    $filetype = PictureHelpers::getFileType($oldname);
                    $newname = PictureHelpers::getNewName($oldname, $engname, $currentPicIndex, $filetype, $this->saveNames);

                    $src = PictureHelpers::openImage($tmpname, $filetype);
                    PictureHelpers::convertPngOrBmpToJpg($src, $filetype, $tmpname, $newname);
                    PictureHelpers::pushImage($tmpname, $newname, $curdate, true);

                    PictureHelpers::resizeImageInPlace($src, $tmpname, $filetype, $height);
                    $size = getimagesize($tmpname);
                    $newname_resize = explode(".", $newname)[0] . "_resize." . $filetype;
                    PictureHelpers::pushImage($tmpname, $newname_resize, $curdate, false);

                    //выводим код картинки
                    $result .= "<a href=\"/photo/$curdate/$newname\" class=\"highslide\" "
                        . "onclick=\"return hs.expand(this)\"><img src=\"/photo/$curdate/$newname_resize\" "
                        . "alt=\"$name\" width=\"{$size[IMAGESIZE_X]}\" height=\"{$size[IMAGESIZE_Y]}\" "
                        . "title=\"\" /></a> ";
                    $currentPicIndex++;
                    $currentPicNumber++;
                }
            }
            if ($currentPicNumber < $picsNum) $result .= "\r\n<br><br>";
        }
        return $result;
    }

    private function printCodeForImages()
    {
        //немного инициализации
        $result = "";
        $name = NamingHelpers::remove_quotes($_POST['title']);
        $engname = NamingHelpers::convert_to_translit($name);
        $curdate = strtolower(date("Fy/d"));
        $maxwidth = PictureHelpers::getTotalWidth($this->columns);

        $picsNum = count($this->files);
        $width = $maxwidth / $this->columns;
        $rowsCount = ceil($picsNum / $this->columns);
        $currentPicNumber = 0;

        for ($row = 0; $row < $rowsCount; $row++) {
            $result .= "\r\n";
            for ($col = 0; $col < $this->columns && $currentPicNumber < $picsNum; $col++) {
                $oldname = $this->files[$currentPicNumber];
                $filetype = PictureHelpers::getFileType($oldname);
                $newname = PictureHelpers::getNewName($oldname, $engname, $this->picsId . "_" . $currentPicNumber, $filetype, $this->saveNames);
                if ($filetype === "png" || $filetype == "bmp") {
                    $filetype = "jpg";
                    $newname = explode(".", $newname)[0] . ".jpg";
                }
                $newname_resize = explode(".", $newname)[0] . "_resize." . $filetype;
                $result .= "<a href=\"/photo/$curdate/$newname\" class=\"highslide\" "
                    . "onclick=\"return hs.expand(this)\"><img src=\"/photo/$curdate/$newname_resize\" "
                    . "alt=\"$name\" width=\"" . floor($width) . "\" title=\"\" /></a> ";
                $currentPicNumber++;
            }
            if ($currentPicNumber < $picsNum) $result .= "\r\n<br><br>";
        }
        return $result;
    }

    private function printBeginning()
    {
        if ($this->isInvisible)
            return "\r\n<div style=\"text-align: center; display: none;\">";

        return "\r\n<br><br>\r\n<div style=\"text-align: center;\">";
    }

    private function printEnding()
    {
        if ($this->subscript === "")
            return "</div>";

        return "\r\n<br><i>" . $this->subscript . "</i></div>";
    }
}