function OpenDiv1() {
  var thediv =document.getElementById("div") ;
  thediv.style.transform = "scale(1)"
}
function closeDiv1() {
  var thediv =document.getElementById("div") ;
  thediv.style.transform = "scale(0)"
}
function OpenDiv2() {
  var thediv =document.getElementById("div2") ;
  thediv.style.transform = "scale(1)"
}
function closeDiv2() {
  var thediv =document.getElementById("div2") ;
  thediv.style.transform = "scale(0)"
}
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","orderpage.php?q="+str,true);
  xmlhttp.send();
}
