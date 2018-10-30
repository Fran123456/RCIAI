<!--Vista para agregar perifericos que estan en bodega y no estan asignados a ninguna pc o servidor en bodega-->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
	<div class="container">
		<div class="text-center">
			<h3>Asignar elemento</h3>
		</div>
		<?php foreach($detalle as $key) {?>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Serial</label>
					<input type="text" class="form-control" value="<?php echo $key->serial ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Tipo</label>
					<input type="text" class="form-control" value="<?php echo $key->tipo ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Nombre</label>
					<input type="text" class="form-control" value="<?php echo $key->nombre ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Marca</label>
					<input type="text" class="form-control" value="<?php echo $key->marca ?>">
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="donde" class="label-control">Donde asignar</label>
					<div class="form-check form-check-inline">
						<input id="admi" type="radio" class="form-check-input" checked="true" name="lugar" value="administrativo">
						<label for="admi" class="form-check-label">Administrativo</label>
					</div>
					<div class="form-check form-check-inline">
						<input id="lab" type="radio" class="form-check-input" name="lugar" value="laboratorio">
						<label for="lab" class="form-check-label">Laboratorio</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<button id="boton" class="btn btn-primary" onclick="lugarAsignar();">Mostrar</button>
			</div>
		</div>
		
		<br><br>
		<!--si se selecciona Administrativo en el check se mostrara este div-->
		<div id="administrativo" class="row">
			<div class="col-md-6">
				<label for="" class="control-label">Área administrativa</label>
				<!--vamos a seleccionar a que área administrativa se quiere asignarel periferico-->
			</div>
		</div>
		<!--                                                                  -->

		<!--si se selecciona Laboratorio en el check se mostrara este div-->
		<div id="laboratorio" class="row">
			<div class="col-md-6">
				<label for="" class="control-label">Laboratorios</label>
			</div>
		</div>
		<!--                                                                  -->
	<?php } ?>
	</div>
    <!--FIN CONTENIDO DE LA APLICACION-->
    <script>
    	//escondemos los div que contiene el formulario para administrativo y laboratorio
    	$('#administrativo').css('display','none');
    	$('#laboratorio').css('display','none');
    	function lugarAsignar(){
    		//obtenemos el valor de los radio button
    		var op = $('input:radio[name=lugar]:checked').val();
    		if(op == 'administrativo'){
    			//vamos a mostrar el div que contiene el formulario para administrativo
    			$('#administrativo').css('display','block');
    			$('#laboratorio').css('display','none');
    		}else{
    			//vamos a mostrar el div que contiene el formulario para laboratorio
    			$('#laboratorio').css('display','block');
    			$('#administrativo').css('display','none');
    		}
    	}

    </script>


    <!--<script type="text/javascript" charset="utf8" src="<?php echo base_url()?>assets/js/bodega/bodega.js" ></script>-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>