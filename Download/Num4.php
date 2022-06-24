<?php
if ('Num4') {
    $fileName = basename('Numbers_05_Four.mp4');
    $filePath = '../VID/' . $fileName;
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=Numbers_05_Four.mp4");
    header("Content-Type: application/mp4");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile("$filePath");
    exit;
}