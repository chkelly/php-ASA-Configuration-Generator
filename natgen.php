<div id='bodyContent'>
<div class='navigation'>
                <div class="navMenu"><a href="./?a=transparent"><img src="./inc/images/transparent.png" alt="transparent"></a><a href="./?a=nat"><img src="./inc/images/nat.png" alt="nat"></a></div>
        
<?php
//Get Variables from Form
$custID = $_POST['txtCustID'];
$serverName = $_POST['txtServerName'];

$hostname = $_POST['txtHostname'];
$domain = $_POST['txtDomain'];

$loginPass = $_POST['passLogin'];
$enablePass = $_POST['enablePass'];

$fwIP = $_POST['txtFirewallIP'];
$fwSubnet = $_POST['txtFirewallSubnet'];
$fwGateway = $_POST['txtFirewallGateway'];

$fwPrivIP = $_POST['txtFirewallPrivIP'];
$fwPrivSubnet = $_POST['txtFirewallPrivSubnet'];

$i = 1;
while ($i <= 7){
    $check = $_POST["txtServerIP$i"];
    if ($check != null){
        $serverCount[] = $i;
        //Grab the data from POST for each server and assign them to variables
        ${'serverIP'.$i} = $_POST["txtServerIP$i"];
        ${'serverSubnet'.$i} = $_POST["txtServerSubnet$i"];
        ${'serverPrivIP'.$i} = $_POST["txtServerPrivIP$i"];
        ${'serverPrivSubnet'.$i} = $_POST["txtServerPrivSubnet$i"];
        ${'os'.$i} = $_POST["os$i"];
        //These are arrays
        ${'software'.$i} = $_POST["software$i"];
        ${'ports'.$i} = $_POST["ports$i"];
    }
$i++;    
}


//Create a txt file to save the configuration too
$txtFileName = "$custID-$serverName-".time().".txt";
$txtFilePath = "./saved/$txtFileName";
$txtFile = fopen($txtFilePath, 'x') or die("Cannot create $txtFilePath");

//Add an entry to an index file so we can find the configurations later
$indexFileName = "fileIndexNAT.txt";
$indexFilePath = "./saved/$indexFileName";
$indexFile = fopen($indexFilePath, 'a') or die("Cannot open $indexFilePath");
$indexLine ="$custID-$serverName-".time().".txt";
fwrite($indexFile, "$indexLine\n");
fclose($indexFile);

//Function to take line and write it to the text file and echo it on screen
function writeLine($text){
        fwrite($GLOBALS['txtFile'], "$text\n");
        echo "$text<br>";        
}
echo "</div>";
echo "<p>Your Configuration has been generated and can be viewed below. You can also access it <a href='./?a=saved&amp;file=$txtFileName'>here</a>.</p>";
echo "<div class='configurationTxt'>";

//Write timestamp to the top of the file.
$timestamp = "!".date("F j, Y, g:i a");
fwrite($txtFile, "$timestamp\n");
fwrite($txtFile, "!nat\n");

//Generate ACLs

writeLine("enable password $enablePass");
writeLine("hostname $hostname");
writeLine("domain-name $domain");
//Create Vlans
writeLine("interface vlan1");
writeLine("nameif outside");
writeLine("security-level 0");
writeLine("ip address $fwIP $fwSubnet");
writeLine("interface vlan2");
writeLine("nameif inside");
writeLine("security-level 100");
writeLine("ip address $fwPrivIP $fwPrivSubnet");

//Create Access-lists
//Allow all traffic originating from the inside out
writeLine("access-list inside-in extended permit ip any any");
//Allow ICMP Traffic
writeLine("access-list outside-in extended permit icmp any any");

writeLine("icmp unreachable rate-limit 1 burst-size 1");
writeLine("arp timeout 14400");
writeLine("access-group outside-in in interface outside");
writeLine("access-group inside-in in interface inside");

//Assign Vlans to interfaces
writeline("interface Ethernet0/0");
writeLine("Switchport access vlan 1");
writeLine("description Connects to Switch");
writeLine("no shutdown");
writeLine("interface Ethernet0/1");
writeLine("switchport access vlan 2");
writeLine("no shutdown");
writeLine("interface Ethernet0/2");
writeLine("switchport access vlan 2");
writeLine("no shutdown");
writeLine("interface Ethernet0/3");
writeLine("switchport access vlan 2");
writeLine("no shutdown");
writeLine("interface Ethernet0/4");
writeLine("switchport access vlan 2");
writeLine("no shutdown");
writeLine("interface Ethernet0/5");
writeLine("switchport access vlan 2");
writeLine("no shutdown");
writeLine("interface Ethernet0/6");
writeLine("switchport access vlan 2");
writeLine("no shutdown");
writeLine("interface Ethernet0/7");
writeLine("switchport access vlan 2");
writeLine("no shutdown");

//Add the default route for traffic
writeLine("route outside 0.0.0.0 0.0.0.0 $fwGateway");

//Generate the Static NAT map
foreach ($serverCount as $i){
    writeLine("static (inside,outside) ${'serverIP'.$i} ${'serverPrivIP'.$i} netmask 255.255.255.255");
}

