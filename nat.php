<div id='bodyContent'>
        <div class='navigation'>
                <div class="navTxt">NAT Configuration</div><div class="navMenu"><a href="./?a=transparent"><img src="./inc/images/transparent.png" alt="transparent"></a><a href="./?a=nat"><img src="./inc/images/nat.png" alt="nat"></a><a href="./?a=search"><img src="./inc/images/search.png" alt="nat"></a></div>
        </div>
        <div class='bodyTxt'>
                <form id='form' name='form' method='post' action='./?a=gennat' onsubmit="return validate('nat');">
                <div class='formHeader'>
                        <p>General Info</p>
                </div>
                <div class='formFields'>
                <table>
                        <tr>
                                <td><label for="custID">Customer ID</label></td>
                                <td><label for="servername">Primary Server Name</label></td>
                        </tr>
                        <tr>
                                <td><input type="text" name="txtCustID" id="custID" onFocus=showhelp("custid");></td>
                                <td><input type="text" name="txtServerName" id="servername" onFocus=showhelp("servername");></td>
                        </tr>
                        <tr>
                                <td><label for="hostname">Hostname</label></td>
                                <td><label for="domain">Domain Name</label></td>
                        </tr>
                        <tr>
                                <td><input type="text" name="txtHostname" id="hostname" onFocus=showhelp("hostname");></td>
                                <td><input type="text" name="txtDomain" id="domain" onFocus=showhelp("domain");></td>
                        </tr>
                        <tr>
                                <td><label for="passLogin">Login Password</label></td>
                                <td><label for="loginPassConf">Confirm Login Password</label></td>
                        </tr>
                        <tr>
                                <td><input type="password" name="passLogin" id="passLogin" onFocus=showhelp("login");></td>
                                <td><input type="password" name="loginPassConf" id="loginPassConf" onFocus=showhelp("login");></td>
                        </tr>
                        <tr>
                                <td><label for="enablePass">Enable Password</label></td>
                                <td><label for="enablePassConf">Confirm Enable Password</label></td>
                        </tr>
                        <tr>
                                <td><input type="password" name="enablePass" id="enablePass" onFocus=showhelp("enable");></td>
                                <td><input type="password" name="enablePassConf" id="enablePassConf" onFocus=showhelp("enable");></td>
                        </tr>
                </table>
                </div>
                <div class='formHeader'>
                        <p>Firewall IP Configuration</p>
                </div>
                <div class='formFields'>
                <table>
                        <tr>
                                <td><label for="fwip">Firewall IP</label></td>
                                <td><label for="fwsubnet">Firewall Subnet Mask</label></td>
                                <td><label for="fwgw">Firewall Gateway</label></td>
                        </tr>
                        <tr>
                                <td><input type="text" name="txtFirewallIP" id="fwip" onFocus=showhelp("fwip");></td>
                                <td><input type="text" name="txtFirewallSubnet" id="fwsubnet" onFocus=showhelp("fwsubnet");></td>
                                <td><input type="text" name="txtFirewallGateway" id="fwgw" onFocus=showhelp("fwgw");></td>
                        </tr>
                        <tr>
                                <td><label for="fwprivip">Firewall Private IP</label></td>
                                <td><label for="fwprivsubnet">Firewall Private Subnet Mask</label></td>
                        </tr>
                        <tr>
                                <td><input type="text" name="txtFirewallPrivIP" id="fwprivip" onFocus=showhelp("fwprivip");></td>
                                <td><input type="text" name="txtFirewallPrivSubnet" id="fwprivsubnet" onFocus=showhelp("fwprivsubnet");></td>
                        </tr>
                </table>
                </div>
<?php
$i = 1;
while ($i <= 7){
?>
                <div class='formHeader'>
                        <p>Server <?php echo "$i"; ?> Configuration <?php if($i != 1) { ?><a href="#" onClick="togglediv('server<?php echo "$i"; ?>'); return false"><img id=server<?php echo "$i"; ?>img src=./inc/images/add.png></a></p><?php } ?>
                </div>
                <div class='formFields' id="server<?php echo "$i"; ?>">
                <table>
                        <tr>
                                <td><label for="serverip<?php echo "$i"; ?>">Public Server IP</label></td>
                                <td><label for="serverprivip<?php echo "$i"; ?>">Private Server IP</label></td>
                        </tr>
                        <tr>
                                <td><input type="text" name="txtServerIP<?php echo "$i"; ?>" id="serverip<?php echo "$i"; ?>" onFocus=showhelp("srvip"); ></td>
                                <td><input type="text" name="txtServerPrivIP<?php echo "$i"; ?>" id="serverprivip<?php echo "$i"; ?>" onFocus=showhelp("serverprivip");></td>
                        </tr>
                        <tr>
                                <td><label for="os<?php echo "$i"; ?>">Operating System</label></td>
                                <td><label for="software<?php echo "$i"; ?>">Software Packages</label></td>
                                <td><label for="ports<?php echo "$i"; ?>">Common Ports</label></td>
                        </tr>
                        <tr>
                                <td><select name="os<?php echo "$i"; ?>" id="os<?php echo "$i"; ?>">
                                        <option>Windows</option>
                                        <option>Unix/Linux</option>
                                        <option>VMWare ESX</option>
                                        <option>Citrix XenServer</option>
                                </select></td>
                                <td><select name="software<?php echo "$i"; ?>[]" multiple="multiple" id="software<?php echo "$i"; ?>">
                                        <optgroup label="Control Panels">
                                                <option>cPanel</option>
                                                <option>Plesk</option>
                                        </optgroup>
                                        <optgroup label="PSD Services">
                                                <option>DCA2</option>
                                                <option>DCA3</option>
                                                <option>SEA2</option>
                                        </optgroup>
                                </select></td>
                                <td><select name="ports<?php echo "$i"; ?>[]" multiple="multiple" id="ports<?php echo "$i"; ?>">
                                        <option>HTTP</option>
                                        <option>HTTPS</option>
                                        <option>FTP</option>
                                        <option>MySQL</option>
                                        <option>DNS</option>
                                        <option>SMTP</option>
                                        <option>IMAP4</option>
                                        <option>POP3</option>
                                </select></td>                                
                        </tr>
                </table>
                </div>
<?php
$i++;
}
?>
                <p>
                </p>
                <div class='formFields'>
                <table>
                        <tr>
                                <td><input type="submit" class="button red" value="Generate"></td>
                                <td><input type="button" class="button red" value="Clear" onclick="resetform('form'); return false"></td>
                        </tr>
                </table>
                </div>
                </form>
        </div>
                <div class='helpTxt' id='helpTxt'>
                <p>Fill out the form on the left to generate a configuration. As you select each field this text will be replaced with text to help you along the way.</p>
        </div>
</div>
