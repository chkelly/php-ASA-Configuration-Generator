<div id='bodyContent'>
<div class='navigation'>
                <div class="navMenu"><a href="./?a=transparent"><img src="./inc/images/transparent.png" alt="transparent"></a><a href="./?a=nat"><img src="./inc/images/nat.png" alt="nat"></a></div>
        </div>
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

$serverIP = $_POST['txtServerIP'];
$serverSubnet = $_POST['txtServerSubnet'];

$os = $_POST['os'];

//This is an array
$softwares = $_POST['software'];

//This is an array
$ports = $_POST['ports'];

//Create a txt file to save the configuration too
$txtFileName = "$custID-$serverName-".time().".txt";
$txtFilePath = "./saved/$txtFileName";
$txtFile = fopen($txtFilePath, 'x') or die("Cannot create $txtFilePath");

//Add an entry to an index file so we can find the configurations later
$indexFileName = "fileIndexTrans.txt";
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
echo "<p>Your Configuration has been generated and can be viewed below. You can also access it <a href='./?a=saved&amp;file=$txtFileName'>here</a>.</p>";
echo "<div class='configurationTxt'>";

//Write timestamp to the top of the file.
$timestamp = "!".date("F j, Y, g:i a");
fwrite($txtFile, "$timestamp\n");
fwrite($txtFile, "!transparent\n");

//Start Generating the configuration
writeLine("firewall transparent");
writeLine("crypto key zeroize rsa default noconfirm");
writeLine("crypto key generate rsa modulus 2048");
writeLine("ssh version 2");
writeLine("hostname $hostname");
writeLine("enable password $enablePass");
writeLine("username admin2 password $loginPass");
writeLine("names");
writeLine("interface Vlan1");
writeLine("nameif outside");
writeLine("interface Vlan2");
writeLine("nameif inside");
writeLine("security-level 100");
writeLine("interface Ethernet0/0");
writeLine("switchport access vlan 1");
writeLine("description Connects to Switch");
writeLine("no shut");
writeLine("interface Ethernet0/1");
writeLine("switchport access vlan 2");
writeLine("no shut");
writeLine("interface Ethernet0/2");
writeLine("switchport access vlan 2");
writeLine("interface Ethernet0/3");
writeLine("switchport access vlan 2");
writeLine("interface Ethernet0/4");
writeLine("switchport access vlan 2");
writeLine("interface Ethernet0/5");
writeLine("switchport access vlan 2");
writeLine("interface Ethernet0/6");
writeLine("switchport access vlan 2");
writeLine("interface Ethernet0/7");
writeLine("switchport access vlan 2");
writeLine("ftp mode passive");
writeLine("dns server-group DefaultDNS");
writeLine("domain-name $domain");
writeLine("same-security-traffic permit inter-interface");
writeLine("pager lines 24");
writeLine("mtu inside 1500");
writeLine("mtu outside 1500");
writeLine("ip address $fwIP $fwSubnet");
writeLine("icmp unreachable rate-limit 1 burst-size 1");
writeLine("asdm image disk0:/asdm-524.bin");
writeLine("no asdm history enable");
writeLine("arp timeout 14400");
writeLine("access-list inside-in extended permit ip any any");
writeLine("access-list outside-in extended permit icmp any any");
writeLine("access-group outside-in in interface outside");
writeLine("access-group inside-in in interface inside");
writeLine("route outside 0.0.0.0 0.0.0.0 $fwGateway 1");
writeLine("timeout xlate 3:00:00");
writeLine("timeout conn 1:00:00 half-closed 0:05:00 udp 0:02:00 icmp 0:00:02");
writeLine("timeout sunrpc 0:10:00 h323 0:05:00 h225 1:00:00 mgcp 0:05:00 mgcp-pat 0:05:00");
writeLine("timeout sip 0:30:00 sip_media 0:02:00 sip-invite 0:03:00 sip-disconnect 0:02:00");
writeLine("timeout sip-provisional-media 0:02:00 uauth 0:05:00 absolute");
writeLine("aaa authentication ssh console LOCAL");
writeLine("http server enable");
writeLine("http 0.0.0.0 0.0.0.0 inside");
writeLine("no snmp-server location");
writeLine("no snmp-server contact");
writeLine("snmp-server enable traps snmp authentication linkup linkdown coldstart");
writeLine("telnet timeout 5");
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
writeLine("console timeout 0");
writeLine("class-map synflood");
//Check these lines
writeLine("match access-list inside-in");
writeLine("class-map inspection_default");
writeLine("match access-list inside-in");
writeLine("match default-inspection-traffic");
writeLine("policy-map type inspect dns preset_dns_map");
writeLine("parameters");
writeLine("message-length maximum 512");
writeLine("policy-map global_policy");
writeLine("class inspection_default");
writeLine("inspect dns preset_dns_map");
writeLine("inspect ftp");
writeLine("inspect h323 h225");
writeLine("inspect h323 ras");
writeLine("inspect rsh");
writeLine("inspect rtsp");
writeLine("inspect esmtp");
writeLine("inspect sqlnet");
writeLine("inspect skinny");
writeLine("inspect sunrpc");
writeLine("inspect xdmcp");
writeLine("inspect sip");
writeLine("inspect netbios");
writeLine("inspect tftp");
writeLine("inspect http");
writeLine("class synflood");
writeLine("set connection embryonic-conn-max 1");
writeLine("inspect http");
writeLine("service-policy global_policy global");
writeLine("prompt hostname context");
//Generate ACLs depending on Selections
//ACLs for Windows
if ($os == "Windows"){
    writeLine("access-list outside-in extended permit tcp any any eq 3389");
}
//ACLs for Linux
if ($os == "Unix/Linux"){
    writeLine("access-list outside-in extended permit tcp any any eq 22");
}
//ACLs for ESX
if ($os == "VMWare ESX"){
    writeLine("access-list outside-in extended permit tcp any any eq 22");
    writeLine("access-list outside-in extended permit tcp any any eq 80");
    writeLine("access-list outside-in extended permit tcp any any eq 443");
    writeLine("access-list outside-in extended permit tcp any any eq 902");
}
//ACLs for XenServer
if ($os == "Citrix XenServer"){
    writeLine("access-list outside-in extended permit tcp any any eq 22");
    writeLine("access-list outside-in extended permit tcp any any eq 443");
    writeLine("access-list outside-in extended permit tcp any any eq 3389");
}

