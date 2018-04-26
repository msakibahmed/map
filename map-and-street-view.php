<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="fluid">
  <h2>Multiple Marker Map and Street View Map</h2>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" id="markermap">MAP</a></li>
    <li><a data-toggle="tab" href="#menu1" id="streetviewl">SREET VIEW</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Multiple Marker Map</h3>
      <div id="dvMap" style="width: auto; height: 600px"></div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Street View Map</h3>
      <div id="pano" style="width: auto; height: 600px"></div>
    </div>
    
  </div>
</div>



    
   
            <script>
              var markers = [
                              {
                                "title"     : 'Ortiz Middle School',
                                "lat"     : '29.66329440000001',
                                "lng"     : '-95.2875469',
                                "description" : "<div class='map-neighbour'><h1>Ortiz Middle School</h1></div>",
                                "icon"      : 'http://localhost/verde_online/wp-content/uploads/2018/02/location-icon-4.png'
                              },
                              {
                                "title"     : 'Judd M Lewis Elementary School',
                                "lat"     : '29.6656959',
                                "lng"     : '-95.28261040000001',
                                "description" : "<div class='map-neighbour'><h1>Judd M Lewis Elementary School</h1></div>",
                                "icon"      : 'http://localhost/verde_online/wp-content/uploads/2018/02/location-icon-4.png'
                              },
                              {
                                "title"     : 'Garden Villas Elementary School',
                                "lat"     : '29.6620027',
                                "lng"     : '-95.3035324',
                                "description" : "<div class='map-neighbour'><h1>Garden Villas Elementary School</h1></div>",
                                "icon"      : 'http://localhost/verde_online/wp-content/uploads/2018/02/location-icon-4.png'
                              },
                              {
                                "title"     : 'Chavez High School',
                                "lat"     : '29.6868635',
                                "lng"     : '-95.25463389999999',
                                "description" : "<div class='map-neighbour'><h1>Chavez High School</h1></div>",
                                "icon"      : 'http://localhost/verde_online/wp-content/uploads/2018/02/location-icon-4.png'
                              },
                              {
                                "title"     : 'Kelly’s Country Cooking',
                                "lat"     : '29.5578838',
                                "lng"     : '-95.2671487',
                                "description" : "<div class='map-neighbour'><h1>Kelly’s Country Cooking</h1></div>",
                                "icon"      : 'http://localhost/verde_online/wp-content/uploads/2018/01/club-icon-4.png'
                              },
                              {
                                "title"     : 'Habanera &#038; the Gringo',
                                "lat"     : '29.649734',
                                "lng"     : '-95.2506027',
                                "description" : "<div class='map-neighbour'><h1>Habanera &#038; the Gringo</h1></div>",
                                "icon"      : 'http://localhost/verde_online/wp-content/uploads/2018/01/club-icon-4.png'
                              },
                            ];
            </script>
              
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDr-oU870bxiB7TJcrlfAtN9HjEvZzjdGI&callback=LoadMap"></script> 
            <script type="text/javascript">
                jQuery(document).ready(function() {
                   
                    

                    jQuery("#dvMap").find(function(){
                        //alert("Map loaded.");
                        LoadMap();
                    });
                    jQuery("#streetviewl").click(function(){
                        setTimeout(function() {
                            LoadMap();
                        }, 1000);
                    });

                    jQuery("#markermap").click(function(){
                        setTimeout(function() {
                            LoadMap();
                        }, 1000);
                    });
                    function LoadMap() {
                        var mapOptions = {
                            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
                            // zoom: 8, //Not required.
                            //mapTypeId: google.maps.MapTypeId.ROADMAP,
                              styles: [
                                        {
                                            "featureType": "all",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "off"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "landscape",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "hue": "#ffbb00"
                                                },
                                                {
                                                    "saturation": 43.400000000000006
                                                },
                                                {
                                                    "lightness": 37.599999999999994
                                                },
                                                {
                                                    "gamma": 1
                                                },
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "poi",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "hue": "#00ff6a"
                                                },
                                                {
                                                    "saturation": -1.0989010989011234
                                                },
                                                {
                                                    "lightness": 11.200000000000017
                                                },
                                                {
                                                    "gamma": 1
                                                },
                                                {
                                                    "visibility": "simplified"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "road.highway",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "hue": "#FFC200"
                                                },
                                                {
                                                    "saturation": -61.8
                                                },
                                                {
                                                    "lightness": 45.599999999999994
                                                },
                                                {
                                                    "gamma": 1
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "road.arterial",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "hue": "#FF0300"
                                                },
                                                {
                                                    "saturation": -100
                                                },
                                                {
                                                    "lightness": 51.19999999999999
                                                },
                                                {
                                                    "gamma": 1
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "road.local",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "hue": "#FF0300"
                                                },
                                                {
                                                    "saturation": -100
                                                },
                                                {
                                                    "lightness": 52
                                                },
                                                {
                                                    "gamma": 1
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "water",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "hue": "#0078FF"
                                                },
                                                {
                                                    "saturation": -13.200000000000003
                                                },
                                                {
                                                    "lightness": 2.4000000000000057
                                                },
                                                {
                                                    "gamma": 1
                                                }
                                            ]
                                        }
                                    ]
                        };
                        var infoWindow = new google.maps.InfoWindow();
                        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

                        //Create LatLngBounds object.
                        var latlngbounds = new google.maps.LatLngBounds();
                 
                        for (var i = 0; i < markers.length; i++) {
                            var data = markers[i]
                            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                            var marker = new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                title: data.title,
                                icon: data.icon
                            });


                            (function (marker, data) {
                                google.maps.event.addListener(marker, "click", function (e) {
                                    infoWindow.setContent("<div style = 'width:300px;min-height:40px'>" + data.description + "</div>");
                                    infoWindow.open(map, marker);
                                });
                            })(marker, data);
                 
                            //Extend each marker's position in LatLngBounds object.
                            latlngbounds.extend(marker.position);
                        }
                        //Get the boundaries of the Map.
                        var bounds = new google.maps.LatLngBounds();
                        //Center map and adjust Zoom based on the position of all markers.
                        map.setCenter(latlngbounds.getCenter());
                        map.fitBounds(latlngbounds);

                        //street view map start

                        var fenway = {lat:29.6621515, lng:-95.2768747};
                        //var fenway = {lat: 42.345573, lng: -71.098326};
                        var panorama = new google.maps.StreetViewPanorama(
                            document.getElementById('pano'), {
                              position: fenway,
                              pov: {
                                heading: 34,
                                pitch: 10
                              }
                            });
                        map.setStreetView(panorama);
                        //end view map start
                    }
                });
            </script>
</body>
</html>