//HTTP and SSH information
writeLine("http server enable");
writeLine("http 0.0.0.0 0.0.0.0 inside");
writeLine("no asdm history enable");
writeLine("ssh 0.0.0.0 0.0.0.0 inside");
writeLine("ssh 66.36.227.200 255.255.255.255 outside");
writeLine("ssh 66.36.227.254 255.255.255.255 outside");
writeLine("ssh 66.36.227.223 255.255.255.255 outside");
writeLine("ssh 97.65.201.0 255.255.255.0 outside");
writeLine("ssh 209.160.56.254 255.255.255.255 outside");
writeLine("ssh 209.160.56.10 255.255.255.255 outside");
writeLine("ssh 207.228.249.20 255.255.255.255 outside");
writeLine("ssh 207.228.249.10 255.255.255.255 outside");
writeLine("ssh 207.228.249.253 255.255.255.255 outside");
writeLine("ssh timeout 60");
writeLine("ssh version 2");
writeLine("username admin2 password $loginPass");
writeLine("aaa authentication ssh console LOCAL");
writeLine("crypto key zeroize rsa default noconfirm");
writeLine("crypto key generate rsa modulus 2048");





foreach ($serverCount as $i){    
    //ACLs for Windows
    if (${'os'.$i} == "Windows"){
        writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 3389");
    }
    //ACLs for Linux
    if (${'os'.$i} == "Unix/Linux"){
        writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 22");
    }
    //ACLs for ESX
    if (${'os'.$i} == "VMWare ESX"){
        writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 22");
        writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 80");
        writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 443");
        writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 902");
    }
    //ACLs for XenServer
    if (${'os'.$i} == "Citrix XenServer"){
        writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 22");
        writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 443");
        writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 3389");
    }
    
    //ACLs for Software Packages
    foreach (${'software'.$i} as $software) {
        //ACLs for Plesk
        if ($software == "Plesk"){
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 20");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 21");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 25");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 53");
            writeLine("access-list outside-in extended permit udp any host ${'serverIP'.$i} eq 53");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 80");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 110");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 113");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 143");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 443");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 465");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 587");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 990");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 993");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 995");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 8443");
        }
        //ACLs for cPanel
        if ($software == "cPanel"){
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 20");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 21");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 25");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 26");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 53");
            writeLine("access-list outside-in extended permit udp any host ${'serverIP'.$i} eq 53");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 80");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 110");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 143");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 443");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 465");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 993");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 995");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 2082");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 2083");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 2087");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 2095");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 2096");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 6666");
        }
        //ACLs for PSD Managed Services DCA2/3 Specific
        if ($software == "DCA2"){
            writeLine("access-list outside-in extended permit tcp host 207.228.236.156 host ${'serverIP'.$i} eq 1167");
            writeLine("access-list outside-in extended permit tcp host 207.228.249.31 host ${'serverIP'.$i} eq 80");
            writeLine("access-list outside-in extended permit tcp host 207.228.249.31 host ${'serverIP'.$i} eq 443");
            writeLine("access-list outside-in extended permit tcp host 209.160.73.155 host ${'serverIP'.$i} eq 10050");
            writeLine("access-list outside-in extended permit tcp host 209.160.73.155 host ${'serverIP'.$i} eq 10051");
            writeLine("access-list outside-in extended permit tcp host 209.160.32.58 host ${'serverIP'.$i} eq 135");
            writeLine("access-list outside-in extended permit tcp host 209.160.32.58 host ${'serverIP'.$i} eq 139");
            writeLine("access-list outside-in extended permit tcp host 209.160.32.58 host ${'serverIP'.$i} eq 443");
        }
        if ($software == "DCA3"){
            writeLine("access-list outside-in extended permit tcp host 207.228.236.156 host ${'serverIP'.$i} eq 1167");
            writeLine("access-list outside-in extended permit tcp host 209.40.96.225 host ${'serverIP'.$i} eq 80");
            writeLine("access-list outside-in extended permit tcp host 209.40.96.225 host ${'serverIP'.$i} eq 443");
            writeLine("access-list outside-in extended permit tcp host 209.160.73.155 host ${'serverIP'.$i} eq 10050");
            writeLine("access-list outside-in extended permit tcp host 209.160.73.155 host ${'serverIP'.$i} eq 10051");
            writeLine("access-list outside-in extended permit tcp host 209.160.32.58 host ${'serverIP'.$i} eq 135");
            writeLine("access-list outside-in extended permit tcp host 209.160.32.58 host ${'serverIP'.$i} eq 139");
            writeLine("access-list outside-in extended permit tcp host 209.160.32.58 host ${'serverIP'.$i} eq 443");
        }
        if ($software == "SEA2"){
            writeLine("access-list outside-in extended permit tcp host 209.160.56.28 host ${'serverIP'.$i} eq 1167");
            writeLine("access-list outside-in extended permit tcp host 209.160.40.197 host ${'serverIP'.$i} eq 10050");
            writeLine("access-list outside-in extended permit tcp host 209.160.40.197 host ${'serverIP'.$i} eq 10051");
            writeLine("access-list outside-in extended permit tcp host 209.160.32.58 host ${'serverIP'.$i} eq 135");
            writeLine("access-list outside-in extended permit tcp host 209.160.32.58 host ${'serverIP'.$i} eq 139");
            writeLine("access-list outside-in extended permit tcp host 209.160.32.58 host ${'serverIP'.$i} eq 443");
        }
    }
    //Add additonal Ports
    foreach (${'ports'.$i} as $port) {
        if ($port == "HTTP"){
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 80");
        }
        if ($port == "HTTPS"){
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 443");
        }
        if ($port == "FTP"){
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 20");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 21");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} range 5000 5020");
        }
        if ($port == "MySQL"){
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 3306");
        }
        if ($port == "DNS"){
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 53");
            writeLine("access-list outside-in extended permit udp any host ${'serverIP'.$i} eq 53");
        }
        if ($port == "SMTP"){
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 25");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 465");
        }
        if ($port == "IMAP4"){
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 143");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 585");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 993");
        }
        if ($port == "POP3"){
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 110");
            writeLine("access-list outside-in extended permit tcp any host ${'serverIP'.$i} eq 995");
        }    
    }
}

fclose($file);
?>
</div>
</div>