//ACLs for Software Packages
foreach ($softwares as $software) {
    //ACLs for Plesk
    if ($software == "Plesk"){
        writeLine("access-list outside-in extended permit tcp any any eq 20");
        writeLine("access-list outside-in extended permit tcp any any eq 21");
        writeLine("access-list outside-in extended permit tcp any any eq 25");
        writeLine("access-list outside-in extended permit tcp any any eq 53");
        writeLine("access-list outside-in extended permit udp any any eq 53");
        writeLine("access-list outside-in extended permit tcp any any eq 80");
        writeLine("access-list outside-in extended permit tcp any any eq 110");
        writeLine("access-list outside-in extended permit tcp any any eq 113");
        writeLine("access-list outside-in extended permit tcp any any eq 143");
        writeLine("access-list outside-in extended permit tcp any any eq 443");
        writeLine("access-list outside-in extended permit tcp any any eq 465");
        writeLine("access-list outside-in extended permit tcp any any eq 587");
        writeLine("access-list outside-in extended permit tcp any any eq 990");
        writeLine("access-list outside-in extended permit tcp any any eq 993");
        writeLine("access-list outside-in extended permit tcp any any eq 995");
        writeLine("access-list outside-in extended permit tcp any any eq 8443");
    }
    //ACLs for cPanel
    if ($software == "cPanel"){
        writeLine("access-list outside-in extended permit tcp any any eq 20");
        writeLine("access-list outside-in extended permit tcp any any eq 21");
        writeLine("access-list outside-in extended permit tcp any any eq 25");
        writeLine("access-list outside-in extended permit tcp any any eq 26");
        writeLine("access-list outside-in extended permit tcp any any eq 53");
        writeLine("access-list outside-in extended permit udp any any eq 53");
        writeLine("access-list outside-in extended permit tcp any any eq 80");
        writeLine("access-list outside-in extended permit tcp any any eq 110");
        writeLine("access-list outside-in extended permit tcp any any eq 143");
        writeLine("access-list outside-in extended permit tcp any any eq 443");
        writeLine("access-list outside-in extended permit tcp any any eq 465");
        writeLine("access-list outside-in extended permit tcp any any eq 993");
        writeLine("access-list outside-in extended permit tcp any any eq 995");
        writeLine("access-list outside-in extended permit tcp any any eq 2082");
        writeLine("access-list outside-in extended permit tcp any any eq 2083");
        writeLine("access-list outside-in extended permit tcp any any eq 2087");
        writeLine("access-list outside-in extended permit tcp any any eq 2095");
        writeLine("access-list outside-in extended permit tcp any any eq 2096");
        writeLine("access-list outside-in extended permit tcp any any eq 6666");
    }
    //ACLs for PSD Managed Services DCA2/3 Specific
    if ($software == "DCA2"){
        writeLine("access-list outside-in extended permit tcp host 207.228.236.156 any eq 1167");
        writeLine("access-list outside-in extended permit tcp host 207.228.249.31 any eq 80");
        writeLine("access-list outside-in extended permit tcp host 207.228.249.31 any eq 443");
        writeLine("access-list outside-in extended permit tcp host 209.160.73.155 any eq 10050");
        writeLine("access-list outside-in extended permit tcp host 209.160.73.155 any eq 10051");
        writeLine("access-list outside-in extended permit tcp host 209.160.32.58 any eq 135");
        writeLine("access-list outside-in extended permit tcp host 209.160.32.58 any eq 139");
        writeLine("access-list outside-in extended permit tcp host 209.160.32.58 any eq 443");
    }
    if ($software == "DCA3"){
        writeLine("access-list outside-in extended permit tcp host 207.228.236.156 any eq 1167");
        writeLine("access-list outside-in extended permit tcp host 209.40.96.225 any eq 80");
        writeLine("access-list outside-in extended permit tcp host 209.40.96.225 any eq 443");
        writeLine("access-list outside-in extended permit tcp host 209.160.73.155 any eq 10050");
        writeLine("access-list outside-in extended permit tcp host 209.160.73.155 any eq 10051");
        writeLine("access-list outside-in extended permit tcp host 209.160.32.58 any eq 135");
        writeLine("access-list outside-in extended permit tcp host 209.160.32.58 any eq 139");
        writeLine("access-list outside-in extended permit tcp host 209.160.32.58 any eq 443");
    }
    if ($software == "SEA2"){
        writeLine("access-list outside-in extended permit tcp host 209.160.56.28 any eq 1167");
        writeLine("access-list outside-in extended permit tcp host 209.160.40.197 any eq 10050");
        writeLine("access-list outside-in extended permit tcp host 209.160.40.197 any eq 10051");
        writeLine("access-list outside-in extended permit tcp host 209.160.32.58 any eq 135");
        writeLine("access-list outside-in extended permit tcp host 209.160.32.58 any eq 139");
        writeLine("access-list outside-in extended permit tcp host 209.160.32.58 any eq 443");
    }
}

