<?php
if ('Alif') {
    $fileName = basename('Alphabets_01_Alif.mp4');
    $filePath = '../VID/' . $fileName;
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=Alphabets_01_Alif.mp4");
    header("Content-Type: application/mp4");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile("$filePath");
    exit;
}