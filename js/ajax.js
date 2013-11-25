function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function AgregarCampana(){

    divContenido = document.getElementById('search');
	var campana = document.getElementById("campana").value;
	//alert(divContenido);
	ajax=objetoAjax();
		
        var fecha = new Date();
        var marca = encodeURIComponent(fecha.getTime());
        ajax.open("GET", "bardas.php?campana="+campana+"&x="+marca);
		
        
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {

            divContenido.innerHTML = ajax.responseText
			Radio();
			Callendar();
			Select();
        }
    }
    ajax.send(null)
}


function AgregarCampanaEsp(){

    divContenido = document.getElementById('act');
	var campana = document.getElementById("campana").value;
	
	ajax=objetoAjax();
		
        var fecha = new Date();
        var marca = encodeURIComponent(fecha.getTime());
        ajax.open("GET", "espectaculares.php?campana="+campana+"&x="+marca);
		
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divContenido.innerHTML = ajax.responseText
			Radio();
			Callendar();
			Select();
        }
    }
    ajax.send(null)
}



function ActCampanas(id,idC){
	
    divContenido = document.getElementById('espectacularesdiv');
	ajax=objetoAjax();
		
        var fecha = new Date();
        var marca = encodeURIComponent(fecha.getTime());
        ajax.open("GET", "ActCampanas.php?esp="+id+"&camp="+idC+"&x="+marca);
		
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divContenido.innerHTML = ajax.responseText
			Radio();
			Callendar();
			Select();
			Dias();
        }
    }
    ajax.send(null)
}



function ActCampanasBardas(id,idC){
	
    divContenido = document.getElementById('espectacularesdiv');
	ajax=objetoAjax();
		
        var fecha = new Date();
        var marca = encodeURIComponent(fecha.getTime());
        ajax.open("GET", "ActCampanasBardas.php?b="+id+"&camp="+idC+"&x="+marca);
		
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divContenido.innerHTML = ajax.responseText
			Radio();
			Callendar();
			Select();
			Dias();
        }
    }
    ajax.send(null)
}




function EliminarCamp(idCamp,idVig,idEsp){
	
    divContenido = document.getElementById('espectacularesdiv');
	
	ajax=objetoAjax();
		
        var fecha = new Date();
        var marca = encodeURIComponent(fecha.getTime());
		var r = confirm("Deseas eliminar la campa\u00f1a?");
		if (r == true)
		  {
			ajax.open("GET", "ActCampanas.php?camp="+idCamp+"&idv="+idVig+"&esp="+idEsp+"&eliminar=1&x="+marca);
				
			ajax.onreadystatechange=function() {
				if (ajax.readyState==4) {
					divContenido.innerHTML = ajax.responseText
					Radio();
					Callendar();
					Select();
					Dias();
				}
			}
			ajax.send(null)
		  }
}




function EliminarCampB(idCamp,idb){
	
    divContenido = document.getElementById('espectacularesdiv');
	
	ajax=objetoAjax();
		
        var fecha = new Date();
        var marca = encodeURIComponent(fecha.getTime());
		var r = confirm("Deseas eliminar la campa\u00f1a?");
		if (r == true)
		  {
			ajax.open("GET", "ActCampanasBardas.php?camp="+idCamp+"&idb="+idb+"&eliminar=1&x="+marca);
				
			ajax.onreadystatechange=function() {
				if (ajax.readyState==4) {
					divContenido.innerHTML = ajax.responseText
					Radio();
					Callendar();
					Select();
					Dias();
				}
			}
			ajax.send(null)
		  }
}
