<?php

class DBHelpers
{
    static function getDbConnection() {
        return mysqli_connect("localhost", "id8691558_editor", "nerybov1999", "id8691558_editor");
    }
}