
/*
 * Title                   : St Barth View
 * File                    : assets/frontend/js/google-maps-api.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 16 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Google Maps API.
*/

var geocoder,
map,
marker,
markers = new Array(),
markersOverlay = new Array(),
image = new Array(),
imageHover = new Array(),
googleFormEvent = false;

function gm_initialize(id){
    geocoder = new google.maps.Geocoder();
    var myOptions = {
        zoom: 0,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById(id), myOptions);
}

function gm_initialize2(id){
    geocoder2 = new google.maps.Geocoder();
    var myOptions = {
        zoom: 0,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map2 = new google.maps.Map(document.getElementById(id), myOptions);
}

function gm_codeAddress(address, type, name){
    geocoder.geocode({'address': address}, function(results, status){
        if (status == google.maps.GeocoderStatus.OK){
            if (type == 'map'){
                map.setCenter(results[0].geometry.location);
                google.maps.event.addListener(map, 'zoom_changed', function(){
                    zoomChangeBoundsListener = google.maps.event.addListener(map, 'bounds_changed', function(event){
                        if (this.getZoom() > 15 && this.initialZoom == true) {
                            this.setZoom(15);
                            this.initialZoom = false;
                        }
                        google.maps.event.removeListener(zoomChangeBoundsListener);
                    });
                });
                map.initialZoom = true;
                map.fitBounds(results[0].geometry.bounds);
                gm_setMarkers();
            }
            else if (type == 'marker'){
                marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            }
            else if (type == 'mapplusmarker'){
                map.setCenter(results[0].geometry.location);
                //alert(gm_displayData(results));
                $('#coordinates').val(results[0].geometry.location);
                $('#address').val(gm_validAddress(results));
                if (name == 'keep'){
                    $('#location_id').val(gm_decodeLocation($('#location').val(), 0));
                    $('#address').val(address);
                }
                google.maps.event.addListener(map, 'zoom_changed', function(){
                    zoomChangeBoundsListener = google.maps.event.addListener(map, 'bounds_changed', function(event){
                        if (this.getZoom() > 15 && this.initialZoom == true) {
                            this.setZoom(15);
                            this.initialZoom = false;
                        }
                        google.maps.event.removeListener(zoomChangeBoundsListener);
                    });
                });
                map.initialZoom = true;
                map.fitBounds(results[0].geometry.bounds);

                if (!marker){
                    marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        position: results[0].geometry.location
                    });
                }
                else{
                    marker.setPosition(results[0].geometry.location);
                }

                google.maps.event.addListener(marker, 'dragend', function(){
                    gm_getAddress(marker.getPosition());
                });
            }
        }
        else{
            //alert("Geocode was not successful for the following reason: " + status);
        }
    });

    setTimeout(function(){
        googleFormEvent = false;
    }, 1000);
}

function gm_codeLocation(coordinates, type){
    geocoder.geocode({'location': new google.maps.LatLng(coordinates.split(',')[0], coordinates.split(',')[1])}, function(results, status){
        if (status == google.maps.GeocoderStatus.OK){
            if (type == 'map'){
                map.setCenter(results[0].geometry.location);
                google.maps.event.addListener(map, 'zoom_changed', function(){
                    zoomChangeBoundsListener = google.maps.event.addListener(map, 'bounds_changed', function(event){
                        if (this.getZoom() > 15 && this.initialZoom == true) {
                            this.setZoom(15);
                            this.initialZoom = false;
                        }
                        google.maps.event.removeListener(zoomChangeBoundsListener);
                    });
                });
                map.initialZoom = true;
                map.fitBounds(results[0].geometry.bounds);
                gm_setMarkers();
            }
            else if (type == 'marker'){
                marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            }
            else if (type == 'mapplusmarker'){
                map.setCenter(results[0].geometry.location);
                google.maps.event.addListener(map, 'zoom_changed', function(){
                    zoomChangeBoundsListener = google.maps.event.addListener(map, 'bounds_changed', function(event){
                        if (this.getZoom() > 15 && this.initialZoom == true) {
                            this.setZoom(15);
                            this.initialZoom = false;
                        }
                        google.maps.event.removeListener(zoomChangeBoundsListener);
                    });
                });
                map.initialZoom = true;
                map.fitBounds(results[0].geometry.bounds);

                marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|333333|ffffff'
                });

                google.maps.event.addListener(marker, 'dragend', function(){
                    gm_getAddress(marker.getPosition());
                });
            }
        }
        else{
            alert("Geocode was not successful for the following reason: " + status);
        }
    });

    setTimeout(function(){
        googleFormEvent = false;
    }, 1000);
}

