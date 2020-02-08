<?php

class NamingHelpers
{
    static function str_split_unicode($str) {
        return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    }

    static function convert_to_translit($string) {
        $stringAsArray = self::str_split_unicode($string);
        $res = "";
        for ($i = 0; $i < count($stringAsArray); $i++) {
            if (preg_match("/[a-z0-9_]/", $stringAsArray[$i])) $res .= $stringAsArray[$i];
            if (preg_match("/[A-Z]/", $stringAsArray[$i])) $res .= strtolower($stringAsArray[$i]);
            if ($stringAsArray[$i] == "а" || $stringAsArray[$i] == "А") $res .= "a";
            if ($stringAsArray[$i] == "б" || $stringAsArray[$i] == "Б") $res .= "b";
            if ($stringAsArray[$i] == "в" || $stringAsArray[$i] == "В") $res .= "v";
            if ($stringAsArray[$i] == "г" || $stringAsArray[$i] == "Г") $res .= "g";
            if ($stringAsArray[$i] == "д" || $stringAsArray[$i] == "Д") $res .= "d";
            if ($stringAsArray[$i] == "е" || $stringAsArray[$i] == "Е") $res .= "e";
            if ($stringAsArray[$i] == "ё" || $stringAsArray[$i] == "Ё") $res .= "e";
            if ($stringAsArray[$i] == "ж" || $stringAsArray[$i] == "Ж") $res .= "zh";
            if ($stringAsArray[$i] == "з" || $stringAsArray[$i] == "З") $res .= "z";
            if ($stringAsArray[$i] == "и" || $stringAsArray[$i] == "И") $res .= "i";
            if ($stringAsArray[$i] == "й" || $stringAsArray[$i] == "Й") $res .= "j";
            if ($stringAsArray[$i] == "к" || $stringAsArray[$i] == "К") $res .= "k";
            if ($stringAsArray[$i] == "л" || $stringAsArray[$i] == "Л") $res .= "l";
            if ($stringAsArray[$i] == "м" || $stringAsArray[$i] == "М") $res .= "m";
            if ($stringAsArray[$i] == "н" || $stringAsArray[$i] == "Н") $res .= "n";
            if ($stringAsArray[$i] == "о" || $stringAsArray[$i] == "О") $res .= "o";
            if ($stringAsArray[$i] == "п" || $stringAsArray[$i] == "П") $res .= "p";
            if ($stringAsArray[$i] == "р" || $stringAsArray[$i] == "Р") $res .= "r";
            if ($stringAsArray[$i] == "с" || $stringAsArray[$i] == "С") $res .= "s";
            if ($stringAsArray[$i] == "т" || $stringAsArray[$i] == "Т") $res .= "t";
            if ($stringAsArray[$i] == "у" || $stringAsArray[$i] == "У") $res .= "u";
            if ($stringAsArray[$i] == "ф" || $stringAsArray[$i] == "Ф") $res .= "f";
            if ($stringAsArray[$i] == "х" || $stringAsArray[$i] == "Х") $res .= "h";
            if ($stringAsArray[$i] == "ц" || $stringAsArray[$i] == "Ц") $res .= "c";
            if ($stringAsArray[$i] == "ч" || $stringAsArray[$i] == "Ч") $res .= "ch";
            if ($stringAsArray[$i] == "ш" || $stringAsArray[$i] == "Ш") $res .= "sh";
            if ($stringAsArray[$i] == "щ" || $stringAsArray[$i] == "Щ") $res .= "sch";
            if ($stringAsArray[$i] == "ы" || $stringAsArray[$i] == "Ы") $res .= "y";
            if ($stringAsArray[$i] == "э" || $stringAsArray[$i] == "Э") $res .= "e";
            if ($stringAsArray[$i] == "ю" || $stringAsArray[$i] == "Ю") $res .= "u";
            if ($stringAsArray[$i] == "я" || $stringAsArray[$i] == "Я") $res .= "a";
            if ($stringAsArray[$i] == " " || $stringAsArray[$i] == "-") $res .= "_";
        }
        return $res;
    }

    static function remove_quotes($string) {
        $stringAsArray = self::str_split_unicode($string);
        $res = "";
        for ($i = 0; $i < count($stringAsArray); $i++) {
            if ($stringAsArray[$i] !== "\"") $res .= $stringAsArray[$i];
        }
        return $res;
    }
}