//Add additonal Ports
    foreach ($ports as $port) {
        if ($port == "HTTP"){
            writeLine("access-list outside-in extended permit tcp host any any eq 80");
        }
        if ($port == "HTTPS"){
            writeLine("access-list outside-in extended permit tcp host any any eq 443");
        }
        if ($port == "FTP"){
            writeLine("access-list outside-in extended permit tcp host any any eq 20");
            writeLine("access-list outside-in extended permit tcp host any any eq 21");
            writeLine("access-list outside-in extended permit tcp host any any range 5000 5020");
        }
        if ($port == "MySQL"){
            writeLine("access-list outside-in extended permit tcp host any any eq 3306");
        }
        if ($port == "DNS"){
            writeLine("access-list outside-in extended permit tcp host any any eq 53");
            writeLine("access-list outside-in extended permit udp host any any eq 53");
        }
        if ($port == "SMTP"){
            writeLine("access-list outside-in extended permit tcp host any any eq 25");
            writeLine("access-list outside-in extended permit tcp host any any eq 465");
        }
        if ($port == "IMAP4"){
            writeLine("access-list outside-in extended permit tcp host any any eq 143");
            writeLine("access-list outside-in extended permit tcp host any any eq 585");
            writeLine("access-list outside-in extended permit tcp host any any eq 993");
        }
        if ($port == "POP3"){
            writeLine("access-list outside-in extended permit tcp host any any eq 110");
            writeLine("access-list outside-in extended permit tcp host any any eq 995");
        }    
    }

fclose($file);
?>
</div>
</div>