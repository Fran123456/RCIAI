<script type="text/javascript">

   var html = "";
   var datos;
   function seriales(){

    $.ajax({
       type: 'ajax',
       method: 'post',
       url: '<?php echo base_url() ?>BUY_elements_Controller/serial__todo',
       async: false,
       dataType: 'json',
       success: function(data){
         datos = data;

       },
       error: function(){
           alert("error");
       }

    });
    return datos;
  }

  function definitiva(){
    var contadorFinal = 0;
    var controlador = 0;
    var stringVacio="";
    var stringVacioSe = "";
    var stringIguales ="";
    var contadorIguales = 0;
     seriales1 = seriales(); //seriales de bodega
    var cantidad = $('#cantidadTotal').val();
    perifericos = new Array(cantidad);
    serialesPropias = new Array(cantidad);

        for (var i = 0; i < cantidad; i++) {
           perifericos[i] = $('#'+i+'-ele').val();
           serialesPropias[i] = $('#serial-0-'+i+'-'+perifericos[i]).val();
        }

        for (var r = 0; r < cantidad; r++) {
           if(serialesPropias[r] ==""){
            stringVacio += perifericos[r] + ", ";
             controlador++;
           }
        }


        if(controlador > 0){
          swal({
                  type: 'warning',
                  title: 'Debe llenar todos los campos de serial de: ' +stringVacio,
            });
        }else{

               for (var w = 0; w < seriales1.length; w++) {
                 for (var q = 0; q < cantidad; q++) {
                   if(serialesPropias[q] == seriales1[w].serial){
                      stringVacioSe += perifericos[q] + ", ";
                      contadorFinal++;
                     }
                 }

               }


               /*for (var u = 0; u < cantidad; u++) {
                   for (var uu = 0; uu < cantidad; uu++) {
                          if(u != uu){
                            if(serialesPropias[u] == serialesPropias[uu]){
                             //console.log( serialesPropias[u] +' = '+ serialesPropias[uu] );
                             contadorIguales++;
                            }
                          }
                   }
               }*/


              /* if(contadorFinal > 0 && contadorIguales > 0){
                    swal({
                      type: 'warning',
                      title: 'Las seriales de los campos: ' +stringVacioSe +'  Ya estan en uso. <br><br> ¡Hay seriales iguales en los perifericos que desea agregar, porfavor verifique!',
                     });
               }*/
              if(contadorFinal > 0){
                    swal({
                      type: 'warning',
                      title: 'Las seriales de los campos: ' +stringVacioSe + 'Ya estan en uso. <br><br>',
                     });
              }
              /*else if(contadorIguales < 0){
                    swal({
                      type: 'warning',
                      title: '¡Hay seriales iguales en los perifericos que desea agregar, porfavor verifique!',
                     });
              }*/
               else{
                swal({
                      type: 'success',
                      title: 'Seriales validadas',
                     });
                activar();
               }
        }

  }

  function activar(){
       $('#en').attr("disabled", false);
  }
</script>

<form method="post" action="<?php echo base_url()?>AddBodega_Controller/pc_nuevo_add">
 <div>

   <input type="hidden" name="tipo" value="<?php echo $datos['tipo'] ?>">
</div>
<div class="col-md-12">
              <div class="thead-d">
                <h4>AGREGA ELEMENTOS DEL PC</h4>
            </div>
            <br>
            <br>
                  <!--PARA PC-->
                  <div ><div  class="row" id="pc">
                          <div class="col-md-8">
                               <select size="14" id="exampleFormControlSelect2" name="select-A" v-model='seleccionPC' class="form-control" multiple>
                                  <option v-for="item in lists" selected value="{{item.keep}}">{{  item.keep}}</option>
                                  <option value="AUDIFONOS" >AUDIFONOS</option>
                                 <!--<option value="IMPRESORES-MATRICIALES">IMPRESORES MATRICIALES</option>
                                  <option value="IMPRESORES-MULTIFUNCIONALES">IMPRESORES MULTIFUNCIONALES</option>
                                  <option value="IMPRESOR-DESJEKT">IMPRESOR DESJEKT</option>
                                 <option value="SCANNER">SCANNER</option>-->
                                  <option value="PARLANTES">PARLANTES</option>
                                  <option value="LECTOR-PARA-MEMORIA-SD">LECTOR PARA MEMORIA SD</option>
                                <!-- <option value="UPS">UPS</option>-->
                                <!--  <option value="WEBCAN">WEBCAN</option>-->
                                  <option value="MEMORIA-SD">MEMORIA-SD</option>
                                  <option value="PROYECTOR">PROYECTOR</option>
                                  <option value="FAX">FAX</option>
                                  <option value="MICROFONO">MICROFONO</option>
                                  <option value="OTRO">OTRO</option>
                                </select>
                                <br>
                          </div>
                          <div class="col-md-4">

                            <p>Aquí selecciona los elementos que componen a la PC</p>
                          </div>
                        </div>
                    </div>
                    <!--PARA PC-->
           </div>



