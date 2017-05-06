function deleteReservation(id,row) {
  if (id=="") {
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200){
      var i = row.parentNode.parentNode.rowIndex;
      document.getElementById("reservation-table").deleteRow(i);
    }
  }
  xmlhttp.open("GET","../pages/reservations.php?id="+id,true);
  xmlhttp.send();

}
function editReservaion(id) {
  document.getElementById("id").value= id;
}