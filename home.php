<div id='bodyContent'>
    <div class='navigation'>
                <div class="navTxt">Welcome!</div><div class="navMenu"><a href="./?a=transparent"><img src="./inc/images/transparent.png" alt="transparent"></a><a href="./?a=nat"><img src="./inc/images/nat.png" alt="nat"></a><a href="./?a=search"><img src="./inc/images/search.png" alt="nat"></a></div>
    </div>
<div class='mainBodyTxt'>
    <p>This handy ASA configuration generator can generate both transparent and NAT configurations. On this page you will find a list of the most recent NAT and Transparent configurations that have been generated.</p>
    <p>Select the button on the top right that corresponds to what you would like to do.</p>
    <p>Configurations are saved and can be viewed at any time by searching for the customer ID.</p>
    <p>Please let <a href="mailto:ckelly@hopone.net">Chris Kelly</a> know if you encounter any issues or would like additional features.</p>
<div class='savedTrans'>
    <p>Last 5 Transparent Configurations</p>
<?php
//Get the number of lines in each index file plus Open the Index Files to generate the table
$transIndex = file("./saved/fileIndexTrans.txt");
$natIndex = file("./saved/fileIndexNAT.txt");
$transIndexCount = count($transIndex);
$natIndexCount = count($natIndex);
echo "<ul>";
if ($transIndexCount >=5){
    for ($i = $transIndexCount-5; $i < $transIndexCount; $i++ ){
        $line = $transIndex[$i];
        $filename = $line;
        $line = explode("-", $line);
        $custID = $line[0];
        $serverName = $line[1];
        echo "<li><a href='./?a=saved&amp;file=$filename'>CID: $custID Server Name: $serverName</a></li>";
    }
}
else {
    foreach ($transIndex as $line){
        $filename = $line;
        $line = explode("-", $line);
        $custID = $line[0];
        $serverName = $line[1];
        echo "<li><a href='./?a=saved&amp;file=$filename'>CID: $custID Server Name: $serverName</a></li>";    
    }
}
echo "</ul>";
?>
</div>
<div class='savedNat'>
    <p>Last 5 NAT Configurations</p>
<?php
//Get the number of lines in each index file plus Open the Index Files to generate the table
echo "<ul>";
if ($natIndexCount >=5){
    for ($i = $natIndexCount-5; $i < $natIndexCount; $i++ ){
        $line = $natIndex[$i];
        $filename = $line;
        $line = explode("-", $line);
        $custID = $line[0];
        $serverName = $line[1];
        echo "<li><a href='./?a=saved&amp;file=$filename'>CID: $custID Server Name: $serverName</a></li>";
    }
}
else {
    foreach ($natIndex as $line){
        $filename = $line;
        $line = explode("-", $line);
        $custID = $line[0];
        $serverName = $line[1];
        echo "<li><a href='./?a=saved&amp;file=$filename'>CID: $custID Server Name: $serverName</a></li>";    
    }
}
echo "</ul>";



?>
</div>
<div style="clear: both;"> </div>
</div>
</div>