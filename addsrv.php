<?php
$q=$_GET["q"];
$serverid = $q[strlen($q)-1];
?>
<table>
    <tr>
<?php
        echo "<td><label for='serverip$serverid'>Public Server IP</label></td>";
        echo "<td><label for='serversubnet$serverid'>Public Server Subnet Mask</label></td>";
?>
    </tr>
    <tr>
        <td><input type="text" name="txtServerIP<?php echo $serverid ?>" id="serverip<?php echo $serverid ?>" ><script type="text/javascript">var f9 = new LiveValidation('serverip<?php echo $serverid ?>'); f9.add(Validate.IP);</script><script type="text/javascript">var f14 = new LiveValidation('serverip<?php echo $serverid ?>'); f14.add(Validate.Presence);</script></td>
        <td><input type="text" name="txtServerSubnet<?php echo $serverid ?>" id="serversubnet<?php echo $serverid ?>" ><script type="text/javascript">var f10 = new LiveValidation('serversubnet<?php echo $serverid ?>'); f10.add(Validate.IP);</script><script type="text/javascript">var f15 = new LiveValidation('serversubnet<?php echo $serverid ?>'); f15.add(Validate.Presence);</script></td>
    </tr>
    <tr>
        <td><label for="os<?php echo $serverid ?>">Operating System</label></td>
        <td><label for="software<?php echo $serverid ?>">Software Packages</label></td>
        <td><label for="ports<?php echo $serverid ?>">Common Ports</label></td>
    </tr>
    <tr>
        <td><select name="os<?php echo $serverid ?>" id="os<?php echo $serverid ?>">
            <option>Windows</option>
            <option>Unix/Linux</option>
            <option>VMWare ESX</option>
            <option>Citrix XenServer</option>
        </select></td>
        <td><select name="software<?php echo $serverid ?>[]" multiple="multiple" id="software<?php echo $serverid ?>">
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
            <td><select name="ports<?php echo $serverid ?>[]" multiple="multiple" id="ports<?php echo $serverid ?>">
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