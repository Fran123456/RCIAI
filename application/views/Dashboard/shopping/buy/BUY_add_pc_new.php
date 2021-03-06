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

        let filterConut =0;
        for (var i = 0; i<serialesPropias.length-1; i++)
        {
           for (var j =i+1; j<serialesPropias.length; j++)
           {
              if (serialesPropias[i] == serialesPropias[j]){
                 filterConut++;
              }
           }
        }
        
        
        if(filterConut == 0){
        //
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
              if(contadorFinal > 0){
                    swal({
                      type: 'warning',
                      title: 'Las seriales de los campos: ' +stringVacioSe + 'Ya estan en uso. <br><br>',
                     });
              }
               else{
                swal({
                      type: 'success',
                      title: 'Seriales validadas',
                     });
                activar();
               }
        }
        //
      }else{
                swal({
                      type: 'warning',
                      title: 'Revisa las seriales no pueden ser iguales para dos o mas elementos',
                     });
      }
  }

  function activar(){
       $('#en').attr("disabled", false);
  }
</script>

<form method="post" action="<?php echo base_url()?>BUY_elements_Controller/pc_nuevo_add">
 <div>
  <input type="hidden" name="idcompra" value="<?php echo $datos['data'][0]['id_compra'] ?>">
  <input type="hidden" name="cantidad" value="<?php echo $datos['data'][0]['cantidad'] ?>">
   <input type="hidden" name="rest" value="<?php echo $datos['data'][0]['rest'] ?>">
   <input type="hidden" name="n_factura" value="<?php echo $datos['data'][0]['n_factura'] ?>">
   <input type="hidden" name="tipo" value="<?php echo $datos['tipo'] ?>">
</div>











<div class="col-md-12 panel">
  <div class="panel-heading"><h3 class="panel-title">PC-  Descripción del sistema</h3><div class="right"><button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button></div></div>
  <div class="panel-body">
    <div class="row">
      <div class="es col-md-4">
        <label>Nombre del equipo:</label>
        <input type="text" class="form-control" name="0-e">
      </div>
      <div class="es col-md-4">
        <label>Usuario registrado:</label>
        <input type="text" class="form-control" value="admin" name="1-e">
      </div>
      <div class="es col-md-4">
        <label>Dominio:</label>
        <input type="text" class="form-control" value="Sin grupo" name="2-e">
      </div>
      <div class="es col-md-4">
        <label>Fabricante:</label>
        <input type="text" class="form-control" value="Intel" name="3-e">
      </div>
      <div class="es col-md-4">
        <label>Sistema operativo:</label>
        <input type="text" class="form-control"  name="4-e">
      </div>
      <div class="es col-md-4">
        <label>Nucleos:</label>
        <select class="form-control" name="5-e"><option value="64 bits">64 bits</option><option value="32 bits">32 bits</option></select>
      </div>
      <div class="es col-md-3">
        <label>Memoria física (GB):</label>
         <input type="number" step="0.1" value="4" min="0" class="form-control"  name="6-e">
      </div>
      <div class="es col-md-3">
        <label>Nº serie:</label>
         <input type="text" class="form-control"  name="7-e">
      </div>
    </div>
  </div>
</div>



<div class="col-md-12 panel">
  <div class="panel-heading"><h3 class="panel-title">PC -  Descripción del hardware y adaptadores</h3><div class="right"><button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button></div></div>
  <div class="panel-body">
    <div class="row">
      <div class="es col-md-3">
        <label>Procesador:</label>
        <input type="text" class="form-control" name="0-c">
      </div>
      <div class="es col-md-3">
        <label>Velocidad de reloj (GHZ):</label>
        <input type="text" class="form-control"  name="1-c">
      </div>
      <div class="es col-md-3">
        <label>Fabricante procesador:</label>
        <input type="text" class="form-control" value="Intel" name="2-c">
      </div>
      <div class="es col-md-3">
        <label>Modelo motherboard:</label>
        <input type="text" class="form-control" name="3-c">
      </div>
      <div class="es col-md-3">
        <label>Marca RAM:</label>
        <input type="text" class="form-control"  name="4-c">
      </div>
      <div class="es col-md-3">
        <label>Dirección IP:</label>
        <input type="text"  class="form-control"  name="5-c">
      </div>
      <div class="es col-md-3">
        <label>Tarjetas extra:</label>
         <input type="text"   class="form-control"  name="6-c">
      </div>
     <!-- <div class="es col-md-3">
        <label>Marca monitor:</label>
         <input type="text" class="form-control"  name="7-c">
      </div>
      <div class="es col-md-3">
        <label>Modelo monitor:</label>
        <input type="text" class="form-control"  name="8-c">
      </div>
      <div class="es col-md-3">
        <label>serie monitor:</label>
        <input type="text" class="form-control"  name="9-c">
      </div>-->
      <input type="hidden" class="form-control" value=""  name="7-c">
      <input type="hidden" class="form-control" value=""  name="8-c">
      <input type="hidden" class="form-control" value=""  name="9-c">
      <div class="es col-md-3">
        <label>Disco físico 1:</label>
        <input type="number"  min="1" class="form-control"  name="10-c">
      </div>
      <div class="es col-md-3">
        <label>Capacidad disco duro:</label>
        <input type="text"  class="form-control"  name="11-c">
      </div>
      <div class="es col-md-3">
        <label>Marca disco duro:</label>
         <input type="text" class="form-control"  name="12-c">
      </div>
      <div class="es col-md-3">
        <label>DVD:</label>
         <input type="text" class="form-control"  name="13-c">
      </div>
    </div>
  </div>
</div>


































<div class="col-md-12">
              <div class="thead-d">
                <h4>AGREGA ELEMENTOS DEL PC </h4>
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
                                      <input type="text" id="nombre-{{item.id - 1}}-{{item3}}-{{index}}"   class="form-control"  name="nombre-{{item3}}-{{index}}">
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
                                      <input type="text" value="nuevo" class="form-control"  name="estado-{{item3}}-{{index}}">
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
