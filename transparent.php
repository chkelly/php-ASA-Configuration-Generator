<div id='bodyContent'>
        <div class='navigation'>
                <div class="navTxt">Transparent Configuration</div><div class="navMenu"><a href="./?a=transparent"><img src="./inc/images/transparent.png" alt="transparent"></a><a href="./?a=nat"><img src="./inc/images/nat.png" alt="nat"></a><a href="./?a=search"><img src="./inc/images/search.png" alt="nat"></a></div>
        </div>
        <div class='bodyTxt'>
                <form id='form' name='form' method='post' action='./?a=gentrans' onsubmit="return validate('trans');">
                <div class='formHeader'>
                        <p>General Info</p>
                </div>
                <div class='formFields'>
                <table>
                        <tr>
                                <td><label for="custID">Customer ID</label></td>
                                <td><label for="servername">Server Name</label></td>
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
                                <td><input type="password" name="loginPassConf" id="loginPassConf" ></td>
                        </tr>
                        <tr>
                                <td><label for="enablePass">Enable Password</label></td>
                                <td><label for="enablePassConf">Confirm Enable Password</label></td>
                        </tr>
                        <tr>
                                <td><input type="password" name="enablePass" id="enablePass" onFocus=showhelp("enable");></td>
                                <td><input type="password" name="enablePassConf" id="enablePassConf" ></td>
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
                </table>
                </div>
                <div class='formHeader'>
                        <p>Server Configuration</p>
                </div>
                <div class='formFields'>
                <table>
                        <tr>
                                <td><label for="serverip">Server IP</label></td>
                                <td><label for="serversubnet">Server Subnet Mask</label></td>
                        </tr>
                        <tr>
                                <td><input type="text" name="txtServerIP" id="serverip" onFocus=showhelp("srvip");></td>
                                <td><input type="text" name="txtServerSubnet" id="serversubnet" onFocus=showhelp("srvsub");></td>
                        </tr>
                        <tr>
                                <td><label for="os">Operating System</label></td>
                                <td><label for="software">Software Packages</label></td>
                                <td><label for="ports">Common Ports</label></td>
                        </tr>
                        <tr>
                                <td><select name="os" id="os" onFocus=showhelp("os");>
                                        <option>Windows</option>
                                        <option>Unix/Linux</option>
                                        <option>VMWare ESX</option>
                                        <option>Citrix XenServer</option>
                                </select></td>
                                <td><select name="software[]" multiple="multiple" id="software" onFocus=showhelp("software");>
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
                                <td><select name="ports[]" multiple="multiple" id="ports" onFocus=showhelp("ports");>
                                        <option value="HTTP">HTTP</option>
                                        <option value="HTTPS">HTTPS</option>
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
                <p>
                </p>
                <div class='formFields'>
                <table>
                        <tr>
                                <td><input type="submit" class="button red" value="Generate"></td>
                                <td><input type="reset" class="button red" value="Clear" ></td>
                        </tr>
                </table>
                </div>
                </form>
        </div>
        <div class='helpTxt' id='helpTxt'>
                <p>Fill out the form on the left to generate a configuration. As you select each field this text will be replaced with text to help you along the way.</p>
        </div>
</div>