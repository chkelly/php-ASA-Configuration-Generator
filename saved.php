<div id='bodyContent'>
<div class='navigation'>
                <div class="navTxt">Saved Configuration</div><div class="navMenu"><a href="./?a=transparent"><img src="./inc/images/transparent.png" alt="transparent"></a><a href="./?a=nat"><img src="./inc/images/nat.png" alt="nat"></a><a href="./?a=search"><img src="./inc/images/search.png" alt="nat"></a></div>
        </div>
<?php
//Get the file name and open the file
$txtFileName = $_GET['file'];
$txtFilePath = "./saved/$txtFileName";
$txtFile = fopen($txtFilePath, 'r');
$timestamp = fgets($txtFile);
$timestamp = str_replace("!", "", "$timestamp");
$type = fgets($txtFile);
$type = str_replace("!", "", "$type");
echo "<p>This is a saved $type configuration generated on $timestamp</p>";
echo "<div class='configurationTxt'>";
while (!feof($txtFile)){
    $line = fgets($txtFile);
    echo "$line<br>";
}
?>
</div>
</div>