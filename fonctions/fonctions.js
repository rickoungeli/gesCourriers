// JavaScript Document

function getHttpRequest() {
        var httpRequest = false;

        if (window.XMLHttpRequest) { // Mozilla, Safari,...
            httpRequest = new XMLHttpRequest();
            if (httpRequest.overrideMimeType) {
                httpRequest.overrideMimeType('text/xml');
                // Voir la note ci-dessous à propos de cette ligne
            }
        }
        else if (window.ActiveXObject) { // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e) {}
            }
        }

        if (!httpRequest) {
            alert('Abandon :( Impossible de créer une instance XMLHTTP');
            return false;
        }
		
		return httpRequest;
}

// Pour afficher / masquer un div
function show_hide(le_calque){
	if (document.getElementById(le_calque).style.display == "none"){
		document.getElementById(le_calque).style.display = "block"
	}else{
		document.getElementById(le_calque).style.display ="none"
	};
	
}
