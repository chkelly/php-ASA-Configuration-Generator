<div id='bodyContent'>
    <div class='navigation'>
                <div class="navTxt">Search</div><div class="navMenu"><a href="./?a=transparent"><img src="./inc/images/transparent.png" alt="transparent"></a><a href="./?a=nat"><img src="./inc/images/nat.png" alt="nat"></a><a href="./?a=search"><img src="./inc/images/search.png" alt="nat"></a></div>
    </div>
<div class='mainBodyTxt'>
    <form action='#' onsubmit="return false;">
    <table>
        <tr>
            <td><label for="custID">Customer ID</label></td>
        </tr>
        <tr>
            <td><input type="text" id="custID" onkeyup=search();></td>
            <td><input type="button" value="Search" onclick=search();></td>
        </tr>
    </table>
    </form>
    
    <div id='searchResults'>
        <p>Please enter a customer ID above and click search.</p>
    </div>
</div>
</div>