
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else { 
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {

    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var latlon = latitude + "," + longitude;
    window.location.href+="?lat="+latitude+"&long="+longitude;


}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            //alert("You denied the request for Geolocation.\nPlease allow the request to know your location");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("We can't access your location!\nPlease check your internet.");
            break;
        case error.TIMEOUT:
            alert("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.");
            break;
    }
}
