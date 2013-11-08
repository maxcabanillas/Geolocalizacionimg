<?php
/**
 * @Autor: Gregorio Bolívar
 * @email: elalconxvii@gmail.com
 * @Fecha de Creacion: 18/09/2012
 * @Auditado por: Gregorio J Bolívar B
 * @Descripcion: Permite consultar una dirección con google map y permite hacer busqueda por gps, API gMap V3
 * @package: gmap
 * @version: 1.0
 */
?>
<html>
 <meta charset="utf-8">
    <title>Google Maps JavaScript API v3 Example: Desarrollado por Gregorio Bolivar</title>
<head>
<style type="text/css">
  div#map {
    position: relative;
    width: 100%;
  }
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var map;
  var geocoder;
  var markersArray = [];

  function initialize() {
    /** La latitud y longitud que debe tener la empresa cuando inicia la primera vez */
    var latlng = new google.maps.LatLng(10.467933616470583, -66.87950834999998);
    var myOptions = {
      zoom: 10,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    geocoder = new google.maps.Geocoder();
    
    /** Funcion para poder tener el elemento results y poder tener el address */
    geocoder.geocode({'latLng': latlng}, function(results, status) {
        
    
    /** Address o nombre del sitio donde se encuentra*/
    VAddress= results[0].formatted_address;
    
    /** Funcion encargada de mandar la información al label */
    setLabel(latlng,VAddress)              

    /** Agrego el marker y poder hacer una ventana flotante con los datos del mismo */
    MuestraInfoW(latlng, VAddress, 'Nombre Empresa');
    /** Evento cuando de un click agrege otra posicion al marker y cambie la posición del viejo */
    google.maps.event.addListener(map, "click",function(event) {
            /** Instanciar la funcion para eliminar los marker */
            clearOverlays();
            /** Funcion encargada de mandar la información al label */
            setLabel(event.latLng,VAddress)              

            MuestraInfoW(event.latLng, VAddress, 'Nombre Empresa');

  
            google.maps.event.addListener(marker, 'click', function(event) {
                infowindow.open(map,marker);
            });

             /** Agregar animacion al mapeo */
             if (marker.getAnimation() != null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.DROP);
                }              
        }       
    );
    });
    
  }
    /** Permite limpiar las markers que ya estan seleccionados */
    function clearOverlays() {
        if (markersArray) {
            for (i in markersArray) {
            markersArray[i].setMap(null);
            }
        }
    }

  function geocode() {
    var address = document.getElementById("address").value;
    geocoder.geocode({
      'address': address,
      'partialmatch': false}, geocodeResult);
 
  }

  function geocodeResult(results, status) {
    
   if (status == 'OK' && results.length > 0) {
            if(results.length == 0) {
                document.getElementById('formatedAddress').innerHTML = 'None';
            } else {
                map.fitBounds(results[0].geometry.viewport);
                clearOverlays();
                 VLatlng = results[0].geometry.location;
                 VAddress = results[0].formatted_address;
                 setLabel(VLatlng,VAddress)              
                 MuestraInfoW(VLatlng,VAddress)
            }
    } else {
       document.getElementById('formatedAddress').innerHTML = 'Error';
      alert("Geocode no tuvo &eacute;xito por la siguiente raz&oacute;n: " + status);
    }
  }
/** Funcion que permite escribir los cambios a las id especificos tambien se puede mejorar con Jquery */
function setLabel(VLatlng,VAddress){
    document.getElementById('latlng').innerHTML = VLatlng;
    document.getElementById('formatedAddress').innerHTML = VAddress
}
function MuestraInfoW(latilongi, leyenda, title) {
    var marker = new google.maps.Marker({
                    position: latilongi,
                    editable: true,
                    map: map,
                    zoom: 4,
                    title: title,
                    draggable:true,
                    
                    animation: google.maps.Animation.DROP
         });  
    markersArray.push(marker);
    
    google.maps.event.addListener(marker, 'mouseup', function(){
        infowindow.open(map, marker);
    });            
    google.maps.event.addListener(marker, 'mouseout', function(){
        infowindow.close();
    });
    
    /** Muestra la posicion del elemento  */
    var infowindow = new google.maps.InfoWindow({
        content: 'Leyenda: ' + leyenda + ' \nLat/Lng: '+ latilongi,
        maxWidth: 220
    });
                            
}  

</script>
</head>
<body onload="initialize()">
  <center>
    Buscar Lugar: <input type="text" id="address"/>
    <input type="button" value="Procesar..." onclick="geocode()">
        <div id="map">
            <div id="map_canvas" style="width:50%; height:70%"></div>
        </div>

    <table>
        <tr><td>Lat/Lng:</td><td><div id="latlng"></div></td></tr>
        <tr><td>Address:</td><td><div id="formatedAddress"></div></td></tr>
    </table>
 </center>
</body>
</html>
