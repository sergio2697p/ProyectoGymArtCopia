function eliminarSeleccionado(identificador) {
    var id = identificador.id;
    var titleString = document.getElementById('title').innerHTML;
    if(titleString == "Listado de clientes"){
    swal({
        title: "Eliminando cliente",
        text: "Estas segur@?",
        icon: "warning",
        buttons: {
            descargar: {
                text: "Eliminar",
                value: "eliminar",
            },
            cancelar: {
                text: "Cancelar",
                value: "cancela",
            },
        },
    }).then((valueBtn) => {
        switch (valueBtn) {
            case "eliminar":
                var titleString = document.getElementById('title').innerHTML;

                if (titleString == "Listado de clientes") {
                
                    $.ajax({
                        type: "POST",
                        data: {id:id,titleString:titleString},
                        url: 'BBDD/eliminar.php',
                        success: function (result) {
                            swal(result);
                            setTimeout(function(){ location.reload(); }, 1000);
                        },
                        error: function(){
                            swal("Error: consulte al administrador");
                        }
                    });
                    }                
                break;

            case "cancela":
                swal("Eliminacion cancelada");
                break;
        }
    });
}
else if(titleString == "Mensualidades actuales"){
    swal({
        title: "Eliminando mensualidad",
        text: "Estas segur@?",
        icon: "warning",
        buttons: {
            descargar: {
                text: "Eliminar",
                value: "eliminar",
            },
            cancelar: {
                text: "Cancelar",
                value: "cancela",
            },
        }
    }).then((valueBtn) => {
        switch (valueBtn) {
            case "eliminar":
            
                    $.ajax({
                        type: "POST",
                        data: {id:id,titleString:titleString},
                        url: 'BBDD/eliminar.php',
                        success: function (result) {
                            swal(result);
                            setTimeout(function(){ location.reload(); }, 1000);
                        },
                        error: function(){
                            swal("Error: consulte al administrador");
                        }
                    });
                                    
                break;

            case "cancela":
                swal("Eliminacion cancelada");
           break;
   }    
    });
    }
}



