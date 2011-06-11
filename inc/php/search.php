<?php
$q = $_GET['q'];

$transIndex = file("../../saved/fileIndexTrans.txt");
$natIndex = file("../../saved/fileIndexNAT.txt");
echo "<ul>";
foreach ($transIndex as $line){
    $filename = $line;
    $line = explode("-", $line);
    $custID = $line[0];
    $serverName = $line[1];
    if (preg_match("/$q/i", "$custID")){
        echo "<li><a href='./?a=saved&amp;file=$filename'>CID: $custID Server Name: $serverName</a></li>";
    }
}
foreach ($natIndex as $line){
    $filename = $line;
    $line = explode("-", $line);
    $custID = $line[0];
    $serverName = $line[1];
    if (preg_match("/$q/i", "$custID")){
        echo "<li><a href='./?a=saved&amp;file=$filename'>CID: $custID Server Name: $serverName</a></li>";
    }
}
echo "</ul>";
?>