<!-- PANEL DEFAULT -->
                   <div v-for="item in lists_pc"  class="col-md-12">
                      <div class="panel">
                      <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $datos['tipo'] ?></h3>
                        <div class="right">
                          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        </div>
                      </div>
                      <div class="panel-body">
                          <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Origen</label>
                                    <input type="text" readonly class="form-control" value="nuevo" name="OrigenPC-1">
                                    <input hidden type="text" value="4" name="OrigenPC_Falso-1">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Destino</label>
                                    <input type="text" readonly class="form-control" value="bodega de informatica" name="destinoPC-1">
                                    <input hidden type="text" value="1" name="destino-0">
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Fecha ingreso</label>
                                    <input type="date" required="" class="form-control" value="" name="ingreso-1">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <br>
                                    <button  type="button" onclick="definitiva();" class="btn btn-danger">Validar</button>
                                </div>
                           </div>
                        <br>
                         <!--REFERENTE A CADA COMPONENTE DEL PC-->
                         <!-- Button trigger modal -->
             <!--IMPORTANTE-->
                         <input v-for='(item2, index) in seleccionPC' type="hidden" id="{{item2}}-ele" name="{{item2}}-ele" value="{{index}}">

                         <input type="hidden"  id="cantidadTotal" value="{{seleccionPC.length}}" name="cantidadTotal">
                         <!--IMPORTANTE-->
                         <button v-for='(item2, index) in seleccionPC' type="button" class="btn btn-primary space text-center PC{{item.id - 1}}-{{item2}}-{{index}}" data-toggle="modal" data-target="#{{item.id - 1}}-{{item2}}-{{index}}">
                            {{index}}
                        </button>
                       <!-- Modal -->
                        <div v-for='(item3, index) in seleccionPC' class="modal fade" id="{{item.id - 1}}-{{item3}}-{{index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{index}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <!--IMPORTANTE-->
                                <input hidden="" type="text" name="A-{{item3}}" value="{{index}}">
                                <!--IMPORTANTE-->
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Serial</label>
                                      <input  type="text" id="serial-{{item.id - 1}}-{{item3}}-{{index}}" required class="form-control"  name="serial-{{item3}}-{{index}}">
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Marca</label>
                                      <input type="text"  class="form-control"  name="marca-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Capacidad</label>
                                      <input type="text"  class="form-control"  name="capacidad-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Tipo de periferico</label>
                                      <input type="text" value="{{index}}" readonly="" class="form-control"  name="tipo-{{item3}}-{{index}}">
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Tipo</label>
                                      <input type="text" id="nombre-{{item.id - 1}}-{{item3}}-{{index}}" value=""  class="form-control"  name="nombre-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Velocidad</label>
                                      <input type="text" class="form-control"  name="velocidad-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Estado</label>
                                      <select class="form-control" name="estado-{{item3}}-{{index}}" >
                                        <option value="Disponible">Disponible</option>
                                        <option value="Nuevo">Nuevo</option>
                                      </select>

                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="{{item.id - 1}}-{{item3}}-{{index}}" onclick="color(this);" class="btn btn-primary">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                        <!--REFERENTE A CADA COMPONENTE DEL PC-->
                      </div>
                    </div>
                  </div>
                  <!-- END PANEL DEFAULT -->


   <button id="en" disabled="" type="submit" class="btn btn-success">Guardar</button>
</form>
