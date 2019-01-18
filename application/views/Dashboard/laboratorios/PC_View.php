<!DOCTYPE html>
<html>
<head>
	<title>Agrega una PC para laboratorio</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?>
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/app/shopping.css "><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
  <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>
 <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
  <style type="text/css" media="screen">
  	.thead-d{
  		background-color: black;
  		color: white;
  		padding-top: 10px;
  		padding-bottom: 10px;
  		text-align: center;
  	}
  	.thead-A{
  		background-color: skyblue;
  		color: black;
  		padding-top: 10px;
  		padding-bottom: 10px;
  		text-align: center;
  		border-color: black;
  		border: 2px black solid;
  	}
  	.int{
      background-color: #e6f9f5;
      border: 1px solid #96c8be;

  	}
  </style>

 

</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->

     <div id="compra" class="row">
     <form  method="post" action="<?php //echo base_url()?>laboratorio-PC-Success" >

     	      <div class="text-center">
     			<h2>REVISIÓN DE DATOS PARA AGREGAR UNA PC A UN LABORATORIO</h2>
     			<br>
		     </div>
		     		<div class="row">
		     			<div class="col-md-6">
				     		<div class="thead-d">
				     			<h4>Descripción del sistema</h4>
							 </div>
				     		<table class="table">
							  <tbody>
							  	<?php for ($i=0; $i <count($dataElementary['descripcion']) ; $i++): ?>
							    <tr>
							      <td width="200" > <?php echo $dataElementary['descripcion'][$i] ?> </td>
							      <td><input type="text"   name="<?php echo "desk-".$i ?>"  class="form-control int"
							       value="<?php echo $dataPC['descripcion'][$i]  ?>"></td>
							    </tr>
							   <?php endfor; ?>
							  </tbody>
							</table>
				     	</div>



			     	<div class="col-md-6">
			     		<div class="thead-d">
			     			<h4>Placa base</h4>
						 </div>
			     		<table class="table">
						  <tbody>
						  	<?php for ($i=0; $i <count($dataElementary['placa']) ; $i++): ?>
						    <tr >
						      <td width="200" ><?php echo $dataElementary['placa'][$i] ?></td>
						      <td><input type="text" name="<?php echo "placak-".$i ?>" class="form-control int" value="<?php echo $dataPC['placa'][$i] ?>"></td>
						    </tr>
						    <?php endfor; ?>
						  </tbody>
						</table>
			     	</div>
     		   </div>


                <div class="row">
	                	<div class="col-md-6">
				     		<div class="thead-d">
				     			<h4>Adaptador de red</h4>
							 </div>
				     		<table class="table">
							  <tbody>
							  	<?php for ($i=0; $i <count($dataElementary['adaptadores']) ; $i++): ?>
							    <tr >
							      <td width="200" ><?php echo $dataElementary['adaptadores'][$i] ?></td>
							      <td><input type="text" name="<?php echo "adapt-".$i ?>" class="form-control int" value="<?php echo $dataPC['adaptadores'][$i] ?>"></td>
							    </tr>
							    <?php endfor; ?>
							  </tbody>
							</table>
				     	</div>


			        <div class="col-md-6">
			     		<div class="thead-d">
			     			<h4>Adaptador de video</h4>
						 </div>
			     		<table class="table">
						  <tbody>
						    <?php for ($i=0; $i <count($dataElementary['video']) ; $i++): ?>
						    <tr >
						      <td width="200" ><?php echo $dataElementary['video'][$i] ?></td>
						      <td><input type="text" name="<?php echo "videok-".$i ?>" class="form-control int" value="<?php echo $dataPC['video'][$i] ?>"></td>
						    </tr>
						    <?php endfor; ?>
						  </tbody>
						</table>
			     	</div>
			  </div>


               <div class="row">

			     	<div class="col-md-6">
			     		<div class="thead-d">
			     			<h4>Almacenamiento</h4>
						 </div>
			     		<table class="table">
						  <tbody>
						    <?php for ($i=0; $i <count($dataElementary['almacenamiento']) ; $i++): ?>
						    <tr >
						      <td width="200" ><?php echo $dataElementary['almacenamiento'][$i] ?></td>
						      <td><input type="text" name="<?php echo "alma-".$i ?>" class="form-control int" value="<?php echo $dataPC['almacenamiento'][$i] ?>"></td>
						    </tr>
						    <?php endfor; ?>
						  </tbody>
						</table>
			     	</div>

			     	<div class="col-md-6">
			     		<div class="thead-d">
			     			<h4>GENERALIDAD PC</h4>
						 </div>
			     		<table class="table">
						  <tbody>
						    <?php for ($i=0; $i <count($elementosPC['pc']) ; $i++): ?>
						    <tr >
						      <?php if($i == 1 || $i == 3): ?>
									<input hidden type="text" name="<?php echo "gene-".$i ?>"  value="<?php echo $elementosPC['pc'][$i] ?>">
						      <?php else:?>
						      	   <td width="200" ><?php echo $elementosPC['namePC'][$i] ?></td>
									<td><input type="text" name="<?php echo "gene-".$i ?>" name="<?php echo "gene-".$i ?>" class="form-control int" value="<?php echo $elementosPC['pc'][$i] ?>"></td>
						      <?php endif; ?>

						    </tr>
						    <?php endfor; ?>
						    <tr><td style="color: red;" >Codigo PC</td><td> <input type="text" value="<?php echo $codePC ?>" class="form-control int" id="codePC-X" name="codePC-X"></td></tr>
						  </tbody>
						</table>
			     	</div>
               </div>

    

     	<?php if($elementosPC['error'] >= 1): ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
					  <strong>¡¡Atención!!</strong> Hay seriales que ya estan en uso, es posible que uno o más perifericos ya esten registrados, dichos perifericos ya no se registraran.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
			</div>
     	<?php endif; ?>

