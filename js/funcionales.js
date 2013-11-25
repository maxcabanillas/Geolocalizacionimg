
 function Radio(){
	$(":radio:eq(0)").click(function(){
        $("#fechas").hide(1000);
    });
    $(":radio:eq(1)").click(function(){
        $("#fechas").show(1000);
    });
 }

 function Callendar(){
	$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: 'Anterior',
			nextText: 'Siguiente',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
			'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
			'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
			dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
			};
			$.datepicker.setDefaults($.datepicker.regional['es']);
 }
 
 function Select(){
	$('.styled').customSelect();
	$("#Municipios").multiselect();
	$("#campanas").multiselect();
	//$( ".fechas" ).hide();
};

function Dias(){
	$( "#fecha_ini" ).datepicker();
	$( "#fecha_fin" ).datepicker();
}
 
var map =null;
var infoWindow=null;
var markers = [];

$(document).ready(function(){ 	  

		Radio();
		Callendar();
		Select();
		Dias();
        /* FancyBox */
        $(".fancybox").fancybox();	
        $(".abrirDetalles").fancybox({
            maxWidth  : 800,
            maxHeight : 600,
            fitToView : false,
            width   : '70%',
            height    : '70%',
            autoSize  : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none'
        }); 
			
        /* Obtención de datos formulario */
        $('#busca').bind('click',function(){   
            var strTipo = $('#tipo').val();    
            /* var strLat = $('#municipio option:selected').attr('lat'); */
            /* var strLon = $('#municipio option:selected').attr('long');    */
			var strLat = "20.82801";
            var strLon = "-101.046753";
			var zoom1 = 12;
			var zoom2 = 8;
            var strAlerta = "";      
        	//var strMunicipio = $('#municipio').val();
			var allMunicipios = "0";
			var contador = 0;
			var strMunicipio = document.getElementById("Municipios");
			for (var i = 0; i < strMunicipio.options.length; i++) {
				if (strMunicipio.options[i].selected == true) {
					//alert(strMunicipio.options[i].value);
					contador = contador + 1;
					allMunicipios = allMunicipios+","+strMunicipio.options[i].value;
				}
			}
			var allCampanas = "0";
			var contadorCampana = 0;
			var strCampana = document.getElementById("campanas");
			for (var i = 0; i < strCampana.options.length; i++) {
				if (strCampana.options[i].selected == true) {
					//alert(strCampana.options[i].value);
					contadorCampana = contadorCampana + 1;
					allCampanas = allCampanas+","+strCampana.options[i].value;
				}
			}		
			//alert(allMunicipios);
            var strproveedores = "";
			if(contador == 1){
				strLat = $('#Municipios option:selected').attr('lat');
				strLon = $('#Municipios option:selected').attr('long'); 
            	Load(strLat,strLon,zoom1);
			}else{
				Load(strLat,strLon,zoom2);
			}
			BuscarLugares(strTipo,allMunicipios, strAlerta,strproveedores,allCampanas);
        });
		$('#guardar').bind('click',function(){ 
			
		});
    })

/* Inicializa Mapa */
function Load(plat,plong,acercamiento){  
	 infoWindow = new google.maps.InfoWindow;
 	 map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(plat,plong),
        zoom: acercamiento,/*era 12*/
        mapTypeId: 'hybrid'
     });
 }
 
 
