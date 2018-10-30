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

  function definitiva(){
    var co = $('#codex0').val()+$('#codex').val()+$('#codex1').val();
    $("#codex3").val(co);
    var contadorFinal = 0;
    var controlador = 0;
    var stringVacio="";
    var stringVacioSe = "";
    var stringIguales ="";
    var contadorIguales = 0;
     seriales1 = seriales(); //seriales de bodega
    codigo1 = codigo();
    var cantidad = $('#cantidadTotal').val();
    perifericos = new Array(cantidad);
    serialesPropias = new Array(cantidad);

              if(codigo1.length > 0){
                  $("#codex").addClass("back");
                  $("#error").remove();
                  $("#errorlabel").append("<span id='error' style='color:red;'> - codigo ya utilizado</span>");

               }else{

                if($('#codex').val() == ""){
                  $("#codex").addClass("back");
                  $("#error").remove();
                  $("#errorlabel").append("<span id='error' style='color:red;'> - campo vacio</span>");
                 }else{
                  $("#error").remove();
                  $("#codex").removeClass("back");
                  swal({
                      type: 'success',
                      title: 'Codigo valido: ' + co,
                     });
                  activar();
                 }
                  
               }

  }

  function activar(){
       $('#en').attr("disabled", false);
  }
</script>

<form method="post" action="<?php echo base_url()?>BUY_elements_Controller/laptop_nuevo_add">
 <div>
  <input type="hidden" name="idcompra" value="<?php echo $datos['data'][0]['id_compra'] ?>">
  <input type="hidden" name="cantidad" value="<?php echo $datos['data'][0]['cantidad'] ?>">
   <input type="hidden" name="rest" value="<?php echo $datos['data'][0]['rest'] ?>">
   <input type="hidden" name="n_factura" value="<?php echo $datos['data'][0]['n_factura'] ?>">
   <input type="hidden" name="tipo" value="<?php echo $datos['tipo'] ?>">
   <input type="hidden" id="codex3" name="codex3">
</div>

<div class="col-md-12 panel">
  <div class="panel-heading"><h3 class="panel-title">Laptop -  Descripción del sistema</h3><div class="right"><button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button></div></div>
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
        <select class="form-control" name="5-e"><option selected="" value="64 bits">64 bits</option><option value="32 bits">32 bits</option></select>
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
  <div class="panel-heading"><h3 class="panel-title">Laptop -  Descripción del hardware y adaptadores</h3><div class="right"><button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button></div></div>
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
        <input type="text" class="form-control" value="Sin grupo" name="3-c">
      </div>
      <div class="es col-md-3">
        <label>Marca RAM:</label>
        <input type="text" class="form-control" value="Sin grupo" name="4-c">
      </div>
      <div class="es col-md-3">
        <label>Dirección IP:</label>
        <input type="text"  class="form-control"  name="5-c">
      </div>
      <div class="es col-md-3">
        <label>Tarjetas extra:</label>
         <input type="text"   class="form-control"  name="6-c">
      </div>
      <div class="es col-md-3">
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
      </div>
      <div class="es col-md-3">
        <label>Disco físico 1:</label>
        <input type="number"  min="1" class="form-control"  name="10-c">
      </div>
      <div class="es col-md-3">
        <label>Capacidad (GB):</label>
        <input type="number"  min="1" class="form-control"  name="11-c">
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
                            <div>

                              <div id="diverror" class="col-md-1 col-sm-1">
                                  <div id="cod" class="form-group">
                                    <label>&nbsp;</label>
                                    <input type="text" required="" value="LAP" id="codex0" class="form-control" name="codigopc">
                                  </div>
                                </div>
                                <div id="diverror" class="col-md-2 col-sm-2 ">
                                  <label id="errorlabel">Codigo</label>
                                  <div id="cod" class="form-group">
                                    <input type="text" required=""  id="codex" class="form-control" name="codigopc">
                                  </div>
                                </div>
                                 <div id="diverror" class="col-md-1 col-sm-1">
                                  <label >&nbsp;</label>
                                  <div id="cod" class="form-group">
                                    <input type="text" required="" value="USAM" id="codex1" class="form-control" name="codigopc">
                                  </div>
                                </div>
                            </div>
                                
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Encargado</label>
                                    <input type="text"  class="form-control" value="" name="encargado">
                                  </div>
                                </div>
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
                                    <input type="text" readonly class="form-control" value="<?php echo $datos['unidad'][0]['unidad'] ?>" name="destinoPC-1">
                                    <input hidden type="text" value="<?php echo $datos['unidad'][0]['id_unidad'] ?>" name="destino-0">
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
                         <div class="row">
                           <div style="width: 12%;" v-for='(item2, index) in seleccionPC' class="col-md-2">
                               
                              
                               <button  type="button" id="w{{item.id - 1}}-{{item2}}-{{index}}" class="btn btn-primary space text-center {{item.id - 1}}-{{item2}}-{{index}}"   data-toggle="modal" data-target="#{{item.id - 1}}-{{item2}}-{{index}}">
                                  {{index}}
                                 </button>
                           </div>
                         </div>

                        <!--REFERENTE A CADA COMPONENTE DEL PC-->
                      </div>
                    </div>
                  </div>
                  <!-- END PANEL DEFAULT -->

 
   <button id="en" disabled="" type="submit" class="btn btn-success">Guardar</button>
</form>


                    