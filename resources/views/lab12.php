<?php

//task2
/*
$handle = fopen("file://C:/Users/Admin/Desktop/LAB12.txt", 'r');
while(1){
    $line = fgets($handle);
    if (!$line){
        break;
    }
    echo $line ."<br>";
}
fclose($handle);

*///task3
$inp = fopen("file://C:/Users/Admin/Desktop/inp.txt", 'r');
$handle = fopen('file://C:/Users/Admin/Desktop/LAB12.txt', 'w');

while(1){
    $line = fgets($inp);
    if(!$line){
        break;
    }
    fputs($handle, $line);
}
fclose($handle);

/*//task4
$handle = fopen('file://C:/Users/Admin/Desktop/LAB12.txt', 'rb');
stream_filter_append($handle, 'string.toupper');
while(feof($handle) !== true) {
    echo fgets($handle)."<br>";
}
fclose($handle);
*/
?>