function ParseJson(data){
  $.each(data, function(key, val) {
  });
}
/* Obtiene JSON  */
function BuscarLugares(pIntTipo, pStrValor,strAlerta,strProveedores,strCampanas){
  /* Limpiamos DIV */
  $("#marcas").empty();
  /* Seteamos variable global en 0*/
  markers = [];
  /* Consecutivo */
  var intConsecutivo=0;
  /* Parsea JSON */

	$.getJSON('leerDatos.php?municipio=' + pStrValor + "&tipo=" + pIntTipo+"&campanas=" + strCampanas, function(data) {		
    //  $("#marcas").append("<ul class='col2'>");
	  var marcas = "<ul class='col2'>";    
		var marcas1 = document.getElementById('marcas');
		
   ParseJson(data);       
	  	$.each(data, function(key, val) {
		var dt = new Date();
		//alert('dia: '+dt.getDate()+" mes: "+dt.getMonth());
        var id = 0;
        var point;
        var html="";
        var icono="";
        var semaforo="";
        var preview="";
		var mes = 0;
		var dia = 0;
		var diaAct = parseInt(dt.getDate());
		var mesAct = parseInt(dt.getMonth())+1;
		var resta = 0;
		//alert(diaAct+"    "+mesAct);
        /* Espectaculares */
        if(pIntTipo==1){
		   var date = val.fecha_fin.split("-");
		    diasdif = parseInt(val.datedif)
			if(val.fecha_fin != "0000-00-00"){
				if(diasdif <= 5){
					semaforo = "rojo";
				}
				if(diasdif < 10 && val.datedif > 5){
					semaforo = "amarillo";
				}
				if(diasdif >= 10){
					semaforo = "verde";
				}
			}else{
				semaforo = "verde";
			}
			//alert(semaforo);
		   id = val.idEspectacular;           
           //semaforo = getColor(val.dias);   

           pic = val.Foto; 
		   var n=pic.split("/");
		   preview = n[4];
			//alert(val.Longitud);
           point = new google.maps.LatLng(parseFloat(val.Latitud), parseFloat(val.Longitud));
           html="<table width='100%' border='0'>"+
                "<tr>" + 
                "<td>" +val.Clave+"</td>"+
                "<td rowspan='10' align='right'></td>"+
                "</tr><tr>" + 
                "<td><img src='img/uploads/reales/espectaculares/thums/"+preview+"'></td>"+
                "</tr><tr>" + 
                "<td>" +val.nombre + "   <img src='img/semaforo/"+semaforo+".png'></td>"+
                "</tr><tr>" + 
                "<td></td>"+
                "</tr><tr>" + 
                 "<td><a class='abrirDetalles' data-fancybox-type='iframe' href='detalles.php?id="+id+"&tipo="+pIntTipo+"&idcampana="+val.idcampanas+" '>ver detalles</a></td>"+
                "</tr></table>";
           
            //      "<a class='abrirDetalles' data-fancybox-type='iframe' href='detalles.php?id="+id+"&tipo ="+pIntTipo+" '>ver detalles</a>";
            icono = val.Icono;  
        } 
        /* Bardas */
        else{
           id = val.idBarda;
           point = new google.maps.LatLng(parseFloat(val.Latitud), parseFloat(val.Longitud));
           html = "<b>Clave: </b>" + val.Clave + "<br/><b>Medidas:</b>" +  val.Medidas + "<br/>" + 
                  "<a class='abrirDetalles' data-fancybox-type='iframe' href='detalles.php?id="+id+"&tipo="+pIntTipo+"&idcampana="+val.idcampanas+" '>ver detalles</a>";
          icono = val.Icono;   
        }               	 
	   		var marker = new google.maps.Marker({
	            map: map,
              icon: icono,
	            position: point,
	            draggable: false,	     		
	     		 title: ''
	          });           
           //$("#marcas").append("<li><a href='javascript:gotoPoint("+intConsecutivo+");'>"+val.Clave+"</a></li>");       
	          marcas = marcas+""+"<li><a href='javascript:gotoPoint("+intConsecutivo+");'>"+val.Clave+"</a></li>";
			  bindInfoWindow(marker, map, infoWindow, html);
            markers.push(marker);
           intConsecutivo++;
	  	});
           //$("#marcas").append("</ul>");
		   marcas = marcas +""+"</ul>";
		   marcas1.innerHTML = marcas;
		   //alert(marcas);
	});
}

function getColor(pIntDias){   
  pIntDias=parseInt(pIntDias);  
  var int_dias_rojo=2;
  var int_dias_verde=5;
  if(!isNaN(pIntDias)){
    if(pIntDias<0){  // Aún faltan días
      if(Math.abs(pIntDias)<=int_dias_rojo){
        return "rojo";
      }
      else if(Math.abs(pIntDias)>=int_dias_verde){
        return "verde";
      }
      else if (Math.abs(pIntDias)>int_dias_rojo && Math.abs(pIntDias)<int_dias_verde){
        return "ambar";
      }

    }
    else if(pIntDias>0){ //  es el día
      return "negro";
    }   
    else{
      return "rojo";
    }     
  }
  else{
    return "negro";
  }

}

function gotoPoint(myPoint){    
     google.maps.event.trigger(markers[myPoint], 'click');     
}

/* Funcion para mostrar los mensajes en las marcas */
function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }