// setting map in here
var map, marker, infoWindow, destinations = [];
var infoWindow3;

const uluru = { lat: 10.030255967144265, lng: 105.7706231853938 };
function initMap() {

    //Tao mới đối tượng Map
    var posi = new google.maps.LatLng(16.143123, 107.599573);
    map = new google.maps.Map(document.getElementById("map"), {
        center: posi,
        zoom: 5.8,
    });

    //Create maker
    marker = new google.maps.Marker({
        position: posi,
        map: map,
        animation: google.maps.Animation.BOUNCE,
        title: 'Your location',
    });

    //Lấy vị trí hiện tại
    geolocationControl();
    infoWindow = new google.maps.InfoWindow();
    function geolocationControl(){
        if (navigator.geolocation) {
            // navigator.geolocation.getCurrentPosition(function () {}, function () {}, {});
            var geocoder = new google.maps.Geocoder();
            navigator.geolocation.getCurrentPosition(
              (position) => {
                const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };
                calculateDistances();
                marker.setPosition(pos);
                infoWindow.open(map);
                map.setCenter(pos);
                crateListMarkers();
                infoWindow.open(map);
                map.setZoom(14);
               
              },
              () => {
                    console.log('Dung api ipinfo.io');
                    $.getJSON('https://ipinfo.io/geo', function(response) { 
                        var loc = response.loc.split(',');
                        var pos = {
                            lat: Number(loc[0]),
                            lng: Number(loc[1])
                        };
                        map.setCenter(pos);
                        marker.setPosition(pos);
                        crateListMarkers();
                        map.setZoom(12);
                        calculateDistances();
                    });    
                },
                {maximumAge:60000, timeout:5000, enableHighAccuracy:true}           
            );
        }else{
            timeout:5000;
            alert("Trình duyệt của bạn không cho phép sử dụng Location!");
        }
    }


    //Lấy danh sách các cửa hàng
    var stores = [];
    $.each( locations, function( index, value ){                    
       stores.push({ lat: parseFloat(value.store_latitude) , lng: parseFloat(value.store_longitude) })
    });

    //Bat su kien marker click
    google.maps.event.addDomListener(marker, 'click', () => {
        infoWindow.open(map, marker);
    });
    map.addListener('click', function(){
        infoWindow.close();
    });

    //Tao list markets
    // var markers = [
    //     { 'coord': { lat: 10.030092165781179, lng: 105.77060456859033 }, 'title': 'info winfow 1' },
    //     { 'coord': { lat: 10.064523210390112, lng: 105.75656614195712 }, 'title': 'info winfow 2' },
    //     { 'coord': { lat: 10.023345113755052, lng: 105.72275605904842 }, 'title': 'info winfow 3' }, 
    //     { 'coord': { lat: 10.055275446346032, lng: 105.7334437288677  }, 'title': 'info winfow 5'},
    //     { 'coord': { lat: 10.031229036173745, lng: 105.80303169953818 }, 'title': 'info winfow 6' }
    // ]

    // var markers2 = [{ lat: 10.030092165781179, lng: 105.77060456859033 },
    //     { lat: 10.064523210390112, lng: 105.75656614195712 },
    //     { lat: 10.023345113755052, lng: 105.72275605904842 },
    //     { lat: 10.055275446346032, lng: 105.7334437288677  },
    //     { lat: 10.031229036173745, lng: 105.80303169953818 }
    // ]

    function crateListMarkers(){
        for(var i=0; i < stores.length ; i++){
            var item = crateNewMarker(stores[i]);
            destinations.push(item);
        }
    }
    
    infoWindow  = new google.maps.InfoWindow({
        content: "Shop",
        maxwidth: 100,
    });
    
    //Tạo Icon cho những marker của shop
    var icon = {
        url: "vendor/frontend/images/icon-map/location.png", // url
        scaledSize: new google.maps.Size(40, 40), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };
    function crateNewMarker(pos){        
        var newMarker = new google.maps.Marker({
            position: pos,
            title: 'Shop location',
            animation: google.maps.Animation.DROP,
            map: map,
            icon: icon,
        })
        newMarker.addListener('click', () => {
            infoWindow.open(map, newMarker);
            calculateAndDisplayRoute(newMarker);
        })
        return newMarker;
    }

    //Direction service
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    
    //Distance matrix service
    const derectionDistanceService = new google.maps.DistanceMatrixService();
    infoWindow3 = new google.maps.InfoWindow();

    function calculateAndDisplayRoute(newMarker) {
        var middle; //Tạo điểm chính giữa
        directionsRenderer.setMap(map);
        //Định tuyến tuyến đường
        directionsService.route(
          {
            origin: marker.getPosition(),
            destination: newMarker.getPosition(),
            travelMode: google.maps.TravelMode.DRIVING,
          },function(response, status) {
            if (status === "OK") {
              directionsRenderer.setDirections(response);
              //Tinh diem chinh giua 2 marker
              var m = Math.ceil((response.routes[0].overview_path.length)/2);
              middle = response.routes[0].overview_path[m];
                //Tinh khoan cach
              derectionDistanceService.getDistanceMatrix(
                {
                  origins: [marker.getPosition()],
                  destinations: [newMarker.getPosition()],
                  travelMode: google.maps.TravelMode.DRIVING,
                  unitSystem: google.maps.UnitSystem.METRIC,
                  avoidHighways: false,
                  avoidTolls: false,
                }, function (response, status){
                    if (status !== "OK") {
                      alert("Error was: " + status);
                    } else {
                        const originList = response.originAddresses;
                        for (let i = 0; i < originList.length; i++) {
                            const results = response.rows[i].elements;
                            for (let j = 0; j < results.length; j++) {
                                var element = results[j];
                                var dt = element.distance.text; 
                                var dr = element.duration.text;
                            }
                        }
                        var content = "<div>" +dt+ "<br>"+ dr + "</div>";
                        infoWindow3.setContent(content);
                        infoWindow3.setPosition(middle);
                        infoWindow3.open(map);
                    }
                }
              )
            } else {
              window.alert("Directions request failed due to " + status);
            }
          }
        );
    }
 
    function calculateDistances() {
        console.log(stores);
        var service = new google.maps.DistanceMatrixService();
        directionsRenderer.setMap(map);
        service.getDistanceMatrix({
            origins: [marker.getPosition()], //array of origins
            destinations: stores, //array of destinations
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false
        }, function(response, status) {
            if (status != google.maps.DistanceMatrixStatus.OK) {
                alert('Error was: ' + status);
            } else {
                var routes = response.rows[0];
                //need to find the shortest 
                var lowest = Number.POSITIVE_INFINITY;
                var tmp;
                var shortestRouteIdx;
                // var resultText = "Possible Routes: <br/>";
                for (var i = routes.elements.length - 1; i >= 0; i--) {
                    tmp = routes.elements[i].duration.value;
                    // resultText += "Route " + destinations[i] + ": " + tmp + "<br/>";
                    if (tmp < lowest) {
                        lowest = tmp;
                        shortestRouteIdx = i;
                    }
                }
                var shortestRoute = stores[shortestRouteIdx];
                calculateRoute(shortestRoute);
            }
        });
    }

    //Calculate the route of the shortest distance we found.
    function calculateRoute(shortestRoute) {     
        directionsService.route({
            origin: marker.getPosition(),
            destination: shortestRoute,
            travelMode: google.maps.TravelMode.DRIVING
        }, function (result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsRenderer.setDirections(result);
                }
            }
        )
    }

}