<?php
if ('Saa') {
    $fileName = basename('Alphabets_04_Saa.mp4');
    $filePath = '../VID/' . $fileName;
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=Alphabets_04_Saa.mp4");
    header("Content-Type: application/mp4");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile("$filePath");
    exit;
}