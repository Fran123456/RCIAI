<!DOCTYPE html>
<html>
<head>
	<title>revisión de compra</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
    <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/app/shopping.css ">

    <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/package/dist/sweetalert2.min.css">

		<style media="screen">
		.modal-dialog {
			width: 1200px;
			margin: 30px auto;
		}

		</style>

    <script>

      var cantidad = 0;
      var contadorF = 0;
			var contadorCo = 0;
      var canPerifericos = 0;
      $(document).ready(function(){

      });
      var arraySeriales = new Array(cantidad);
			var arraycodes = new Array(cantidad);

      function validar_serial(){
        contadorF = 0;
        contadorCo = 0;
        if($("input[name='tipo_producto']").val() == 'Periferico'){
            cantidad =$("input[name='cantidadproducto']").val();
            for(var i = 0; i< cantidad; i++){
                arraySeriales[i] = $("input[name='serial-"+(i+1)+"']").val();
								console.log(arraySeriales);
                contadorF+= Obtener_serial(arraySeriales[i]);
								if(Obtener_serial(arraySeriales[i]) > 0)
								{
									$('#'+i).modal('show');
								}
            }
        } 

        if($("input[name='tipo_producto']").val() == 'PC' && $("input[name='radioVue']").val() == 'Nuevo'){
					var dataHtml = "";
            cantidad =$("input[name='cantidadproducto']").val();
            canPerifericos = $("input[name='cantidadElementosPC']").val();
            nombrePerifericos = new Array(canPerifericos);
             for(var k = 0; k<cantidad ; k++){
                for(var i = 0; i<canPerifericos; i++){
                   nombrePerifericos[i] =  $("input[name='put-"+i+"']").val();
                   contadorF+= Obtener_serial($("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val());

									 if(Obtener_serial($("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val()) > 0){
										 dataHtml += "<h4>Se ha encontrado la serial  <strong>" + $("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val()+ "</strong><br>" +
										 'En la PC# ' + (k+1) + ", periferico <strong>" + nombrePerifericos[i]  +".</strong> Ya esta en uso, por favor ingresar la correcta</h4><br>";
										 $("#contenido").html(dataHtml);
										 $('#exampleModal').modal('show');
									 }
                }
             }
        }

        if($("input[name='tipo_producto']").val() == 'PC' && $("input[name='radioVue']").val() == 'Nuevo para asignar'){
          var dataHtml = "";
            cantidad =$("input[name='cantidadproducto']").val();
            canPerifericos = $("input[name='cantidadElementosPC']").val();
            nombrePerifericos = new Array(canPerifericos);
             for(var k = 0; k<cantidad ; k++){
              contadorCo+= Obtener_codigo($("input[name='code-"+(k+1)+"']").val());

                for(var i = 0; i<canPerifericos; i++){
                   nombrePerifericos[i] =  $("input[name='put-"+i+"']").val();
                   contadorF+= Obtener_serial($("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val());
                   
                   if(Obtener_serial($("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val()) >0){
                     dataHtml += "<h4>Se ha encontrado la serial  <strong>" + $("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val()+ "</strong><br>" +
                     'En la PC# ' + (k+1) + ", periferico <strong>" + nombrePerifericos[i]  +".</strong> Ya esta en uso, por favor ingresar la correcta</h4><br>";
                     
                   }
                }

                 if(Obtener_codigo($("input[name='code-"+(k+1)+"']").val()) >0){
                     dataHtml += "<h4>Se ha encontrado el codigo:  <strong>" + $("input[name='code-"+(k+1)+"']").val()+ "</strong><br>" +
                     'En la PC# ' + (k+1) +".</strong> Ya esta en uso, por favor ingresar otro codigo</h4><br>";
                     
                   }
             }
             if(contadorCo > 0 || contadorF > 0){
              $("#contenido").html(dataHtml);
              $('#exampleModal').modal('show');
             }
              
        }

				if($("input[name='tipo_producto']").val() == 'Servidor' && $("input[name='radioVue']").val() == 'Nuevo'){
					var dataHtml = "";

						cantidad =$("input[name='cantidadproducto']").val();
						canPerifericos = $("input[name='cantidadElementosPC']").val();
						nombrePerifericos = new Array(canPerifericos);
						 for(var k = 0; k<cantidad ; k++){
								for(var i = 0; i<canPerifericos; i++){
									 nombrePerifericos[i] =  $("input[name='put-"+i+"']").val();
									 contadorF+= Obtener_serial($("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val());

									 if(Obtener_serial($("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val()) > 0){
										 dataHtml += "<h4>Se ha encontrado la serial  <strong>" + $("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val()+ "</strong><br>" +
										 'En la PC# ' + (k+1) + ", periferico <strong>" + nombrePerifericos[i]  +".</strong> Ya esta en uso, por favor ingresar la correcta</h4><br>";
										 $("#contenido").html(dataHtml);
										 $('#exampleModal').modal('show');
									 }
								}
						 }
				}


        if($("input[name='tipo_producto']").val() == 'Servidor' && $("input[name='radioVue']").val() == 'Nuevo para asignar'){
           var dataHtml = "";
            cantidad =$("input[name='cantidadproducto']").val();
            canPerifericos = $("input[name='cantidadElementosPC']").val();
            nombrePerifericos = new Array(canPerifericos);
             for(var k = 0; k<cantidad ; k++){
              contadorCo+= Obtener_codigo($("input[name='code-"+(k+1)+"']").val());

                for(var i = 0; i<canPerifericos; i++){
                   nombrePerifericos[i] =  $("input[name='put-"+i+"']").val();
                   contadorF+= Obtener_serial($("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val());
                   
                   if(Obtener_serial($("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val()) >0){
                     dataHtml += "<h4>Se ha encontrado la serial  <strong>" + $("input[name='K-"+(k+1)+"-serial-"+nombrePerifericos[i]+"']").val()+ "</strong><br>" +
                     'En la PC# ' + (k+1) + ", periferico <strong>" + nombrePerifericos[i]  +".</strong> Ya esta en uso, por favor ingresar la correcta</h4><br>";
                     
                   }
                }

                 if(Obtener_codigo($("input[name='code-"+(k+1)+"']").val()) >0){
                     dataHtml += "<h4>Se ha encontrado el codigo:  <strong>" + $("input[name='code-"+(k+1)+"']").val()+ "</strong><br>" +
                     'En la PC# ' + (k+1) +".</strong> Ya esta en uso, por favor ingresar otro codigo</h4><br>";
                     
                   }
             }
             if(contadorCo > 0 || contadorF > 0){
              $("#contenido").html(dataHtml);
              $('#exampleModal').modal('show');
             }
        }


				if($("input[name='tipo_producto']").val() == 'Laptop' && $("input[name='radioVue']").val() == 'Nuevo'){

            cantidad =$("input[name='cantidadproducto']").val();
            for(var i = 0; i< cantidad; i++){
                arraySeriales[i] = $("input[name='serial-"+(i+1)+"']").val();
								console.log(arraySeriales);
                contadorF+= Obtener_serial(arraySeriales[i]);
								if(Obtener_serial(arraySeriales[i]) > 0)
								{
									$('#'+i).modal('show');
								}

            }
        }


        if($("input[name='tipo_producto']").val() == 'Laptop' && $("input[name='radioVue']").val() == 'Nuevo para asignar'){
            cantidad =$("input[name='cantidadproducto']").val();
            for(var i = 0; i< cantidad; i++){
                arraySeriales[i] = $("input[name='serial-"+(i+1)+"']").val();
                console.log(arraySeriales);
                contadorF+= Obtener_serial(arraySeriales[i]);
                contadorCo+= Obtener_codigo(arraycodes[i]);
                if(Obtener_serial(arraySeriales[i]) > 0)
                {
                  $('#'+i).modal('show');
                }
                if(Obtener_codigo(arraycodes[i]) > 0)
                {
                  $('#'+i).modal('show');
                }

            }
        }


				if($("input[name='tipo_producto']").val() == 'Disco duro externo'  && $("input[name='radioVue']").val() =='Nuevo'){
            cantidad =$("input[name='cantidadproducto']").val();
            for(var i = 0; i< cantidad; i++){
                arraySeriales[i] = $("input[name='serial-"+(i+1)+"']").val();
								//console.log(arraySeriales);
                contadorF+= Obtener_serial(arraySeriales[i]);
								if(Obtener_serial(arraySeriales[i]) > 0)
								{
									$('#'+i).modal('show');
								}
            }
        }


        if($("input[name='tipo_producto']").val() == 'Disco duro externo' && $("input[name='radioVue']").val() =='Nuevo para asignar' ){
            cantidad =$("input[name='cantidadproducto']").val();
            for(var i = 0; i< cantidad; i++){
                arraySeriales[i] = $("input[name='serial-"+(i+1)+"']").val();
                arraycodes[i] = $("input[name='codex-"+(i+1)+"']").val();
                //console.log(arraySeriales);
                contadorF+= Obtener_serial(arraySeriales[i]);
                contadorCo+= Obtener_codigo(arraycodes[i]);

                if(Obtener_serial(arraySeriales[i]) > 0)
                {
                  $('#'+i).modal('show');
                }

                if(Obtener_codigo(arraycodes[i]) > 0)
                {
                  $('#'+i).modal('show');
                }

            }
        }


      if(contadorF == 0 && contadorCo == 0){
        mensaje('SERIALES VALIDADAS,CODIGO VALIDADO, PUEDE CONTINUAR CON EL PROCESO','success');
        $('#enviaralv').attr("disabled", false);
      }
			else if(contadorF > 0 && contadorCo>0)
			{
			  	mensaje('Porfavor verifique las seriales y codigos, ya que una o más podrian ya estar en uso','error');
      }else if(contadorF == 0  || contadorCo == 0){
				  mensaje('Porfavor verifique las seriales o codigos, ya que una o más podrian ya estar en uso','error');
			}

      

    }


		function mensaje(mensaje, type)
		{
			swal({
				type: type,
				title: mensaje,
			});
		}


   let html = "";
    function Obtener_serial(dato1){
    var contador = 0;
    var dato = dato1;
    $.ajax({
       type: 'ajax',
       method: 'post',
       url: '<?php echo base_url()?>shoppingAdd_Controller/validar_serial_ajax',
       data: {dato: dato},
       async: false,
       dataType: 'json',
       success: function(data){
         console.log(Object.values(data));
         //html = data;
         if(data == ""){
           //alert('serial limpia');
         }else{
           //alert('serial erronea');
           contador++;
         }

       },
       error: function(){
           alert("error");
       }
    });
    return contador;
  }



	function Obtener_codigo(dato1){
	var contador = 0;
	var dato = dato1;
	$.ajax({
		 type: 'ajax',
		 method: 'post',
		 url: '<?php echo base_url()?>shoppingAdd_Controller/validar_codigo_ajax',
		 data: {dato: dato},
		 async: false,
		 dataType: 'json',
		 success: function(data){
			 console.log(Object.values(data));
			 //html = data;
			 if(data == ""){
				 //alert('serial limpia');
			 }else{
				 //alert('serial erronea');
				 contador++;
			 }

		 },
		 error: function(){
				 alert("error");
		 }
	});
	return contador;
}
    </script>
</head>
<body>

    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->

<!--VALIDACIONES CODE ***********************************************************************-->

 <!--VALIDACIONES DE SERIAL-->
  <?php if(isset($PC)): ?>
    <?php if(isset($PC['errorCode'])): ?>
    <?php if($PC['errorCode']>=1): ?>
      <div class="alert alert-danger alert-dismissible " role="alert">
           <strong>Error, un codigo de PC o servidor ya esta en uso, debe ingresar un codigo nuevo</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
     </div>
   <?php endif; ?>
   <?php endif; ?>


 <?php endif; ?>

  <?php if(isset($laptop)): ?>
   <?php if(isset($laptop['errorCode'])): ?>
   <?php if($laptop['errorCode']>=1): ?>
    <div class="alert alert-danger alert-dismissible " role="alert">
         <strong>Error, un codigo de laptop ya esta en uso, debe ingresar un codigo nuevo</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   </div>
   <?php endif; ?>
   <?php endif; ?>
 <?php endif; ?>


  <?php if(isset($discosDuros)): ?>
  <?php if(isset($discosDuros['errorCode'])): ?>
   <?php if($discosDuros['errorCode']>=1): ?>
    <div class="alert alert-danger alert-dismissible " role="alert">
         <strong>Error, un codigo de  disco duro externo ya esta en uso, debe ingresar un codigo nuevo</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   </div>
   <?php endif; ?>
   <?php endif; ?>
 <?php endif; ?>

<!--VALIDACIONES CODE *******************************************************************-->





  <!--VALIDACIONES DE SERIAL*********************************************************************************-->
  <?php if(isset($laptop)): ?>
   <?php if($laptop['error']>=1): ?>
    <div class="alert alert-danger alert-dismissible " role="alert">
         <strong>Error, una o más seriales no son validas, porfavor verifique</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   </div>
   <?php endif; ?>
 <?php endif; ?>


  <?php if(isset($perifericos)): ?>
   <?php if($perifericos['error']>=1): ?>
    <div class="alert alert-danger alert-dismissible " role="alert">
         <strong>Error, una o más seriales no son validas, porfavor verifique</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   </div>
   <?php endif; ?>
 <?php endif; ?>

 <!--VALIDACIONES DE SERIAL-->
  <?php if(isset($PC)): ?>
   <?php if($PC['error']>=1): ?>
    <div class="alert alert-danger alert-dismissible " role="alert">
         <strong>Error, una o más seriales no son validas, porfavor verifique</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   </div>
   <?php endif; ?>
 <?php endif; ?>


  <?php if(isset($discosDuros)): ?>
   <?php if($discosDuros['error'] >= 1): ?>
    <div class="alert alert-danger alert-dismissible " role="alert">
         <strong>Error, una o más seriales no son validas, porfavor verifique</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   </div>
   <?php endif; ?>
 <?php endif; ?>
<!--VALIDACIONES DE SERIAL********************************************************************************-->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="contenido" class="modal-body modal-body-append" >

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="contenido2" class="modal-body modal-body-append" >

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

    <form id="compra_fin" action="<?php echo base_url().'shopping-success'?>" method="post" accept-charset="utf-8">
	    <div class="row">
        <!--IMPORTANTE PARA SABER QUE TIPO ES SI PC , SERVIDOR O PERIFERICO-->
         <input type="text" hidden value="<?php echo $tipo?>" name="tipoSaber">
	      <div class="col-md-12">
	      	<div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i> COMPRA</h3>
                  <div class="right">
                  <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                  </div>
                </div>
	                <div class="panel-body">
	                     <div class="row">
                        <div class="col-md-7">
                            <div class="row">
								<input type="text" hidden name="id_compraX" value="<?php echo $dataCompra['id_compra'] ?>">
                                <div class="col-md-6">
                                    <label class="control-label">Tipo de producto</label>
                                    <div class="form-group">
                                     <input v-model="tipo" type="text" readonly class="form-control " name="tipo_producto" value="<?php echo $tipo ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">proveedor</label>
                                        <input  class="form-control" value="<?php echo $dataCompra['proveedor'] ?>" type="text" name="proveedor">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha autorización</label>
                                        <input value="<?php echo $dataCompra['fecha_autorizacion'] ?>"  class="form-control" type="date" name="fechautorizacion">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de compra</label>
                                        <input  value="<?php echo $dataCompra['fecha_compra'] ?>"  class="form-control" type="date" name="fechacompra">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
	                            <label class="control-label">Detalle del producto</label>
	                            <textarea id="detalle"  class="form-control" name="detalle"  rows="6"> <?php echo $dataCompra['detalle'] ?></textarea>
	                        </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    	<div class="col-md-7">
                    		<div class="row">
                    			  <div class="col-md-6 ">
		                            <div class="form-group">
		                                <label class="control-label">Cantidad producto</label>
		                                <input v-model="cantidad"  readonly class="form-control" value="<?php echo $dataCompra['cantidad'] ?>" type="number" min="0" name="cantidadproducto"/>
		                             </div>
		                          </div>
		                           <div class="col-md-6 ">
		                            <div class="form-group">
		                                <label class="control-label">N° factura</label>
		                                <input value="<?php echo $dataCompra['n_factura'] ?>" class="form-control" type="text"  name="factura"/>
		                             </div>
		                           </div>
                    		</div>
                    		<div class="row">
                    			<div class="col-md-4">
		                             <div class="form-group">
		                                <label class="control-label">Periodo garantia</label>
		                                <input value="<?php echo $dataCompra['garantia'] ?>"  class="form-control" type="text"  name="garantia"/>
		                             </div>
		                        </div>
		                        <div class="col-md-4">
		                                <div class="form-group">
		                                    <label class="control-label">Total de compra $</label>
		                                    <input value="<?php echo $dataCompra['total'] ?>" class="form-control" type="text"  name="totalcompra"/>
		                                 </div>
                                </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Tipo de compra</label>
                                        <input v-model="radio" value="<?php echo $op ?>" class="form-control" type="text"  name="radioVue">
                                     </div>
                              </div>
                    		</div>
                    	</div>
                    	<div class="col-md-5">
                    		<div class="form-group">
                              <label class="control-label">Observaciones</label>
                              <textarea id="observaciones"  class="form-control" name="observaciones" rows="3"><?php echo $dataCompra['observaciones'] ?></textarea>
                        </div>
                    	</div>
                    </div>
                    <input type="text" hidden name="usuario" value=" <?php echo $dataCompra['usuario_id'] ?> ">
	                </div>
             </div>
         </div>
         </div>


       <!--SI ES PERIFERICO, PC , SERVIDOR NUEVO PARA BODEGA-->
           <?php if($op =="Nuevo"): ?>
             <div   class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-map-marker" aria-hidden="true"></i> DESTINOS</h3>
                  <div class="right">
                  <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                  </div>
                </div>
                  <div class="panel-body">
                    <div  class="row" >
                      <div class="col-md-6">
                          <div class="form-group">
                         	<label>Unidad</label>
                         	<input readonly class="form-control" type="text" value="bodega de informatica" name="unidad">
                         	<!--ID DE LA UNIDAD-->
                         	<input type="text" hidden value="1" name="id_unidad">
                          </div>
                      </div>
                      <div class="col-md-6">
                      	  <div class="form-group">
                         	<label>Cantidad</label>
                         	<input readonly class="form-control" type="text" name="cantidad" value="{{cantidad}}">
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
              <?php endif; ?>
      <!--SI ES PERIFERICO, PC , SERVIDOR NUEVO PARA BODEGA-->


    <!--SI ES PERIFERICO, PC , SERVIDOR NUEVO PARA UNIDAD EN ESPECIFICA-->
    <?php if($op =="Nuevo para asignar"): ?>
                   <div>
                     <div class="panel">
                        <div class="panel-heading">
                          <h3 class="panel-title"><i class="fa fa-map-marker" aria-hidden="true"></i> DESTINOS</h3>
                          <div class="right">
                          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                          </div>
                        </div>
                          <div class="panel-body">

                            <?php for ($R = 0; $R <count($dataUnidadXcantidad['n']) ; $R++):?>
                            <div  class="row" >
                              <div class="col-md-6">
                                  <div class="form-group">
                                  <label>Unidad</label>
                                  <input readonly class="form-control" type="text" name="unidad-<?php echo ($R+1)?>" value="<?php echo $dataUnidadXcantidad['unidad'][$R]?>">
                                  <!--ID DE LA UNIDAD-->
                                  <input type="text" hidden="" value="<?php  echo $dataUnidadXcantidad['unidad_id'][$R][0]['id_unidad']?>" name="<?php echo 'unidadA-' . $R?>">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                  <label>Cantidad</label>
                                  <input readonly class="form-control" type="text" name="cantidad-<?php echo ($R+1)?>" value="<?php echo $dataUnidadXcantidad['cantidad'][$R]?>">
                                  </div>
                              </div>
                            </div>
                            <?php endfor; ?>
                            <!--AQUI VEMOS LAS UNIDADES X CANTIDAD -->
                            <input type="text" hidden value=" <?php echo count($dataUnidadXcantidad['n']) ?> "  name="cantidadUnidadxCantidad">
                          </div>
                      </div>
                   </div>
    <?php endif; ?>
     <!--SI ES PERIFERICO, PC , SERVIDOR NUEVO PARA UNIDAD EN ESPECIFICA-->

<!--*****************************************************************************************************************-->
<!--BODEGA VISTAS-->

   <!--PARA NUEVO ELEMENTO PERIFERICO QUE VA A BODEGA  Y TAMBIEN PARA PERIFERICO QUE VA PARA INVENTARIO ADMINISTRATIVCO-->
	 	<?php require 'application/views/Dashboard/shopping/up/periferico_bodega_AdminView.php'; ?>
   <!--PARA NUEVO ELEMENTO PERIFERICO QUE VA A BODEGA  Y TAMBIEN PARA PERIFERICO QUE VA PARA INVENTARIO ADMINISTRATIVCO-->

   <!--PC QUE VA PARA BODEGA-->
     <?php require 'application/views/Dashboard/shopping/up/pc_to_server_bodegaView.php'; ?>
   <!--PC QUE VA PARA BODEGA-->




<!--************************************************************************************************************************-->
<!--ADMINISTRATIVO VISTAS-->


  <!--DISCO DURO  QUE VA PARA ADMINISTRATIVO-->
      <?php require 'application/views/Dashboard/shopping/up/discoDuro_adminView.php'; ?>
  <!--DISCO DURO  QUE VA PARA ADMINISTRATIVO-->


  <!--LAPTOP QUE VA PARA ADMINISTRATIVO-->
     <?php require 'application/views/Dashboard/shopping/up/laptop_adminView.php'; ?>
  <!--LAPTOP QUE VA PARA ADMINISTRATIVO-->


  <!--PC y SERVIDOR QUE VA PARA INVENTARIO ADMINISTRATIVO-->
      <?php require 'application/views/Dashboard/shopping/up/pc_to_server_adminView.php'; ?>
  <!--PC Y SERVIDOR QUE VA PARA INVENTARIO ADMINISTRATIVO-->



          <!--SABER QUE OPCION TOMO EN EL RADIO BUTTON -->
          <input type="text" hidden="" name="radioOP" value="<?php echo $op ?>">
          <input class="btn btn-danger btn-lg"  type="button" onclick="validar_serial();" value="Validar seriales" >
          <input class="btn btn-info btn-lg" id="enviaralv" disabled="" type="submit" value="Agregar" >
   </form>
    <!--FIN CONTENIDO DE LA APLICACION -->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
     <script src=" <?php echo base_url()?>assets/js/app/shopping_confirm.js"></script>

</body>
</html>
