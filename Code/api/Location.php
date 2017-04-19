
<script>

function getLocation() {
    if (navigator.geolocation) {
	alert("PLEASE LET US KNOW YOUR LOCATION");
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else { 
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {

    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var latlon = latitude + "," + longitude;
window.location.href="../pages/index.php?lat="+latitude+"&long="+longitude;


}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("User denied the request for Geolocation.");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            alert("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.");
            break;
    }
}

</script>


<?php


	echo ' <script> getLocation(); </script> ';


?>
