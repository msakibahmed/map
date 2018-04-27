            <?php 
            $ids = get_field('neighborhood_relations_with_aparment', false, false);
			if( $ids ): //This most imprtant conditions for catagorywise relationsship post query
				$mapquery = new WP_Query(array(
					'post_type'      	=> 'neighborhood',
					'posts_per_page'	=> -1,
					'post__in'			=> $ids,
					'post_status'		=> 'any',
					'orderby'        	=> 'post__in',
					
				));
				?>
				<script>
				var markers = [
				<?php
				if ( $mapquery->have_posts() ):
					while ( $mapquery->have_posts() ) : $mapquery->the_post();
						$mapinfo = get_field('_neighborhood_map');
						?>
						{
							"title"			: '<?php echo get_the_title() ;?>',
							"lat"			: '<?php echo $mapinfo['lat']; ?>',
							"lng"			: '<?php echo $mapinfo['lng']; ?>',
							"description"	: "<div class='map-neighbour'><h1><?php echo get_the_title(); ?></h1></div>",
							"icon"			: '<?php the_field("map_indicator_icon"); ?>'
						},
						<?php
					endwhile;
				endif;
				?>
				];
				</script>
				<?php
			endif;
			?>
			<?php wp_reset_query(); ?>

           <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDr-oU870bxiB7TJcrlfAtN9HjEvZzjdGI&callback=LoadMap"></script> 
                $lats   = get_field('street_view_lat'); 
                $langs  = get_field('street_view_long');
                $latsi  = (float)$lats;
                $langsi = (float)$langs;
            ?>
        	<script type="text/javascript">
                jQuery(document).ready(function() {
                    //console.log( "ready!" );
                    jQuery(".streetviewl").click(function(){
                        setTimeout(function() {
                            jQuery("#street-view").click();
                            LoadMap();
                        }, 1000);
                       //alert("street view");
                    });
                    jQuery("#markermap").click(function(){
                        //alert("map");
                        setTimeout(function() {
                            LoadMap();
                        }, 1000);
                    });

                    jQuery("#dvMap").find(function(){
                        //alert("Map loaded.");
                        LoadMap();
                    });
                
                    /*window.onload = function () {
                        LoadMap();
                    } */
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

                        var fenway = {lat:<?php echo $latsi;?>, lng:<?php echo $langsi;?>};
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