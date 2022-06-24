<?php
if ('Num5') {
    $fileName = basename('VID/Numbers_06_Five.mp4');
    $filePath = '../VID/' . $fileName;
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=VID/Numbers_06_Five.mp4");
    header("Content-Type: application/mp4");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile("$filePath");
    exit;
}