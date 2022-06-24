<?php
if ('Num2') {
    $fileName = basename('Numbers_03_Two.mp4');
    $filePath = '../VID/' . $fileName;
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=Numbers_03_Two.mp4");
    header("Content-Type: application/mp4");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile("$filePath");
    exit;
}
