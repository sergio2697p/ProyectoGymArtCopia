function descargaPdf() {
    swal({
        title: "Procediendo a la descarga en pdf",
        text: "Estas segur@?",
        icon: "warning",
        buttons: {
            descargar: {
                text: "Descargar",
                value: "descarga",
            },
            cancelar: {
                text: "Cancelar",
                value: "cancela",
            },
        },
    }).then((valueBtn) => {
        switch (valueBtn) {
            case "descarga":
                var titleString = document.getElementById('title').innerHTML;
               
                if(titleString == "Listado de clientes"){
                    var doc = new jsPDF();
                var titleString = document.getElementById('title').innerHTML;
                var numeroId = 1;
                var arrayForms = $('#formList').find('form');
                var texto = $('#' + numeroId).find(".columna1").text();

                doc.setFontSize(22);
                doc.text(20, 20, titleString);

                doc.setFontSize(16);
                doc.text(20, 30, "Nombre");
                doc.text(80, 30, "Apellidos");
                doc.text(140, 30, "Correo");
                var tabTop = 40;
                doc.setFont("courier");
                doc.setFontSize(11);
                for (form in arrayForms) {
                    var tab = 20;
                    for (var i = 1, max = 4; i < max; i++) {
                        texto = $('#'+arrayForms[form].id).find(".columna" + i).text();
                        if (texto == "") {
                            tabTop -= 3.3;
                        } else {
                            doc.text(tab, tabTop, texto);
                            tab += 60;
                        }
                    }
                    Math.round(tabTop);
                    tabTop += 10;
                    numeroId++;
                }
                doc.save(titleString.replace(/ /g, ""));
                swal("Descarga realizada con exito", "", "success");
                break;
                }
                if(titleString == "Mensualidades actuales"){
                    var doc = new jsPDF();
                    var numeroId = 1;
                    var arrayForms = $('#formList').find('.mensualidad');

                doc.setFontSize(22);
                doc.text(20, 20, titleString);

                doc.setFontSize(16);
                doc.text(20, 30, "Clases");
                doc.text(80, 30, "Dias");
                doc.text(140, 30, "Precio");
                var tabTop = 40;
                doc.setFont("courier");
                doc.setFontSize(11);
                for (form in arrayForms) {
                    var tab = 20;
                    for (var i = 1, max = 4; i < max; i++) {
                        texto = $('#'+arrayForms[form].id).find(".columna" + i).text();
                        if (texto == "") {
                            tabTop -= 3.3;
                        } else {
                            doc.text(tab, tabTop, texto);
                            tab += 60;
                        }
                    }
                    Math.round(tabTop);
                    tabTop += 10;
                    numeroId++;
                }
                doc.save(titleString.replace(/ /g, ""));
                swal("Descarga realizada con exito", "", "success");
                break;
                }

            case "cancela":
                swal("Descarga cancelada");
                break;
        }
    });
}

function copiarDocumento() {
    swal({
        title: "Copiando listado actual",
        text: "Estas segur@?",
        icon: "warning",
        buttons: {
            descargar: {
                text: "Copiar",
                value: "copiar",
            },
            cancelar: {
                text: "Cancelar",
                value: "cancela",
            },
        },
    }).then((valueBtn) => {
        switch (valueBtn) {
            case "copiar":
                var titleString = document.getElementById('title').innerHTML;

                if (titleString == "Listado de clientes") {
                    //TODO
                    $.ajax({
                        type: "POST",
                        url: 'BBDD/copiaClientes.php',
                        success: function (result) {
                            swal(result);
                        },
                        error: function(){
                            swal("Error");
                        }
                    });
                    }                
                break;

            case "cancela":
                swal("Copia cancelada");
                break;
        }
    });
}

function descargaWord(){
    swal({
        title: "Procediendo a la descarga",
        text: "Estas segur@?",
        icon: "warning",
        buttons: {
            descargar: {
                text: "Descargar",
                value: "descargar",
            },
            cancelar: {
                text: "Cancelar",
                value: "cancela",
            },
        },
    }).then((valueBtn) => {
        switch (valueBtn) {
            case "descargar":
                $("#formList").wordExport();
                swal("Descarga completada");
                break;
            case "cancela":
                swal("Descarga cancelada");
                break;
        }
    });
}


