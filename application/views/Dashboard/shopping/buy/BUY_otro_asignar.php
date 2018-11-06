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

<form method="post" action="<?php echo base_url()?>BUY_elements_Controller/otro_asignado_add">
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
                        <h3 class="panel-title">Elemento para asignar a la unidad: <?php echo $datos['unidad'][0]['unidad'] ?></h3>
                        <div class="right">
                          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        </div>
                      </div>
                      <div class="panel-body ">

                           <div class="row">

                              <div id="diverror" class="col-md-2 col-sm-2">
                                  <div id="cod" class="form-group">
                                    <label>&nbsp;</label>

                                    <select onchange="cambiar();" id="codex0" name="codex0"  class="form-control">
                                      <option selected="" value="UPS">UPS</option>
                                      <option value="APRADIO">APRADIO</option>
                                      <option value="WEBCAM">WEBCAM</option>
                                      <option value="IMPR">IMPR</option>
                                    </select>
                                  </div>
                                </div>
                                <div id="diverror" class="col-md-2 col-sm-2 ">
                                  <label id="errorlabel">Codigo</label>
                                  <div id="cod" class="form-group">
                                    <input type="text" required=""   id="codex" class="form-control" name="codex">
                                  </div>
                                </div>
                                 <div id="diverror" class="col-md-2 col-sm-2">
                                  <label >&nbsp;</label>
                                  <div id="cod" class="form-group">
                                    <input type="text" required="" value="USAM" id="codex1" class="form-control" name="codex1">
                                  </div>
                                </div>






                        <div class="col-md-3">
                          <div class="form-group">
                            <label id="errorlabels">Serial</label>
                            <input type="text" required="" class="form-control" id="serial" name="serial-0">
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
                            <input  type="text" class="form-control" name="capacidad-0">
                          </div>
                        </div>
                        <div id="divtipo" class="col-md-3">
                          <div id="tipoP" class="form-group">
                            <label>Tipo de periferico</label>
                            <input class="form-control" id="cm" readonly="" name="tipo-0" type="text" >
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Tipo</label>
                            <input type="text" class="form-control" name="nombre-0">
                          </div>
                        </div>
                       <div class="col-md-3">
                          <div class="form-group">
                            <label>Velocidad</label>
                            <input type="text" class="form-control" name="velocidad-0">
                          </div>
                        </div>
                       <!-- <div class="col-md-3">
                          <div class="form-group">
                            <label>Estado</label>
                            <input type="text" value="nuevo" class="form-control" name="estatus-0">
                          </div>
                        </div>--->
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
                                    <input hidden type="text" value="<?php echo $datos['unidad'][0]['id_unidad'] ?>" id="destino-0" name="destino-0">
                                  </div>
                         </div>

                        <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Encargado</label>
                                    <input type="text"  class="form-control"  name="encargado">
                                  </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                 <label>Asignar a PC</label>
                                 <select class="form-control" id="chek" onchange="cambioAsignar();"><option value="no">No asignar</option><option value="asignar">Asignar a PC</option></select>
                             </div>
                        </div>

                       <div id="temp">

                       </div>


                        <div class="col-md-3">
                          <br>
                          <button onclick="validar();" type="button" class="btn btn-info">Validar</button>
                        </div>
            </div>
            <br>
            <button id="en" disabled="" type="submit" class="btn btn-success">Guardar</button>

      </div>
   
   <input type="hidden" name="mejor" id="mejor" value="0">
</form>

<script type="text/javascript">
  $("#cm").val($('#codex0').val());
  function cambiar(){

    $("#cm").val($('#codex0').val());

    $('#tipoP').remove();
    $('#divtipo').append('<div id="tipoP" class="form-group"><label>Tipo de periferico</label><input class="form-control" id="cm" readonly="" name="tipo-0" type="text" ></div>');

    if($('#codex0').val() == "UPS"){
        $('#cm').val('UPS');
        //$('#tipoP').remove();
        //$('#divtipo').append('<div id="tipoP" class="form-group"><label>Tipo de periferico</label><input class="form-control" id="cm" readonly="" name="tipo-0" type="text" ></div>');
    }

    if($('#codex0').val() == "APRADIO"){
      $('#cm').val('ACCES POINT RADIO U MASFERRER');
    //  $('#tipoP').remove();
    //  $('#divtipo').append('<div id="tipoP" class="form-group"><label>Tipo de periferico</label><input class="form-control" id="cm" readonly="" name="tipo-0" type="text" ></div>');
    }


    if($('#codex0').val() == "WEBCAM"){
        $('#cm').val('WEB CAM');
      //  $('#tipoP').remove();
      //  $('#divtipo').append('<div id="tipoP" class="form-group"><label>Tipo de periferico</label><input class="form-control" id="cm" readonly="" name="tipo-0" type="text" ></div>');
    }


    if($('#codex0').val() == "IMPR"){
        $('#cm').val('IMPRESOR');
        $('#tipoP').remove();
        $('#divtipo').append('<div id="tipoP" class="form-group"><label>Tipo de periferico</label><select  class="form-control" id="cm"  name="tipo-0">  <option value="IMPRESORES-MATRICIALES">IMPRESORES MATRICIALES</option><option value="IMPRESORES-MULTIFUNCIONALES">IMPRESORES MULTIFUNCIONALES</option><option value="IMPRESOR-DESJEKT">IMPRESOR DESJEKT</option><option value="SCANNER">SCANNER</option></select></div>');
    }

  }










  function cambioAsignar(){
    if($('#chek').val() == "asignar"){
        $('#mejor').val('1');
            var html2 ='<div id="destroy" class="col-md-3"><div class="form-group"><label>PC disponibles</label><select id="unidadesU" name="unidadesU" class="form-control"></select></div></div>';
        $('#temp').append(html2);

        pcDisponibles();
    }
    else{
       $('#mejor').val('0');
       destroy();
    }
  }


  function pcDisponibles(){
        var dato = $('#destino-0').val();
        var html3 = "";
      $.ajax({
          dataType: 'JSON',
          method: 'post',
          data: {dato: dato},
          url: '<?php echo base_url()?>BUY_elements_Controller/pc_unidad',
          success: function(data){
           for (var i = 0; i < data.length; i++) {
              html3 +=  '<option value="'+data[i].identificador+'">'+data[i].identificador+'</option>';
           }
           console.log(data);
           $('#unidadesU').append(html3);
          },
          error: function(){
            alert('error');
          }
      });
  }

  function destroy(){
     $('#destroy').remove();
  }

</script>
