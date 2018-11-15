<!--Vista para agregar perifericos que estan en bodega y no estan asignados a ninguna pc o servidor en bodega-->
<!DOCTYPE html>
<html>
<head>
	<title>Asignación de disco duro externo</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

   <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">



	<style type="text/css" media="screen">
			hr {
		margin-top: 20px;
		margin-bottom: 20px;
		border: 0;
		border-top: 4px solid #abb4b2;
	}
	.border{
		border: 3px solid #c0cfcc;
		background-color : #ebf7f4;
		padding-top: 20px;
		padding-bottom: 20px;
	}
    </style>

<script>
	let html = "";
	var controlador = 0;
	 function Obtener_pc_ID(){
	  var codiguito = $('#a').val()+$('#b').val()+$('#c').val();
	  $('#d').val(codiguito);
	  var dato1 = codiguito;
	  var dato = dato1;

	  if($('#b').val() != ""){
	  $.ajax({
	     type: 'ajax',
	     method: 'post',
	     url: '<?php echo base_url() ?>bodega_Controller/get_codigos',
	     data: {dato: dato},
	     async: false,
	     dataType: 'json',
	     success: function(data){
	      console.log(Object.values(data));
	       //html = data;
	       if(data == ""){
	       	if($('#codigopc').val() ==""){
               swal({
				  type: 'warning',
				  title: 'El campo codigo no puede estar vacio',
				})
               controlador = 0;
                activar();
	       	}else
	       	{
			   swal({
				  type: 'success',
				  title: 'El codigo es valido',
				})
			    controlador = 1;
	          activar();

	       	}
              
	       }
	       else{
	       swal({
				  type: 'warning',
				  title: 'el codigo ya esta en uso',
				})
	       controlador = 0;
	       activar();
	       }
	       html="";
	     },
	     error: function(){
	         alert("error");
	     }

	  });

	}
	else{
		swal({
				  type: 'warning',
				  title: 'el campo codigo no debe estar vacio',
				})
	}
	}

	function activar(){
      if(controlador == 1){
       $('#final').attr("disabled", false);
      }else{
      	$('#final').attr("disabled", true);
      }
	}

	</script>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <?php if($this->session->flashdata('error_update')):?>
        <script>
        	swal({
				  type: 'error',
				  title: 'EL PERIFERICO NO HA PODIDO SER ASIGNADO',
				})
        </script>
    <?php endif; ?>


    <!--CONTENIDO DE LA APLICACION-->
    <form method="post" action="<?php echo base_url()?>move-DDE">
	<div class="">
		<div class="text-center">
			<h3>Asignar disco duro externo</h3>
		</div>
		
		<div class="row border">
			<div class="text-center">
				<label><u>Información sobre el disco duro externo que se va asignar</u></label>
			</div>
			<br>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Serial</label>
					<input name="serial" type="text" readonly="" class="form-control" value="<?php echo $data[0]['serial'] ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Tipo elemento</label>
					<input type="text" readonly="" class="form-control" value="<?php echo $data[0]['tipo'] ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Tipo</label>
					<input type="text" readonly="" class="form-control" value="<?php echo $data[0]['nombre']?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Marca</label>
					<input type="text" readonly="" class="form-control" value="<?php echo $data[0]['marca'] ?>">
				</div>
			</div>
			
			
		</div>
		<br>
		<div class="row border" >
	    	<div class="text-center">
				<label><u>Asignación</u></label>
			</div>
	       <div class="col-md-3">
	       	 <div class="form-group">
	       	 	<label>Unidad a la que se asignara</label>
	       	 	<select id="vay" class="form-control" name="unidad">
	       	 		<?php for($k =0; $k<count($unidades); $k++): ?>
	       	 		<option value="<?php echo $unidades[$k]['id_unidad'] ?>"><?php echo $unidades[$k]['unidad']  ?></option>
	       	 	   <?php endfor; ?>
	       	 	</select>
	       	 </div>
	       </div>
	       <div id="col" class="col-md-3">
	       	 <div id="cont" class="form-group">
	       	 	<label>Fecha de asignación</label>
	       	 	<input id="asi" required=""  type="date" class="form-control"  name="fecha">
	       	 </div>
	       </div>
	       <div id="col" class="col-md-2">
	       	 <div id="cont" class="form-group">
	       	 	<label>Estado:</label>
	       	 	<input id="asi" type="text" class="form-control" value="sin asignar" name="">
	       	 </div>
	       </div>
	       <div id="col" class="col-md-4">
	       	 <div id="cont" class="form-group">
	       	 	<label>Encargado:</label>
	       	 	<input id="asi" type="text" class="form-control" name="enc" >
	       	 </div>
	       </div>

	       <div class="col-md-1">
           	 <div id="cont" class="form-group">
	       	 	<label></label>
	       	 	<input id="a" readonly="" value="DDE" type="text" class="form-control"  >
	       	 </div>
           </div>


           <div class="col-md-2">
           	 <div id="cont" class="form-group">
	       	 	<label>Codigo</label>
	       	 	<input id="b" type="number" class="form-control"  >
	       	 </div>
           </div>

           <div class="col-md-1">
           	 <div id="cont" class="form-group">
	       	 	<label></label>
	       	 	<input id="c" type="text" readonly="" value="USAM" class="form-control"  >

	       	 </div>
           </div> 
          <input id="d" type="hidden"  name="codigopc">


	       <div class="col-md-2">
	       	<br>
	       	 <button type="button" class="btn btn-danger" onclick="Obtener_pc_ID();">Validar codigo</button>
	       </div>
	    </div>
		<br>
		
		<div class="row border">
	       <div class="text-center">
				<label><u>Movimiento</u></label>
			</div>
			<br>
			<div class="col-md-4">
				<div class="form-group">
					<label>Titulo movimiento</label>
					<input required type="text" name="cambio" class="form-control" value="">
				</div>
				<div class="form-group">
					<label>Descripción del  equipo</label>
					<input type="text" name="desequipo" class="form-control" value="">
				</div>
			</div>
			<div class="col-md-4">
				<label>Descripción del movimiento</label>
				<textarea required="" class="form-control" rows="4" name="desMov"></textarea>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Encargado del movimiento</label>
					<input required="" type="text" name="encargado" class="form-control" value="">
				</div>
				<div class="form-group">
					<label>Tecnico</label>
					<input type="text" name="tecnico" class="form-control" value="">
				</div>
			</div>
	    </div>
	    
	    
	</div>
	<br>
	<button type="submit" id="final" class="btn btn-success" disabled="">Asignar</button>
  </form>
 
    
    <!--FIN CONTENIDO DE LA APLICACION-->
    <!--<script>
    

    </script>-->


	
    <script type="text/javascript" charset="utf8" src="<?php echo base_url()?>assets/js/bodega/bodega.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>