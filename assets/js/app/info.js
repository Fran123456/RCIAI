aux = 'PC'+i+'-'+co+'-'+datosPeriferidos[co];
                    button += '<button    type="button" class="space btn btn-primary '+ aux +' " data-toggle="modal" data-target="#'+i+'-'+co+'-'+datosPeriferidos[co]+'">'+
                    datosPeriferidos[co]+'</button>';

                     otro += '<div class="modal fade bd-example-modal-lg" id="'+i+'-'+co+'-'+datosPeriferidos[co]+'" tabindex="-1" role="dialog" '+
                    'aria-labelledby="exampleModalLabel"aria-hidden="true">'+
                            '<div class="modal-dialog" role="document">'+
                              '<div class="modal-content">'+
                                '<div class="modal-header">'+
                                  '<h5 class="modal-title" id="exampleModalLabel">'+ datosPeriferidos[co] +'</h5>'+
                                  '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                   ' <span aria-hidden="true">&times;</span>'+
                                  '</button>'+
                                '</div>'+
                                '<div class="modal-body">'+



                                               '<div class="row">'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Serial</label>'+
                                                    '<input required  id="serial-'+i+'-'+co+'-'+datosPeriferidos[co]+'" name="serial-'+(i+1)+'-'+co+'-'+datosPeriferidos[co]+'"  class="form-control val" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Nombre</label>'+
                                                    '<input name="nombre-'+(i+1)+'-'+co+'-'+datosPeriferidos[co]+'"  class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Marca</label>'+
                                                    '<input name="marca-'+(i+1)+'-'+co+'-'+datosPeriferidos[co]+'"  class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Capacidad</label>'+
                                                    '<input name="capacidad-'+(i+1)+'-'+co+'-'+datosPeriferidos[co]+'" class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Tipo</label>'+
                                                    '<input name="tipo-'+(i+1)+'-'+co+'-'+datosPeriferidos[co]+'" class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Velocidad</label>'+
                                                    '<input name="velocidad-'+(i+1)+'-'+co+'-'+datosPeriferidos[co]+'" class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Estado</label>'+
                                                    '<input name="estado-'+(i+1)+'-'+co+'-'+datosPeriferidos[co]+'" class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                  '</div>'+
                                                '</div>'+
                                               '</div>'+



                                '</div>'+
                                '<div class="modal-footer">'+
                                  '<button onclick="color(this);"  id="'+i+'-'+co+'-'+datosPeriferidos[co]+'" type="button" class="btn btn-success"   >Agregar</button>'+'<button    type="button" class="btn btn-danger"   data-dismiss="modal">Salir</button>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>';
                        xcon++;