<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
$a = $_GET['a'];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ASA Configuration Generator</title>
    <link href="./inc/css/main.css" rel="stylesheet" type="text/css">
<?php
if ($a == "search"){
    echo "<script type='text/javascript' src='./inc/js/search.js'></script>";
}
if ($a == "transparent" or $a == "nat") {
?>
    <link rel="stylesheet" type="text/css" href="./inc/css/ui.dropdownchecklist.css">
    <script type="text/javascript" src="./inc/js/addsrv.js"></script>
    <script type="text/javascript" src="./inc/js/helper.js"></script>
    <script type="text/javascript" src="./inc/js/jquery-min.js"></script> 
    <script type="text/javascript" src="./inc/js/ui.core-min.js"></script> 
    <script type="text/javascript" src="./inc/js/ui.dropdownchecklist-min.js"></script>
    <script type="text/javascript" src="./inc/js/validate.js"></script>
<?php
    if ($a == "transparent"){
?>
        <script type="text/javascript"> 
            $(document).ready(function() {
                $("#os").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#software").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#ports").dropdownchecklist({maxDropHeight: 100, width:140 });
            });
        </script>
<?php
    }
    if ($a == "nat"){
?>
        <script type="text/javascript"> 
            $(document).ready(function() {
                $("#os1").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#software1").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#ports1").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#os2").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#software2").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#ports2").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#os3").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#software3").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#ports3").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#os4").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#software4").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#ports4").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#os5").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#software5").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#ports5").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#os6").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#software6").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#ports6").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#os7").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#software7").dropdownchecklist({maxDropHeight: 100, width:140 });
                $("#ports7").dropdownchecklist({maxDropHeight: 100, width:140 });
            });
        </script>
<?php
    }
}
?>
</head>
<?php
if ($a == "nat"){
    echo "<body class='body' onload=hidedivs()>";
}
else{
    echo "<body class='body'>";
}
?>
<div id='page-container'>
<div class='padding'>
<div id='header'>
<?php
   require_once 'header.php';
?>
</div>
</div>
<div  class='padding'>
<div id='content'>
<?php
   

   if ($a == "transparent") {
        $body = "transparent.php";
   }
   elseif ($a == "nat") {
        $body = "nat.php";
   }
   elseif ($a == "gentrans") {
        $body = "gentrans.php";
   }
   elseif ($a == "gennat"){
        $body = "natgen.php";
   }
   elseif($a == "saved") {
        $body = "saved.php";
   }
   elseif($a == "search"){
        $body = "search.php";
   }
   else {
        $body = "home.php";
   }
   require_once $body;
?>
</div>
</div>
<div class='padding'>
<div id='footer'>
<?php
   require_once 'footer.php';
?>
</div>
</div>
</div>
</body>
</html>     