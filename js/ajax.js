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
        }
    }
    ajax.send(null)
}


function AgregarCampanaEsp(){

    divContenido = document.getElementById('search');
	var campana = document.getElementById("campana").value;
	
	ajax=objetoAjax();
		
        var fecha = new Date();
        var marca = encodeURIComponent(fecha.getTime());
        ajax.open("GET", "espectaculares.php?campana="+campana+"&x="+marca);
        
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {

            divContenido.innerHTML = ajax.responseText
        }
    }
    ajax.send(null)
}
