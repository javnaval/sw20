function goBack(){
    history.back();
}

function goForward() {
    history.forward();
}

window.onpopstate = function(event) {
	var encodedUrl = encodeURI(document.location);
	$("#mainContent").load(encodedUrl);
};