<!--MENSAJES DE RRORR -->
			<?php if(count($dataElementary['error'])> 0 ): ?>
				<?php for ($i=0; $i <count($dataElementary['error']); $i++):?>
					<?php if($dataElementary['error'][$i] != 1): ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
							  <strong>¡¡Atención!!</strong> <?php echo $dataElementary['error'][$i]  ?>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
					</div>
				<?php endif; ?>
				<?php endfor; ?>
     	<?php endif; ?>
<!--MENSAJES DE RRORR -->



     <input type="text" hidden="" name="cantelementsc" value="<?php echo $elementosPC['cantidadElementos'] ?>">

      <div class="row">
          <div class="col-md-12">
          	 <div class="thead-A">
			   <h4>ELEMENTOS DEL PC</h4>
		     </div>
          </div>

         <?php for ($i=0; $i <count($elementosPC['elementosPC']) ; $i++):?>
          <div class="col-md-3">
			     		<div class="thead-d">
			     			<h4><?php echo $elementosPC['elementosPC'][$i] ?></h4>
						 </div>
			     		<table class="table">
						  <tbody>
						  	<?php for($ww=0; $ww <count($elementosPC['campos']) ; $ww++): ?>
						    <tr>
						    	<td><?php echo $elementosPC['campos'][$ww] ?> <input name="<?php echo "elements-".$i."-".$ww  ?>" type="text" class="form-control int"  value="<?php echo $elementosPC['ArgumentosPC'][$i][$ww] ?>"></td>
						    </tr>
						   <?php endfor; ?>
						  </tbody>
					</table>
			</div>
		<?php endfor; ?>
      </div>
    

                <div class="col-md-12"><br><input  type="submit" id="elex" value="Enviar" class="btn btn-success btn-lg" name=""> </div>
     	</form>
     </div>
     <br>



    <script src=" <?php echo base_url()?>assets/js/app/lab.js "></script>
    <script src=" <?php echo base_url()?>assets/js/app/shopping.js"></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
