<!--Vista para agregar perifericos que estan en bodega y no estan asignados a ninguna pc o servidor en bodega-->
<!DOCTYPE html>
<html>
<head>
	<title>Asignación de perifericos</title>
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
	var auxLetra = "";
	var controlador = 0;
	 function Obtener_pc_ID(){
	  var dato1 = $('#vay').val();
	  var dato = dato1;
	  $.ajax({
	     type: 'ajax',
	     method: 'post',
	     url: '<?php echo base_url() ?>get_pcs',
	     data: {dato: dato},
	     async: false,
	     dataType: 'json',
	     success: function(data){
	       
	       //html = data;
	       if( $("#vay").val() == 37 )
	       {
	       			for(i=0;i<data.length;i++){
			          html +="<option value="+data[i].identificador_lab+">"+data[i].identificador_lab+"</option>";
			       }
	       }
	       else{
	       			for(i=0;i<data.length;i++){
			          auxLetra = data[i].identificador.substr(0,2);
			       	if( auxLetra != 'DD'){
			          html +="<option value="+data[i].identificador+">"+data[i].identificador+"</option>";
			       	}
			       }
	       }
	       
	       if(html == ""){
              $('#cont').remove();
	          $('#col').append('<div id="cont" class="form-group"><br><label>No hay PC disponibles</label>');
			   swal({
				  type: 'error',
				  title: 'En esta unidad no hay PC para poder asignar un periferico',
				})
	          controlador = 0;
	          activar();
	       }
	       else{
	       	$('#cont').remove();
	       $('#col').append('<div id="cont" class="form-group"><label>PC disponibles</label><select class="form-control" name="op" id="op"></select></div>');
	       $('#op').append(html);
	       $('#asi').val('Por asignar');
	       controlador = 1;
	       html = "";
	       swal({
				  type: 'success',
				  title: 'Hay PC en esta unidad, puede continuar para asignar un periferico',
				})
	       activar();
	       }
	     },
	     error: function(){
	         alert("error");
	     }

	  });
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
    <form method="post" action="<?php echo base_url()?>move">
	<div class="">
		<div class="text-center">
			<h3>Asignar elemento</h3>
		</div><input type="hidden" name="compraid" value="<?php echo $data[0]['compra_id'] ?>">

		<div class="row border">
			<div class="text-center">
				<label><u>Información sobre el periferico que se va asignar</u></label>
			</div>
			<br>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Serial</label>
					<input name="serial" type="text" readonly="" class="form-control" value="<?php echo $data[0]['serial'] ?>">
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label class="control-label">Tipo de periferico</label>
					<input type="text"  readonly="" class="form-control" id="go" value="<?php echo $data[0]['tipo'] ?>">
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label class="control-label">Tipo</label>
					<input type="text" id="a" readonly="" class="form-control" value="<?php echo $data[0]['nombre']?>">
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label class="control-label">Marca</label>
					<input type="text" readonly="" id="b" class="form-control" value="<?php echo $data[0]['marca'] ?>">
				</div>
			</div>
			<?php if($data[0]['pc_servidor_id'] != ''): ?>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Pertenece a:</label>
					<input readonly="" type="text" class="form-control" value="<?php echo $data[0]['pc_servidor_id'] ?>">
				</div>
			</div>
		<?php else: ?>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Pertenece a:</label>
					<input readonly="" type="text" class="form-control" value="No pertenece a ningun PC en bodega">
				</div>
			</div>
		<?php endif; ?>
			
		</div>
		<br>
	    <div class="row border" >
	    	<div class="text-center">
				<label><u>Asignación</u></label>
			</div>
	       <div class="col-md-4">
	       	 <div class="form-group">
	       	 	<label>Unidad a la que se asignara</label>
	       	 	<select  onchange="cambios();" id="vay" class="form-control" name="unidad">
	       	 		<?php for($k =0; $k<count($unidades); $k++): ?>
	       	 		<option value="<?php echo $unidades[$k]['id_unidad'] ?>"><?php echo $unidades[$k]['unidad'] ?></option>
	       	 	   <?php endfor; ?>
	       	 	</select>
	       	 </div>
	       </div>
	       <div class="col-md-2">
	       	<br>
	       	 <button type="button" class="btn btn-danger" onclick="Obtener_pc_ID();">Validar PC existente</button>
	       </div>
	       <div id="col" class="col-md-3">
	       	 <div id="cont" class="form-group">
	       	 	<br><label>No hay PC disponibles</label>
	       	 </div>
	       </div>
	       <div id="col" class="col-md-3">
	       	 <div id="cont" class="form-group">
	       	 	<label>Estado:</label>
	       	 	<input id="asi" type="text" readonly="" class="form-control" value="sin asignar" name="">
	       	 </div>
	       </div>
	       <div id="col" class="col-md-3">
	       	 <div id="cont" class="form-group">
	       	 	<label>Fecha de asignación</label>
	       	 	<input id="asi" required=""  type="date" class="form-control"  name="fecha">
	       	 </div>
	       </div>
	       <div id="contenidoAux">

	       </div>
	    </div>
	    <br><input type="hidden" id="fantasma" value="sincodigo" name="fantasma">
	    <input type="hidden" id="fantasma2" value="admin" name="fantasma2">

	    <div class="row border">
	       <div class="text-center">
				<label><u>Movimiento</u></label>
			</div>
			<br>
			<div class="col-md-4">
				<div class="form-group">
					<label>¿Qué cambio sufrio el equipo?</label>
				    <textarea name="cambio" class="form-control" required></textarea>
					
				</div>
				<div class="form-group">
					<label> Caracteristicas de equipo que queda en función con ese código de inventario</label>
					<textarea name="desequipo" class="form-control" ></textarea>
					
				</div>
			</div>
			<div class="col-md-4">
				<label>Breve descripción porque se hizo el cambio</label>
				<textarea required="" class="form-control" rows="4" name="desMov"></textarea>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Encargado del equipo</label>
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

    <script type="text/javascript">
    	if($('#go').val() == 'UPS'){
		htmlc = '<div id="delx">'+'<div id="encargadox" class="col-md-4"><label>Encargado</label><input type="text" name="enc" class="form-control"></div>'+
	       		'<div id="aux1" class="col-md-1">'+
	       	        '<div id="cont" class="form-group">'+
	       	 	      '<label></label>'+
	       	 	      '<input id="asi" readonly="" type="text" class="form-control"  name="cod1" value="UPS">'+
	       	     '</div>'+
	          '</div>'+
	          '<div id="aux2" class="col-md-2 col-sm-2 ">'+
                           '<label id="errorlabel">Codigo</label>'+
                            '<input type="number" min="0" required=""  id="cod2" class="form-control" name="cod2">'+
                '</div>'+
                '<div id="aux3" class="col-md-2 col-sm-2 ">'+
                           '<label id="errorlabel"></label>'+
                            '<select onchange="cambioUSAM();" class="form-control" id="cod3" name="cod3"><option value="USAM">USAM</option><option value="LAB1">LAB1</option><option value="LAB2">LAB2</option><option value="LAB3">LAB3</option><option value="LAB4">LAB4</option><option value="LAB5">LAB5</option><option value="HW">HW</option><option value="RED">RED</option></select>'+
                '</div>'+
	       	'</div>';

	       	$('#contenidoAux').append(htmlc);

	       	$('#fantasma').val('concodigo');

	}


	 	if($('#go').val() == 'WEBCAN'){
		htmlc = '<div id="delx">'+'<div id="encargadox" class="col-md-3"><label>Encargado</label><input type="text" name="enc" class="form-control"></div>'+
	       		'<div id="aux1" class="col-md-2">'+
	       	        '<div id="cont" class="form-group">'+
	       	 	      '<label></label>'+
	       	 	      '<input id="asi" readonly="" type="text" class="form-control"  name="cod1" value="WEBCAM">'+
	       	     '</div>'+
	          '</div>'+
	          '<div id="aux2" class="col-md-2 col-sm-2 ">'+
                           '<label id="errorlabel">Codigo</label>'+
                            '<input type="number" min="0" required=""  id="cod2" class="form-control" name="cod2">'+
                '</div>'+
                '<div id="aux3" class="col-md-2 col-sm-2 ">'+
                           '<label id="errorlabel"></label>'+
                            '<select onchange="cambioUSAM();" class="form-control" id="cod3" name="cod3"><option value="USAM">USAM</option><option value="LAB1">LAB1</option><option value="LAB2">LAB2</option><option value="LAB3">LAB3</option><option value="LAB4">LAB4</option><option value="LAB5">LAB5</option><option value="HW">HW</option><option value="RED">RED</option></select>'+
                '</div>'+
	       	'</div>';

	       	$('#contenidoAux').append(htmlc);

	       	$('#fantasma').val('concodigo');

	}



	function cambios(){
		if($('#vay').val() == 37){
			$('#encargadox').remove();
			$('#fantasma2').val('lab');
		}else{
			$('#encargadox').remove();
			$('#delx').append('<div id="encargadox" class="col-md-4"><label>Encargado</label><input type="text" name="enc" class="form-control"></div>');
		}
      
	}

	function cambioUSAM(){
       var aver = $('#cod3').val();
       if(aver =="USAM"){
       	$('#fantasma2').val('admin');
       }


       if(aver != "USAM"){
       	$('#fantasma2').val('lab');
       }



	}
    </script>
</body>
</html>