function showhelp(str){
if (str=="")
  {
  document.getElementById("helpTxt").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("helpTxt").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gethelp.php?q="+str,true);
xmlhttp.send();
}