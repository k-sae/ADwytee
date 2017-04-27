function OpenDiv() {
  var FName =document.getElementById("FName") ;
  if (window.XMLHttpRequest) {
	    xmlhttp=new XMLHttpRequest();
	  } else {
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (this.readyState==4 && this.status==200) {
	      document.getElementById("livesearch").innerHTML=this.responseText;
	      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
	      document.getElementById("livesearch").style="background-color: #ffffff";
	    }
	  }
	  xmlhttp.open("GET","../../Application/livesearch.php?q="+str,true);
	  xmlhttp.send();
}