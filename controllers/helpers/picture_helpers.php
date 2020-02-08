<?php

const IMAGESIZE_X = 0;
const IMAGESIZE_Y = 1;

class PictureHelpers
{
    const totalRowWidth = 730;

    const totalImageMarginWidth = 5;

    static function getFileType($filename) {
        return end(explode(".", $filename));
    }

    static function getNewName($oldname, $postname, $picId, $filetype, $saveOldName) {
        if ($saveOldName) return $oldname;
        return $postname . "_" . $picId . "." . $filetype;
    }

    static function convertPngOrBmpToJpg($image, &$filetype, $tmpname, &$newname) {
        if ($filetype !== "png" && $filetype !== "bmp") return;

        $imgsize = getimagesize($tmpname);
        $dst = imagecreatetruecolor($imgsize[IMAGESIZE_X], $imgsize[IMAGESIZE_Y]);
        imagecopy($dst, $image, 0, 0, 0, 0, $imgsize[IMAGESIZE_X], $imgsize[IMAGESIZE_Y]);
        imagejpeg($dst, $tmpname, 90);
        $filetype = "jpg";
        $newname = explode(".", $newname)[0] . ".jpg";
    }

    static function getTotalWidth($columns) {
        return PictureHelpers::totalRowWidth - $columns * PictureHelpers::totalImageMarginWidth;
    }

    static function openImage($tmpname, $filetype) {
        if ($filetype === "png")
            return imagecreatefrompng($tmpname);
        if ($filetype === "bmp")
            return imagecreatefrombmp($tmpname);
        if ($filetype === "gif")
            return imagecreatefromgif($tmpname);

        return imagecreatefromjpeg($tmpname);
    }

    static function resizeImageInPlace($src, $tmpname, $filetype, $height) {
        $imgsize = getimagesize($tmpname);
        $width = $imgsize[IMAGESIZE_X] / $imgsize[IMAGESIZE_Y] * $height;

        $dst = imagecreatetruecolor($width, $height);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $imgsize[IMAGESIZE_X], $imgsize[IMAGESIZE_Y]);

        if ($filetype === "gif") {
            imagegif($dst, $tmpname);
        } else {
            imagejpeg($dst, $tmpname, 90);
        }
    }
}