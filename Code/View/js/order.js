function deleteOrder(id,row) {
    if (id=="") {
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200){
     var i = row.parentNode.parentNode.rowIndex;
     document.getElementById("order-table").deleteRow(i);
    document.getElementById("error").style.transform = "scale(1)";
    document.getElementById("wrong-message").innerHTML=this.responseText;
     }
}
xmlhttp.open("GET","../pages/innerorderpage.php?delete="+id,true);
xmlhttp.send();

};

function  closediv(){
    document.getElementById("error").style.transform = "scale(0)";
};
function openDetails(id) {
    if (id=="") {
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200){

     document.getElementById("details-body").innerHTML=this.responseText;
     }
}
xmlhttp.open("GET","../pages/innerorderpage.php?details="+id,true);
xmlhttp.send();

};
