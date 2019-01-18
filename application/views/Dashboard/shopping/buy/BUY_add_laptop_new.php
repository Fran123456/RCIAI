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



<form method="post" action="<?php echo base_url()?>BUY_elements_Controller/laptop_new">
  <div>
  <input type="hidden" name="idcompra" value="<?php echo $datos['data'][0]['id_compra'] ?>">
  <input type="hidden" name="cantidad" value="<?php echo $datos['data'][0]['cantidad'] ?>">
   <input type="hidden" name="rest" value="<?php echo $datos['data'][0]['rest'] ?>">
   <input type="hidden" name="n_factura" value="<?php echo $datos['data'][0]['n_factura'] ?>">
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

      <input type="hidden" value="" class="form-control"  name="7-c">
      <input type="hidden" value="" class="form-control"  name="8-c">
      <input type="hidden" value="" class="form-control"  name="9-c">
      <!--<div class="es col-md-3">
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
      <div class="es col-md-3">
        <label>Disco físico 1:</label>
        <input type="number"  min="1" class="form-control"  name="10-c">
      </div>
      <div class="es col-md-3">
        <label>Capacidad de disco duro:</label>
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
    <div class="panel">
                      <div class="panel-heading">
                        <h3 class="panel-title">Laptop</h3>
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
                            <label>Tipo de elemento</label>
                            <input class="form-control" readonly="" type="text" value="LAPTOP" name="tipo-0">
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
                            <input type="text"  class="form-control" name="nombre-0">
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
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Origen</label>
                            <input readonly="" type="text" value="nuevo" class="form-control" name="origenF-0">
                            <input type="text" value="4" name="origen-0" hidden="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Destino</label>
                            <input type="text" value="Bodega informatica" class="form-control" name="destino_name-0">
                            <input type="text" value="1" name="destino-0" hidden="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <br>  
                          <button onclick="validar();" type="button" class="btn btn-info">Validar serial</button>
                        </div>
                      </div>
                    </div> 
   </div>
   <button id="en" disabled="" type="submit" class="btn btn-success">Guardar</button>
</form>


                    