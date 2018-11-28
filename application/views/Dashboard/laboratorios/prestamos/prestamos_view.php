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
	<!--Creamos el formulario para los prestamos-->

	<form id="prestamo">
	  <div class="form-row">
	    <div class="form-group col-md-3">
	      <label for="fecha_retiro">Fecha de retiro de el equipo</label>
	      <input type="date" class="form-control" id="fecha_retiro" name="fecha_retiro" placeholder="Email">
	    </div>
	    <div class="form-group col-md-3">
	      <label for="fecha_prestamo">Fecha que se da el prestamo</label>
	      <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" >
	    </div>
	    <div class="form-group col-md-3">
	      <label for="encargado">Encargado del equipo</label>
	      <input type="text" class="form-control" id="encargado" name="encargado" placeholder="Digite el nombre del encargado del equipo">
	    </div>
	    <div class="form-group col-md-3">
	      <label for="tecnico">Técnico</label>
	      <input type="text" class="form-control" id="tecnico" name="tecnico" placeholder="Digite el nombre del tecnico">
	    </div>
	  </div>

	  <div class="form-row">
		<div class="form-group col-md-3">
		    <label for="inputAddress">Tipo de prestamo</label>
		    <select name="tipo_prestamo" id="tipo_prestamo" class="form-control">
		    	<option value=1>PC Completa</option>
		    	<option value=2>Periferico</option>
		    </select>
		</div>
		<div class="form-group col-md-3">
			<label for="">Equipo al que se le hara el prestamo</label>
			<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Digite el codigo del equipo">
		</div>
		<div class="form-group col-md-6">
		    <label for="desc_prestamo">Porque solicita el prestamo</label>
		    <textarea name="desc_prestamo" id="desc_prestamo" class="form-control" cols="1" rows="1" placeholder="Descripción del porque solicitad el cambio"></textarea>
		</div>
		
	  </div>


	  <div class="form-row">
	  	<div class="form-group col-md-3">
			<button class="btn btn-info" id="verificar1"  onclick="verificar_codigo()">verificar</button>
		</div>
	  </div>

	</form>




    <!--FIN CONTENIDO DE LA APLICACION-->

    <!--Script-->
    <script>
    	$(document).ready(function()
    	{
			/*//Siempre que salgamos de un campo de texto, se chequeará esta función
			$("#prestamo input").keyup(function() 
			{
				var form = $(this).parents("#prestamo");
				var check = checkCampos(form);
		    	console.log(check);
				if(check) {
					$("#verificar1").prop("disabled", false);
				}
				else {
					$("#verificar1").prop("disabled", true);
				}
			});*/

			$("#verificar1").prop("disabled", true);
			$('#codigo').change(function(){
				var valor = $(this).val();
				if(value.length == 0)
				{
					$("#verificar1").prop("disabled", true);
				}else{
					$("#verificar1").prop("disabled", false);

				}
			})
			
		})


		//Función para comprobar los campos de texto
		function checkCampos(obj) {
			var camposRellenados = true;
			obj.find("input").each(function() {
			  	var $this = $(this);
				if( $this.val().length <= 0 ) {
					camposRellenados = false;
					return false;
				}
			});
			if(camposRellenados == false) {
				return false;
			}
			else {
				return true;
			}
		}



		function verificar_codigo()
		{
			//vamos a verificar el codigo digitado, si el codigo existe en el sistema
			var codigo = $('#codigo').val();
			//creamos un ajax el cual le mandaremos el codigo y verificara que si existe
			$.ajax({
				type: 'post',
				async: false,
				url: '<?php echo base_url()?>Movimientos_controller/verificar_codigo',
				data: 'codigo='+codigo,
				dataType: 'json',
				success: function(valor){
					if(valor == true)
					{
						alert('codigo correcto');
					}
					else{
						alert('ERROR');
					}
				}
			})

			var tipo = $('#tipo_prestamo option:selected').val();

		}
    </script>

    <!--Script-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
