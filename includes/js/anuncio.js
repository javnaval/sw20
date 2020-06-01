$(document).ready(function () {

    $("#$_SESSION['contador']").change(function () {
        

        if (($_SESSION['contador'] % 3 === 0) && ($("rol") === 'usuario')) {
            alert("Con soundcloud premium di no a los anuncios. Reproduce tu música de forma ilimitada tantas veces como quieras sin necesidad de parar.");
        }

       
    });

  
})