<style type="text/css">
  .es{
    margin-bottom: 10px;
  }
  .back{
    border: 1px solid red;
  }
</style>

<script type="text/javascript">


   var html = "";
   
   function serialesA(){
    var seriales = "";
    var dato1 = $('#serial').val();
    var co = $('#codex0').val()+$('#codex').val()+$('#codex1').val();
    var dato = dato1;
    $.ajax({
       type: 'ajax',
       method: 'post',
       url: '<?php echo base_url() ?>BUY_elements_Controller/serial__',
       data: {dato: dato},
       async: false,
       dataType: 'json',
       success: function(data){
         seriales = data;
       },
       error: function(){
           alert("error");
       }

    });
    return seriales;
  }

  function activar(){
       $('#en').attr("disabled", false);   
  }

  function validar(){
      var co = $('#codex0').val()+$('#codex').val()+$('#codex1').val();
      $('#codex3').val(co);
       var  seriales = serialesA();
        var codigos = codigo();
        console.log(seriales);
        var contador = 0;

        if($("#serial").val() == ""  ){
                  $("#serial").addClass("back");
                  $("#error2").remove();
                  $("#errorlabels").append("<span id='error2' style='color:red;'> - Vacio</span>");
                  contador++;
        }
        


        if($("#codex").val() == ""){
                 $("#codex").addClass("back");
                  $("#error").remove();
                  $("#errorlabel").append("<span id='error' style='color:red;'> - Vacio</span>");
               contador++;
        }

        
         if(seriales.length > 0){
             $("#serial").addClass("back");
                  $("#error2").remove();
                  $("#errorlabels").append("<span id='error2' style='color:red;'> - Ya utilizado</span>");
          contador++;   
        }

        if(codigos.length > 0){
             $("#codex").addClass("back");
                  $("#error").remove();
                  $("#errorlabel").append("<span id='error' style='color:red;'> - Ya utilizado</span>");
               contador++;
        }

        if(contador == 0){
          $("#error").remove();
          $("#error2").remove();
          $("#codex").removeClass("back");
          $("#serial").removeClass("back");
          activar();
        }

  }



   function codigo(){
    var dato1 = $('#codex0').val()+$('#codex').val()+$('#codex1').val();
    var dato = dato1;
    var valores;
    $.ajax({
       type: 'ajax',
       method: 'post',
       url: '<?php echo base_url() ?>BUY_elements_Controller/codigosAdmin',
       data: {dato: dato},
       async: false,
       dataType: 'json',
       success: function(data){
          valores = data;
       },
       error: function(){
           alert("error");
       }

    });
    return valores;
  }

</script>

<form method="post" action="<?php echo base_url()?>BUY_elements_Controller/disco_asignado_add">
  <div>
  <input type="hidden" name="idcompra" value="<?php echo $datos['data'][0]['id_compra'] ?>">
  <input type="hidden" name="cantidad" value="<?php echo $datos['data'][0]['cantidad'] ?>">
   <input type="hidden" name="rest" value="<?php echo $datos['data'][0]['rest'] ?>">
   <input type="hidden" name="n_factura" value="<?php echo $datos['data'][0]['n_factura'] ?>">
      <input type="hidden" id="codex3" name="codex3" >
</div>
  <div class="col-md-12">
    <div class="panel">
                      <div class="panel-heading">
                        <h3 class="panel-title">Disco duro para asignar a la unidad: <?php echo $datos['unidad'][0]['unidad'] ?></h3>
                        <div class="right">
                          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        </div>
                      </div>
                      <div class="panel-body">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label id="errorlabels">Serial</label> 
                            <input type="text" required="" class="form-control" id="serial" name="serial-0">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" required="" class="form-control" name="nombre-0">
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
                            <input class="form-control" value="DISCO DURO EXTERNO" readonly="" name="tipo-0" type="text" >
                           

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
                        <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Destino</label>
                                    <input type="text" readonly class="form-control" value="<?php echo $datos['unidad'][0]['unidad'] ?>" name="destinoPC-1">
                                    <input hidden type="text" value="<?php echo $datos['unidad'][0]['id_unidad'] ?>" name="destino-0">
                                  </div>
                         </div>



                           <div>
                              <div id="diverror" class="col-md-1 col-sm-1">
                                  <div id="cod" class="form-group">
                                    <label>&nbsp;</label>
                                    <input type="text" required="" value="DDE" id="codex0" class="form-control" name="codex0">
                                  </div>
                                </div>
                                <div id="diverror" class="col-md-2 col-sm-2 ">
                                  <label id="errorlabel">Codigo</label>
                                  <div id="cod" class="form-group">
                                    <input type="text" required=""  id="codex" class="form-control" name="codex">
                                  </div>
                                </div>
                                 <div id="diverror" class="col-md-2 col-sm-2">
                                  <label >&nbsp;</label>
                                  <div id="cod" class="form-group">
                                    <input type="text" required="" value="USAM" id="codex1" class="form-control" name="codex1">
                                  </div>
                                </div>
                            </div>

                        <div class="col-md-3">
                          <div class="form-group">
                                    <label>Encargado</label>
                                    <input type="text"  class="form-control"  name="encargado">
                                  </div>
                        </div>

                         
                        <div class="col-md-3">
                          <br>  
                          <button onclick="validar();" type="button" class="btn btn-info">Validar</button>
                        </div>
                      </div>
                    </div> 
   </div>
   <button id="en" disabled="" type="submit" class="btn btn-success">Guardar</button>
</form>


                    