<!DOCTYPE html>
<html>
<head>
	<title>Compra</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?>
<!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
 

  <style type="text/css" media="screen">
  	.int{
  		color: red;
  		background-color: #c7ede5;
  	}
    .int2{
       
        background-color: #f2eceb;
        border: 1px solid #d1d0d0;
    }
  </style>

</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->
    
     <form action="<?php echo base_url() ?>addbuy" method="post" id="form-compra">
    	<div class="panel" > <!--INICIO DE COMPONENTE VUE-->
                <div class="panel-heading">
                  <div class="text-center "><h3>Crea una nueva compra</h3></div>
                  <div class="right">
                  <button   type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                  </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                          <label>Codigo compra</label>
                                          <input  type="text" readonly=""  name="code" class="form-control int2" value="<?php echo $code ?>">
                                     </div>
                                     
                                 </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">proveedor</label>
                                        <input required  class="form-control int2" type="text" name="proveedor"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha autorización</label>
                                        <input required   class="form-control int2" type="date" name="fechautorizacion"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de compra</label>
                                        <input required  class="form-control int2" type="date" name="fechacompra"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
	                            <label class="control-label">Detalle del producto</label>
	                            <textarea  class="form-control int2" name="detalle"  cols="30" rows="6"></textarea>
	                        </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="control-label">N° factura</label>
                                <input required  class="form-control int2" type="text"  name="factura"/>
                             </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Periodo garantia</label>
                                <input required  class="form-control int2" type="text"  name="garantia"/>
                             </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Total de compra ($)</label>
                                <input required   class="form-control int2" type="number"  min="0.00" step="0.01" value="0.00"  name="total"/>
                             </div>
                        </div>
                    </div>
                 
                    <div class="row">
                       <div class="col-md-4">
                             
                       </div>
                         <div class="col-md-4">
                         	<div class="form-group">
                         		<!--<label class="control-label">Tipo de producto</label>-->
                                          <input type="hidden"  class="form-control int2" name="tipo" value="">
                         	</div>
                         </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">

                               <input class="form-control" type="hidden" value="0" id="softwareCONT" name="softwareCONT">
                                      <div id="antessoftwareCONT">
                                                             
                                      </div>
                                      <table id="tab" class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th width="400">Elemento</th>
                                                                    <th width="100">Cantidad</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="elementoTR">
                                                                
                                                            </tbody>
                                      </table>
                                       <div class="row">
                                         <div class="col-md-9">
                                           
                                         </div>
                                         <div class="col-md-3">
                                           <label>Total:</label><input class="form-control int2" type="text" readonly="" required name="cantidadproducto" id="sum">
                                         </div>
                                       </div>
                                       <br>
                                      <br>
                                       <button type="button" class="btn btn-danger" onclick="add_();"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>

                                       <button type="button" class="btn btn-info" onclick="delete_one();"><i class="fa fa-trash" aria-hidden="true"></i></button>

    
                      </div>

                      <div class="col-md-6">
                          <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Observaciones</label>
                                        <textarea id="observaciones"  class="form-control int2" name="observaciones" rows="2"></textarea>
                                     </div>
                                </div>
                             </div>
                       </div>
                     


                    </div>

                    <br>
				           	<button type="submit" class="btn btn-success">Agregar</button>
                    </div>
              </div>
     </form>
    <!--CONTENIDO DE LA APLICACION-->

    

    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->





    <script type="text/javascript">
 var cont = 0;

   function add_(){
   var jhtml = '<select class="form-control">'+
  '<option value="PC">PC completa</option>'+
   '<option  value="Servidor">Servidor</option>'+
   '<option value="Laptop">Laptop</option>'+
   '<option value="Disco duro externo">Disco duro externo</option>'+
   '<option value="MOUSE">ACCES POINT</option>'+
   '<option value="MOUSE">MOUSE</option>'+
   '<option value="TECLADO">TECLADO</option>'+
   '<option value="MOUSE">MONITOR</option>'+
   '<option value="USB">USB</option>'+
   '<option value="MEMORIA SD">MEMORIA SD</option>'+
   '<option value="LECTOR DVD/CD">LECTOR DVD/CD</option>'+
   '<option value="IMPRESORES MATRICIALES">IMPRESORES MATRICIALES</option>'+
   '<option value="IMPRESORES MULTIFUNCIONALES">IMPRESORES MULTIFUNCIONALES</option>'+
   '<option value="IMPRESOR DESJEKT">IMPRESOR DESJEKT</option>'+
   '<option value="SCANNER">SCANNER</option>'+
   '<option value="WEBCAN">WEBCAN</option>'+
   '<option value="PARLANTES">PARLANTES</option>'+
   '<option value="LECTOR PARA MEMORIA SD">LECTOR PARA MEMORIA SD</option>'+
   '<option value="AUDIFONOS">AUDIFONOS</option>'+
   '<option value="MEMORIA SD">MEMORIA SD</option>'+
   '<option value="PROYECTOR">PROYECTOR</option>'+
   '<option value="FAX">FAX</option>'+
   '<option value="MICROFONO">MICROFONO</option>'+
   '<option value="OTRO">OTRO</option>'+
   '</select>';

    var data = '<tr>'+
          '<td width="400"><input  type="text" required name="name-'+cont+'"  id="name-'+cont+'" class="form-control int2"></td>'+
          '<td width="100"><input type="number" required name="can-'+cont+'" onchange="sumQ()" value="1" min="1" id="can-'+cont+'"  class="form-control int2"></td>'+
        '</tr>';
         $("#elementoTR").append(data);
         cont++;

         $("#softwareCONT").val(cont);
         sumQ();
      }

      function delete_one(){
        $("#elementoTR tr").last().remove();
        cont--;
        $("#softwareCONT").val(cont);
        sumQ();
      }

      function delete_(){
        $("#elementoTR").remove();
        var data = '<tbody id="elementoTR"></tbody>';
        $('#tab').append(data);
        cont = 0;
        $("#softwareCONT").val(cont);
      }

      function sumQ(){
        var cantidade = $('#softwareCONT').val();
        var suma = 0;
         for (var i = 0; i < cantidade; i++) {
            suma += parseInt($("#can-"+i).val());
         }
         $('#sum').val(suma);
      }


    </script>
</body>
</html>
