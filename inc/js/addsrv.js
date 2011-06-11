function hidedivs(){
    document.getElementById('server2').style.display = 'none';
    document.getElementById('server3').style.display = 'none';
    document.getElementById('server4').style.display = 'none';
    document.getElementById('server5').style.display = 'none';
    document.getElementById('server6').style.display = 'none';
    document.getElementById('server7').style.display = 'none';
}
function togglediv(id) {
var div = document.getElementById(id);
var id2 = id + "img";
var img = document.getElementById(id2);

if(div.style.display == 'none'){
    div.style.display = 'block';
    img.src = './inc/images/remove.png';
}else{
    div.style.display = 'none';
    img.src = './inc/images/add.png';
}
}

function resetform(id){
    var form = document.getElementById(id);
    form.reset();
    document.getElementById('server2').style.display = 'none';
    document.getElementById('server2img').src = './inc/images/add.png';
    document.getElementById('server3').style.display = 'none';
    document.getElementById('server3img').src = './inc/images/add.png';
    document.getElementById('server4').style.display = 'none';
    document.getElementById('server4img').src = './inc/images/add.png';
    document.getElementById('server5').style.display = 'none';
    document.getElementById('server5img').src = './inc/images/add.png';
    document.getElementById('server6').style.display = 'none';
    document.getElementById('server6img').src = './inc/images/add.png';
    document.getElementById('server7').style.display = 'none';
    document.getElementById('server7img').src = './inc/images/add.png';

}