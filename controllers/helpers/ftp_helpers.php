<?php

class FTPHelpers
{
    static function getFtpConnection($password) {
        while (true) {
            $ftp = ftp_connect("89.253.225.72");
            if ($ftp) break;
            else usleep(100000);
        }
        ftp_login($ftp, "news", $password) or die("bad passwd");
        ftp_pasv($ftp, true);
        return $ftp;
    }

    static function makeSubdirectories($ftpcon, $ftpbasedir, $ftppath) { //copypasted
        @ftp_chdir($ftpcon, $ftpbasedir); // /var/www/uploads
        $parts = array_filter(explode('/', $ftppath)); // 2013/06/11/username
        foreach ($parts as $part) {
            if (!@ftp_chdir($ftpcon, $part)) {
                ftp_mkdir($ftpcon, $part);
                ftp_chdir($ftpcon, $part);
            }
        }
    }

    static function pushImage($tmpname, $newname, $curdate, $password) {
        while (true) {
            $ftp = self::getFtpConnection($password);
            self::makeSubdirectories($ftp, "/", $curdate);
            ftp_chdir($ftp, "/" . $curdate . "/");
            $ifSuccess = ftp_put($ftp, $newname, $tmpname, FTP_BINARY);

            if ($ifSuccess) break;
        }
    }
}