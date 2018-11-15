<!--Vista para agregar perifericos que estan en bodega y no estan asignados a ninguna pc o servidor en bodega-->
<!DOCTYPE html>
<html>
<head>
	<title>Asignación de pc</title>
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
	.thead-d{
  		background-color: #31404a;
  		color: white;
  		padding-top: 10px; 
  		padding-bottom: 10px;
  		text-align: center;
  	}
  	.int{
      background-color: #e6f9f5;
      border: 1px solid #96c8be;

  	}
    </style>

<script>
	let html = "";
	var controlador = 0;
	 function Obtener_pc_ID(){
	  var dato1 = $('#codigopc').val();
	  var dato = dato1;
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
    <form method="post" action="<?php echo base_url()?>move-pc">
    	<input type="text" hidden name="" id="pcid" value="<?php echo $idpc ?>">
	<div class="">
		<div class="text-center">
			<h3>Asignar PC</h3>
		</div>

		<div class="row border">
			<input type="text" hidden="" value="<?php echo count($elementos)?>" name="n_seriales">
				<table class="table" style="color: black">
				  <thead style="background-color: #31404a">
				    <tr style="color: white">
				      <th scope="col">#</th>
				      <th scope="col">serial</th>
				      <th scope="col">tipo de periferico</th>
				      <th scope="col">tipo</th>
				      <th scope="col">fecha ingreso</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php for ($i=0; $i <count($elementos); $i++) { ?>
				    <tr>
				      <th scope="row"><?php echo ($i+1) ?></th>
				      <td> <input type="text" class="int form-control" readonly="" name="<?php echo "s-".$i ?>" value="<?php echo $elementos[$i]['serial']?>"> </td>
				      <td><?php echo $elementos[$i]['tipo'] ?></td>
				      <td><?php echo $elementos[$i]['nombre'] ?></td>
				      
				      <td><?php echo $elementos[$i]['fecha_ingreso'] ?></td>
				    </tr>
				    <?php } ?>

				  </tbody>
				</table>
		</div>
		<br>
		<?php 
		  $deter = null;
            for ($i=0; $i <count($elementos) ; $i++) { 
            	if($elementos[$i]['tipo'] == "MONITOR"){
                   $deter = $i;
            	}

            }


		?>

		<div class="row">
			<div class="col-md-12">
     		<div class="thead-d">
     			<h4>Descripción del sistema</h4>
			 </div>
     		<table class="table">
			  <tbody>
			    <tr >
			      <td width="200" >Nombre del equipo:</td>
			      <td><input type="text"  name="des-0" id="des-nombre" class="form-control int" ></td>
			      <td width="200">Fabricante:</td>
			      <td><input type="text" name="des-1" id="des-fabricante" class="form-control int"></td>
			    </tr>
			    <tr >
			      <td width="200" >Sistema operativo:</td>
			      <td><input type="text" name="des-2" id="des-nombre" class="form-control int" ></td>
			      <td width="200">Nucleo:</td>
			      <td><select class="form-control int" name="des-3" id="des-fabricante"><option value="64 bits">64 bits</option><option value="32 bits">32 bits</option></select></td>
			    </tr>
			    <tr >
			      <td width="200" >Usuario registrado:</td>
			      <td><input type="text"  name="des-4" id="des-nombre" class="form-control int" ></td>
			      <td width="200">Memoria física GB:</td>
			      <td><input type="number" min="0" step="0.1" name="des-5"  id="des-fabricante" class="form-control int"></td>
			    </tr>
			    <tr >
			      <td width="200" >Número de serie:</td>
			      <td><input type="text" name="des-6" id="des-nombre" class="form-control int" ></td>
			    </tr>
			  </tbody>
			</table>
     	</div>
		</div>

		<div class="row">
			<div class="col-md-12">
     		<div class="thead-d">
     			<h4>Hardware, adaptadores y almacenamiento</h4>
			 </div>
     		<table class="table">
			  <tbody>
			    <tr >
			      <td width="200" >Procesador:</td>
			      <td><input type="text"  name="o-0" id="des-nombre" class="form-control int" ></td>
			      <td width="200">Velocidad de reloj (GHZ):</td>
			      <td><input type="text" name="o-1" id="des-fabricante" class="form-control int"></td>
			    </tr>
			    <tr >
			      <td width="200" >Fabricante procesador:</td>
			      <td><input type="text"  name="o-2" id="des-nombre" class="form-control int" ></td>
			      <td width="200">Modelo motherboard:</td>
			      <td><input type="text" name="o-3" id="des-fabricante" class="form-control int"></td>
			    </tr>
			    <tr >
			      <td width="200" >Marca RAM:</td>
			      <td><input type="text"   name="o-4"  id="des-nombre" class="form-control int" ></td>
			      <td width="200">IP:</td>
			      <td><input type="text" name="o-5" id="des-fabricante" class="form-control int"></td>
			    </tr>
			    <tr >
			      <td width="200" >Tarjetas extra:</td>
			      <td><input type="text"  name="o-6" id="des-nombre" class="form-control int" ></td>
			      <td width="200" >Marca monitor:</td>
			      <td><input type="text"  name="o-7" value="<?php echo $elementos[$deter]['marca'] ?>" id="des-nombre" class="form-control int" ></td>
			    </tr>
			    <tr >
			      <td width="200" >Tipo monitor:</td>
			      <td><input type="text" value="<?php echo $elementos[$deter]['nombre'] ?>" name="o-8" id="des-nombre" class="form-control int" ></td>
			      <td width="200" >Modelo monitor:</td>
			      <td><input type="text"   name="o-9" id="des-nombre" class="form-control int" ></td>
			    </tr>
			    <tr >
			      <td width="200" >Disco fisico:</td>
			      <td><input type="text"  name="o-10" id="des-nombre" class="form-control int" ></td>
			      <td width="200" >Capacidad disco duro:</td>
			      <td><input type="text"  name="o-11" id="des-nombre" class="form-control int" ></td>
			    </tr>
			    <tr >
			      <td width="200" >Marca disco:</td>
			      <td><input type="text"  name="o-12" id="des-nombre" class="form-control int" ></td>
			      <td width="200" >dvd:</td>
			      <td><input type="text"  name="o-13" id="des-nombre" class="form-control int" ></td>
			    </tr>
			  </tbody>
			</table>
     	</div>
		</div>

		

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
           <div class="col-md-4">
           	 <div id="cont" class="form-group">
	       	 	<label>Codigo PC</label>
	       	 	<input id="codigopc" type="text" class="form-control"  name="codigopc">
	       	 </div>
           </div>

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
   

    <script src=" <?php echo base_url()?>assets/js/app/lab.js "></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/bodega/bodega.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>