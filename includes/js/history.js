
function adjust(nav, maxNav, v){
    if (!v) {
        fetch('includes/History.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'add=true'
        }).then(function () {
            document.getElementById('volver').disabled = (nav + 1) === 1;
            document.getElementById('avanzar').disabled = true;
        }).catch(function (err) {
            document.write('Fetch Error :', err);
        });
    }
    else {
        document.getElementById('volver').disabled = nav === 1;
        document.getElementById('avanzar').disabled = nav === maxNav;
    }
}

function goBack(){
    fetch('includes/History.php', {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: 'h=true'
    }).then(function() {
        history.back();
    }).catch(function(err) {
            document.write('Fetch Error :', err);
    });
}

function goForward() {
    fetch('includes/History.php', {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: 'h=false'
    }).then(function() {
        history.forward();
    }).catch(function(err) {
        document.write('Fetch Error :', err);
    });
}
