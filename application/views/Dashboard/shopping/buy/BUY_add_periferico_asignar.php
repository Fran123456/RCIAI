<script type="text/javascript">


   var html = "";
   function validar(){
    var dato1 = $('#serial').val();
    var dato = dato1;
    $.ajax({
       type: 'ajax',
       method: 'post',
       url: '<?php echo base_url() ?>BUY_elements_Controller/serial__',
       data: {dato: dato},
       async: false,
       dataType: 'json',
       success: function(data){
        if($('#serial').val() == ""){
           swal({
                  type: 'warning',
                  title: 'El campo debe llenarse',
                });
        }else{
            if(data.length == 0){
             swal({
              type: 'success',
              title: 'La serial es valida',
            });
             activar();
             }else{
                swal({
                  type: 'warning',
                  title: 'La serial ya esta en uso',
                });
             }
        }


       },
       error: function(){
           alert("error");
       }

    });
  }

  function activar(){

       $('#en').attr("disabled", false);

  }
</script>

<style media="screen">
  .reds{
    color: red;
  }
</style>

<form method="post" action="<?php echo base_url()?>BUY_elements_Controller/periferico_asignado_add">
  <div>
  <input type="hidden" name="idcompra" value="<?php echo $datos['data'][0]['id_compra'] ?>">
  <input type="hidden" name="cantidad" value="<?php echo $datos['data'][0]['cantidad'] ?>">
   <input type="hidden" name="rest" value="<?php echo $datos['data'][0]['rest'] ?>">
   <input type="hidden" name="n_factura" value="<?php echo $datos['data'][0]['n_factura'] ?>">
</div>
  <div class="col-md-12">
    <div class="panel">
                      <div class="panel-heading">
                        <h3 class="panel-title">Periferico para asignar a la unidad: <?php echo $datos['unidad'][0]['unidad'] ?></h3>
                        <div class="right">
                          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        </div>
                      </div>
                      <div class="panel-body">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Serial</label>
                            <input type="text" required="" class="form-control" id="serial" name="serial-0">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Tipo de periferico</label>
                            <select class="form-control" name="tipo-0">
                                        <option value="MOUSE">MOUSE</option>
                                        <option value="TECLADO">TECLADO</option>
                                        <option value="MOUSE">MONITOR</option>
                                        <option value="USB">USB</option>
                                        <option value="MEMORIA SD">MEMORIA SD</option>
                                        <option value="LECTOR DVD/CD">LECTOR DVD/CD</option>
                                       <!--  <option value="IMPRESORES MATRICIALES">IMPRESORES MATRICIALES</option>
                                        <option value="IMPRESORES MULTIFUNCIONALES">IMPRESORES MULTIFUNCIONALES</option>
                                        <option value="IMPRESOR DESJEKT">IMPRESOR DESJEKT</option>-->
                                      <!--  <option value="SCANNER">SCANNER</option>
                                        <option value="WEBCAN">WEBCAN</option>-->
                                        <option value="PARLANTES">PARLANTES</option>
                                        <option value="LECTOR PARA MEMORIA SD">LECTOR PARA MEMORIA SD</option>
                                       <!-- <option value="UPS">UPS</option>-->
                                        <option value="AUDIFONOS">AUDIFONOS</option>
                                        <option value="MEMORIA SD">MEMORIA SD</option>
                                        <option value="PROYECTOR">PROYECTOR</option>
                                        <option value="FAX">FAX</option>
                                        <option value="MICROFONO">MICROFONO</option>
                                        <option value="OTRO">OTRO</option>
                             </select>

                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Marca</label>
                            <input type="text" class="form-control" name="marca-0">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Capacidad</label>
                            <input type="text" class="form-control" name="capacidad-0">
                          </div>
                        </div>
                         <div class="col-md-3">
                          <div class="form-group">
                            <label>Tipo</label>
                            <input type="text" required="" class="form-control" name="nombre-0">
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Velocidad</label>
                            <input type="text" class="form-control" name="velocidad-0">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Estado</label>
                            <input type="text" value="nuevo" class="form-control" name="estatus-0">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Fecha ingreso</label>
                            <input type="date" required="" class="form-control" value="<?php echo $datos['data'][0]['fecha_compra'] ?>" name="fecha_ingreso-0">
                          </div>
                        </div>
                        <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Origen</label>
                                    <input type="text" readonly class="form-control" value="nuevo" name="OrigenPC-1">
                                    <input hidden type="text" value="4" name="OrigenPC_Falso-1">
                                  </div>
                       </div>
                        <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Destino</label>
                                    <input type="text" readonly class="form-control" value="<?php echo $datos['unidad'][0]['unidad'] ?>" name="destinoPC-1">
                                    <input hidden type="text" value="<?php echo $datos['unidad'][0]['id_unidad'] ?>" name="destino-0">
                                  </div>
                         </div>
                         <div class="col-md-3">
                           <div class="form-group">
                             <input type="hidden" id="centinelita" value="<?php echo count($datos['todos']) ?>">
                                    <label id="er">Equipos disponibles</label>
                                  <select name="selectQ" class="form-control">
                                     <?php for ($i=0; $i < count($datos['todos']) ; $i++):?>
                                         <option  value="<?php echo $datos['todos'][$i]['identificador']?>" ><?php echo $datos['todos'][$i]['identificador'] ?></option>
                                     <?php endfor; ?>
                                  </select>

                              </div>
                         </div>
                        <div class="col-md-3">
                          <br>
                          <button onclick="validar();" id="dx" type="button" class="btn btn-info">Validar serial</button>
                        </div>
                      </div>
                    </div>
   </div>
   <button id="en" disabled="" type="submit" class="btn btn-success">Guardar</button>
</form>

<script type="text/javascript">
  if($('#centinelita').val() =="0"){
     $('#dx').attr('disabled', 'true');
     $('#er').text('PC no disponible');
      $('#er').addClass('reds');
  }
</script>
