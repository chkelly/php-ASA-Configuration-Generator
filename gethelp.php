<?php
$q = $_GET["q"];
if ($q == "custid"){
    echo "<p>The Customer ID is used later for searching.</p>";
}

if ($q == "servername"){
    echo "<p>The server name is used for informational purposes. If this is a NAT Configuration, then specify the hostname of the primary server.</p>";
}
if ($q == "hostname"){
    echo "<p>You can specify the hostname here. Generally it can just be 'fw' or whatever the customer prefers.</p>";
}

if ($q == "domain"){
    echo "<p>The Domain Name is automatically appended as a suffix to unqualified names. For example, if you set the domain name to example.com and specify a syslog server by the unqualified name of syslog, then the ASA qualifies the name to syslog.example.com. If you are unsure what to set this to just set it to local</p>";
}

if ($q == "login"){
    echo "<p>The Login Password is used when connecting via SSH. The username is admin2 and the password is what you specify here.</p>";
}

if ($q == "enable"){
    echo "<p>The Enable password is used to enter privledges exec mode on the asa. Similiar in function to a root account.</p>";
}

if ($q == "fwip"){
    echo "<p>This is the IP Address of the firewall. What you specify here is what the customer will use to access the firewall via SSH and HTTPS. This IP should be on the same VLAN as the customers servers.</p>";
}

if ($q == "fwsubnet"){
    echo "<p>Enter the Subnet mask for the IP here. If you are unsure of this value you can check it in CDB by searching under IP Overview</p>";
}

if ($q == "fwgw"){
    echo "<p>If you are unsure what the gateway is verify it in CDB by searching under IP Overview</p>";
}

if ($q == "srvip"){
    echo "<p>The Server IP is the main IP Address of the server. This will be used in generating the access lists and in NAT configurations the static map.</p>";
}

if ($q == "srvsub"){
    echo "<p>This is the Subnet Mask for the server IP. If you are unsure of this value you can check it in CDB by searching under IP Overview</p>";
}

if ($q == "os"){
    echo "<p>Select the Operating System that is installed on this server. A default list of ACLs will be applied based on the option</p>";
}

if ($q == "error"){
    echo "<p class='error'>Please ensure you fill out all of the fields marked in red!</p>";
}

if ($q == "fwprivip"){
    echo "<p>This is the gateway IP address for the private subnet. Unless the customer has requested something in particular 192.168.1.0 should work fine.</p>";
}

if ($q == "fwprivsubnet"){
    echo "<p>This is the subnet mask for the private subnet. Generally 255.255.255.0 is okay as this allows for 253 host addresses.</p>";
}

if ($q == "serverprivip"){
    echo "<p>This is the private or internal IP. This IP will be assigned to the server. For example, 192.168.1.2.</p>";
}
?>