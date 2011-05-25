
var geocoder;
var map;
var marker;
var markers = new Array();
var googleFormEvent = false;

function initializeGoogleMap(id){
    geocoder = new google.maps.Geocoder();
    var myOptions = {
        zoom: 0,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById(id), myOptions);
}

function codeGoogleMapAddress(address, type){
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

                setGoogleMapMarkers();
            }
            else if (type == 'marker'){
                marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            }
            else if (type == 'mapplusmarker'){
                map.setCenter(results[0].geometry.location);
                $('#coordinates').val(results[0].geometry.location);
                $('#address').val(results[0].formatted_address);
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
                    showGoogleMapGetAddress(marker.getPosition());
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

function setGoogleMapMarkers(id){
    var locations = new Array(), i;

    for (var i=0; i<offers_coordinates.length; i++){
        locations[i] = new Array();
        locations[i][0] = 'Location '+i;
        var LatS = offers_coordinates[i].split(',')[0],
        Lat = parseFloat(LatS.split('(')[1]),
        Lng = parseFloat(offers_coordinates[i].split(',')[1]);
        locations[i][1] = Lat;
        locations[i][2] = Lng;
        locations[i][3] = i;
    }

    var infowindow = new google.maps.InfoWindow();

    for (i = 0; i < locations.length; i++) {
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}

function showGoogleMapHints(address, list){
    var listContent = '', i;
    geocoder.geocode({'address': address}, function(results, status){
        if (status == google.maps.GeocoderStatus.OK){
            for (i=0; i<results.length; i++){
                listContent += '<li><a href="javascript:showGoogleMapLocation(\''+results[i].formatted_address+'\', \''+list+'\')">'+results[i].formatted_address+'</a></li>';
            }
            $(list).html(listContent);
        }
        else{
            //alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

function showGoogleMapGetAddress(location){
    geocoder.geocode({'latLng': location}, function(results, status){
        if (status == google.maps.GeocoderStatus.OK){
            var ret, i;
            for (i = 0; i<results[0].address_components.length; i++){
                ret += concatObject(results[0].address_components[i])+'---';
            }
            //alert(ret);
            $('#address').val(results[0].formatted_address);
            $('#coordinates').val(results[0].geometry.location);
        }
        else{
            //alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

function concatObject(obj) {
  str='';
  for(prop in obj)
  {
    str+=prop + " value :"+ obj[prop]+"\n";
  }
  return(str);
}

function showMap(list){
    googleFormEvent = true;
    codeGoogleMapAddress($('#address').val(), 'mapplusmarker');
    $(list).html('<li></li>');
    return false;
}

function showGoogleMapLocation(address, list){
    if (!googleFormEvent){
        $('#address').val(address);
        $(list).html('<li></li>');
        codeGoogleMapAddress($('#address').val(), 'mapplusmarker');
    }
    else{
        googleFormEvent = false;
    }
}

function showGoogleMapLocation1(list){
    if (!googleFormEvent){
        var location = 'st-barth';
        if ($('#location1').val() == 'Miami'){
            location = 'miami';
        }
        $('#address').val($('#location1').val());
        $(list).html('<li></li>');
        
        $.post(BASE_URL+'functions/locations', {location:location}, function(data){
            $('#location2').html(data);
            codeGoogleMapAddress($('#address').val(), 'mapplusmarker');
        });        
    }
    else{
        googleFormEvent = false;
    }
}

function showGoogleMapLocation2(list){
    if (!googleFormEvent){
        $('#address').val($('#location2').val()+', '+$('#location1').val());
        $(list).html('<li></li>');
        codeGoogleMapAddress($('#address').val(), 'mapplusmarker');
    }
    else{
        googleFormEvent = false;
    }
}