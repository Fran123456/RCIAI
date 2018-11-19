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

	<form>
	  <div class="form-row">
	    <div class="form-group col-md-3">
	      <label for="inputEmail4">Fecha de retiro de el equipo</label>
	      <input type="date" class="form-control" id="inputEmail4" placeholder="Email">
	    </div>
	    <div class="form-group col-md-3">
	      <label for="inputPassword4">Fecha que se da el prestamo</label>
	      <input type="date" class="form-control" id="inputPassword4" >
	    </div>
	    <div class="form-group col-md-3">
	      <label for="inputPassword4">Encargado del equipo</label>
	      <input type="text" class="form-control" id="inputPassword4" placeholder="Digite el nombre del encargado del equipo">
	    </div>
	    <div class="form-group col-md-3">
	      <label for="inputPassword4">Tecnico</label>
	      <input type="text" class="form-control" id="inputPassword4" placeholder="Digite el nombre del tecnico">
	    </div>
	  </div>

	  <div class="form-row">
	  	<div class="form-group col-md-3">
		    <label for="inputAddress">Porque solicita el prestamo</label>
		    <textarea name="" id="" class="form-control" cols="1" rows="4" placeholder="Descripción del porque solicitad el cambio"></textarea>
		</div>
		<div class="form-group col-md-3">
		    <label for="inputAddress">Tipo de prestamo</label>
		    <select name="tipo_prestamo" id="tipo_prestamo" class="form-control">
		    	<option value="">PC Completa</option>
		    	<option value="">Periferico</option>
		    </select>
		</div>
	  </div>

	  
	  <div class="form-row">
	  	<button type="submit" class="btn btn-primary">Sign in</button>
	  </div>
	</form>




    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
