function validate(page){
  valid = true;
  if(page === "trans" || page === "nat"){
    validate_presence("custID");
    validate_presence("servername");
    validate_presence("hostname");
    validate_presence("domain");
    validate_password("passLogin", "loginPassConf");
    validate_password("enablePass", "enablePassConf");
    validate_ip("fwip");
    validate_ip("fwsubnet", "1");
    validate_ip("fwgw");
  }
  if (page === "trans"){
    validate_ip("serverip");
    validate_ip("serversubnet", "1");
  }
  if (page === "nat"){
    validate_ip("fwprivip");
    validate_ip("fwprivsubnet", "1");
    
    for(var i=1; i<8; i++){
      var server = "server"+i;
      var div = document.getElementById(server);
      validate_ip("serverip1");
      validate_ip("serverprivip1");
      if (i > 1){
        if(div.style.display === 'block'){
          var serverip = "serverip"+i;
          var serverprivip = "serverprivip"+i;
          validate_ip(serverip);
          validate_ip(serverprivip);
        }
      }
    }
    
  }
  
  
  
  //Validate that a field has a value
  function validate_presence(str){
    if(document.getElementById(str).value === ""){
      valid = false;
      document.getElementById(str).style.borderColor='red';
    }
    else{
      document.getElementById(str).style.borderColor='#ddd';
    }
  }
  
  //validate a password field. Checks to ensure both fields have a value and that they are equal.
  function validate_password(str1, str2){
    if(document.getElementById(str1).value !== document.getElementById(str2).value || 
document.getElementById(str1).value === "" || document.getElementById(str2).value === ""){
      valid = false;
      document.getElementById(str1).style.borderColor='red';
      document.getElementById(str2).style.borderColor='red';
    }
    else{
      document.getElementById(str1).style.borderColor='#ddd';
      document.getElementById(str2).style.borderColor='#ddd';
    }
  }
  
  //Validate IP Address validate_ip(str) for validating an IP, validate_ip()
  function validate_ip(str, subnet){
    ipvalid = true;
    var ip = document.getElementById(str).value;
    if (ip === "0.0.0.0" || ip === "255.255.255.255" || ip === ""){
      ipvalid = false;
    }
    var ipArray = ip.split(".");
    if (ipArray.length != 4){
      ipvalid=false;
    }
    for (var i=0; i<4; i++){
      if (ipArray[i]>255){
        ipvalid=false;
      }
      if (i === 3 && subnet !== true){
        if (ipArray[i]<1 || ipArray[i]>254){
          ipvalid=false;
        }
      }
    }
    if (ipvalid === false){
      valid = false;
      document.getElementById(str).style.borderColor='red';
    }
    else{
      document.getElementById(str).style.borderColor='#ddd';  
    }
  }
  
  if (valid === false){
    showhelp("error");
  }
  return valid;
}
