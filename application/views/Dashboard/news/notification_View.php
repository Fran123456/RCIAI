<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
  <style media="screen">
	.margen{
		margin-left: 150px;
		margin-right: 150px;
		margin-top: 20px;
	}
  .contorno{
  -moz-box-shadow: 0px 1px 2px 0 rgba(0, 0, 0, 0.4);
  -webkit-box-shadow: 0px 1px 2px 0 rgba(0, 0, 0, 0.4);
  box-shadow: 0px 1px 2px 0 rgba(0, 0, 0, 0.5);
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  border-radius: 4px;
  border-color: black;
  background-color: #fcfcfc;
}
  .con{
    padding-left: 20px;
    padding-right: 20px;  
  }
  </style>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->
    <!--CONTENIDO DE LA APLICACION-->
     <div class="margen">
       <div class="row">
       	<div class="col-md-8">
       		<div class="form-group">
       			<label>Título</label>
						<input class="form-control" type="text" readonly value="<?php echo $datos['titulo']; ?>">
       		</div>
       	</div>
				<div class="col-md-4">
       		<div class="form-group">
       			<label>fecha</label>
						<input class="form-control" type="text" readonly value="<?php echo $datos['fecha']; ?>">
       		</div>
       	</div>
				<div class="col-md-12">
       		<div class="form-group">
       			<label>Decripcion</label>
						<div class="contorno"><div class="con">
              <br><br> <?php print_r($datos['mensaje']);?> <br><br>
            </div></div>

       		</div>
       	</div>
				<div class="col-md-12">
					<h5>Usuario: <?php echo $datos['nombre'] . " " . $datos['apellido']; ?></h5>
				</div>
       </div>
     </div>
    <!--FIN CONTENIDO DE LA APLICACION-->

    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