function gm_setMarkers(id){
    var locations = new Array(),
    LatLngList = new Array(),
    bounds = new google.maps.LatLngBounds(), i;
    
    gm_clearMarkers();

    for (i=0; i<offers_coordinates.length; i++){
        locations[i] = new Array();
        locations[i][0] = offers_coordinates[i].split(',')[0];
        locations[i][1] = offers_coordinates[i].split(',')[1];
        locations[i][2] = offers_coordinates[i].split(',')[2];
        locations[i][3] = offers_coordinates[i].split(',')[3];
        locations[i][4] = offers_coordinates[i].split(',')[4];
        locations[i][5] = offers_coordinates[i].split(',')[5];
        locations[i][6] = offers_coordinates[i].split(',')[6];
        locations[i][7] = i+1;
        LatLngList.push(new google.maps.LatLng(locations[i][1], locations[i][2]));
    }
    
    if (LatLngList.length > 0){
        for (i=0, LtLgLen = LatLngList.length; i<LtLgLen; i++){
            bounds.extend(LatLngList[i]);
        }
        map.fitBounds(bounds);
    }

    var infowindow = new google.maps.InfoWindow();

    for (i=0; i<locations.length; i++){
        image[i] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+locations[i][4]+'|333333|ffffff',
        imageHover[i] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+locations[i][4]+'|ff4291|ffffff',
        markers[i] = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            title: locations[i][5],
            icon: image[i]
        });

        markersOverlay.push(markers[i]);

        google.maps.event.addListener(markers[i], 'click', (function(marker, i) {
            return function(){
                if ($('#view_mode').val() == 'map'){
                    infowindow.setContent('<img src="'+locations[i][6]+'" class="search-map-image" alt="" /><br /><br /><strong class="search-map-title">'+locations[i][5]+'</strong>');
                    infowindow.open(map, marker);
                }
                else{
                    geocoder.geocode({'location': LatLngList[i]}, function(results, status){
                        if (status == google.maps.GeocoderStatus.OK){
                            map.setCenter(results[0].geometry.location);
                            map.setZoom(12);
                            google.maps.event.addListener(map, 'zoom_changed', function(){
                                zoomChangeBoundsListener = google.maps.event.addListener(map, 'bounds_changed', function(event){
                                    if (this.getZoom()>15 && this.initialZoom == true){
                                        this.setZoom(15);
                                        this.initialZoom = false;
                                    }
                                    google.maps.event.removeListener(zoomChangeBoundsListener);
                                });
                            });
                            map.initialZoom = true;
                            map.fitBounds(results[0].geometry.bounds);
                        }
                        else{
                            //alert("Geocode was not successful for the following reason: " + status);
                        }
                    });
                }
            }
        })(markers[i], i));

        google.maps.event.addListener(markers[i], 'mouseover', (function(marker, i) {
            return function() {
                $('#offer-item-'+locations[i][0]+'-'+locations[i][7]).addClass('hovered');
                markers[i].setIcon(imageHover[i]);
            }
        })(markers[i], i));

        google.maps.event.addListener(markers[i], 'mouseout', (function(marker, i) {
            return function() {
                $('#offer-item-'+locations[i][0]+'-'+locations[i][7]).removeClass('hovered');
                markers[i].setIcon(image[i]);
            }
        })(markers[i], i));
    }
}

function gm_clearMarkers(){
    if (markersOverlay){
        for (i in markersOverlay){
            markersOverlay[i].setMap(null);
        }
    }
}

function gm_showHints(address, list){
    var listContent = '', i;
    geocoder.geocode({'address': address}, function(results, status){
        if (status == google.maps.GeocoderStatus.OK){
            for (i=0; i<results.length; i++){
                listContent += '<li><a href="javascript:gm_showLocation(\''+results[i].formatted_address+'\', \''+list+'\')">'+results[i].formatted_address+'</a></li>';
            }
            $(list).html(listContent);
        }
        else{
            //alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

function gm_getAddress(location){
    geocoder.geocode({'latLng': location}, function(results, status){
        if (status == google.maps.GeocoderStatus.OK){
            $('#address').val(gm_validAddress(results));
            //alert(gm_displayData(results));
            $('#coordinates').val(results[0].geometry.location);
        }
        else{
            //alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

function gm_validAddress(data){
    var address = '', j, location = gm_decodeLocation($('#location').val(), 2);

    for (j=0; j<data[0].address_components.length; j++){
        if (data[0].address_components[j].types == 'street_number' ||
            data[0].address_components[j].types == 'route'){
            address += data[0].address_components[j].long_name+', ';
        }
        if (data[0].address_components[j].types == 'locality,political'){
            if (data[0].address_components[j].long_name == location.split(',')[0]){
                $('#locality').val('none');
            }
            else{
                $('#locality').val(data[0].address_components[j].long_name);
                address += data[0].address_components[j].long_name+', ';
            }
        }
    }

    return address+location;
}

function gm_displayData(data){
    var ret = '', i, j;
    
    for (i=0; i<data.length; i++){
        ret += "\n"+'['+i+']'+'--------------------------------------------------'+"\n";
        ret += 'address_components: '+"\n";
        for (j=0; j<data[i].address_components.length; j++){
            ret += '     ['+j+']'+"\n";
            ret += '     long_name: '+data[i].address_components[j].long_name+"\n";
            ret += '     short_name: '+data[i].address_components[j].short_name+"\n";
            ret += '     types: '+data[i].address_components[j].types+"\n";
        }
        ret += '------------------------------'+"\n";
        ret += 'formatted_address: '+"\n";
        ret += '     '+data[i].formatted_address+"\n";
        ret += '------------------------------'+"\n";
        ret += 'geometry: '+"\n";
        ret += '     bounds: '+data[i].geometry.bounds+"\n";
        ret += '     location: '+data[i].geometry.location+"\n";
        ret += '     location_type: '+data[i].geometry.location_type+"\n";
        ret += '     viewport: '+data[i].geometry.viewport+"\n";
        ret += '------------------------------'+"\n";
        ret += 'types: '+"\n";
        ret += '     '+data[i].types+"\n";
//        ret += concatObject(data[i]);
    }

    return ret;
}

function concatObject(obj) {
  str='';
  for(prop in obj){
    str+=prop + " value :"+ obj[prop]+"\n";
  }
  return(str);
}

function gm_showMap(list){
    googleFormEvent = true;
    gm_codeAddress($('#address').val(), 'mapplusmarker');
    $(list).html('<li></li>');
    return false;
}

function gm_showLocation(address, list){
    if (!googleFormEvent){
        $('#address').val(gm_decodeLocation(address));
        $(list).html('<li></li>');
        gm_codeAddress(gm_decodeLocation(address, 2), 'mapplusmarker', 'keep');
    }
    else{
        googleFormEvent = false;
    }
}

function gm_decodeLocation(data, pos){
    return data.split(';;')[pos];
}