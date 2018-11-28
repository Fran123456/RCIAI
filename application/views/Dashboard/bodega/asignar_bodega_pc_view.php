<!--Vista para agregar perifericos que estan en bodega y no estan asignados a ninguna pc o servidor en bodega-->
<!DOCTYPE html>
<html>
<head>
	<title>Asignación de pc</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
  <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>
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

	 	if($('#vay').val() == 37){
         var cod =   $('#cod1').val()+"-PC"+$('#cod2').val();
         var url = 'bodega_Controller/get_codigosLAB';

	 	}
	 	if($('#vay').val() != 37){
	 		var cod =   $('#a').val() + $('#b').val() + $('#c').val();
	 		var url = 'bodega_Controller/get_codigos';
	 	}

      $('#d').val(cod);
     
	  var dato1 = cod;
	  var dato = dato1;


if($('#b').val() != ""){
	  $.ajax({
	     type: 'ajax',
	     method: 'post',
	     url: '<?php echo base_url() ?>'+url,
	     data: {dato: dato},
	     async: false,
	     dataType: 'json',
	     success: function(data){
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

	}else{
              swal({
				  type: 'warning',
				  title: 'El campo codigo no puede estar vacio',
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




	function select(){

		$.ajax({
         type: 'ajax',
	     method: 'post',
	     url: '<?php echo base_url() ?>bodega_Controller/unidadesajax',
	     dataType: 'json',
	     success: function(data){
            console.log(data);
            hrml ="";
            for (var i = 0; i < data.length; i++) {
            	 html = html + '<option value="'+data[i].id_unidad+'" >'+data[i].unidad+'</option>';

            }
            $('#vay').append(html);
	     },
	     error: function(){

	     }
		});
	}

	select();


	function cambioc(){
	   var cambio =	$('#vay').val();
	   if(cambio == 37){
         $('#delete').remove();
         var htmls ='<div id="delete"><div class="col-md-2">'+
                            '<label>Codigo</label>'+
                             '<select id="cod1"  name="cod1" class="form-control int">'+
                              '<option selected="" value="LAB1">LAB1</option>'+
                              '<option value="LAB2">LAB2</option>'+
                              '<option value="LAB3">LAB3</option>'+
                              '<option value="LAB4">LAB4</option>'+
                              '<option value="LAB5">LAB5</option>'+
                              '<option value="HW">HW</option>'+
                              '<option value="RED">RED</option>'+
                            '</select>'+
                            '</div>'+
                         '<div class="col-md-1">'+
                              '<label>N°</label>'+
                              '<input id="cod2" type="number" value="1" min="1" class="form-control" name="cod2">'+
                            '</div>'+
                           '</div>';
            $('#ele').append(htmls);
            $('#centinela').val('lab');


            $('#groupencargado').remove();

	   }

	   if(cambio != 37){

	   	$('#delete').remove();
	   	var html5t = 	'<div id="delete">'+
	       		'<div class="col-md-1 ">'+
           	    '<div id="cont" class="form-group">'+
	       	 	  '<label></label>'+
	       	 	   '<input readonly="" value="PC" id="a" type="text" class="form-control"  >'+
	       	    '</div>'+
               '</div>'+
               '<div class="col-md-2">'+
           	    '<div id="cont" class="form-group">'+
	       	 	  '<label>Codigo PC</label>'+
	       	 	   '<input id="b" min="0"  type="number" class="form-control"  >'+
	       	    '</div>'+
               '</div>'+
               '<div class="col-md-1 ">'+
           	    '<div id="cont" class="form-group">'+
	       	 	 ' <label></label>'+
	       	 	   '<input id="c" value="USAM" readonly="" type="text" class="form-control">'+
	       	    '</div>'+
               '</div>'+
	       	'</div>';
	       	 $('#ele').append(html5t);
	       	 $('#centinela').val('admin');


             $('#groupencargado').remove();
	       	 $('#divencargado').append('<div id="groupencargado" class="form-group"><label>Encargado:</label><input id="asi" type="text" class="form-control" name="enc" ></div>');
	   }
	}

	</script>
</head>
<body id="compra">
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
    	<input type="hidden" name="pcanterior" id="pcid" value="<?php echo $idpc ?>">
    	
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
     			<h4>Información general de PC</h4>
			 </div>
     		<table class="table">
			  <tbody>
			    <tr >
			      <td width="200" >Sistema operativo:</td>
			      <td><input type="text" value="<?php echo $info['descripcionSistema'][0]['sistema_operativo'] ?>"  class="form-control int" ></td>
			      <td width="200">Nucleo:</td>
			      <td><input class="form-control int" value="<?php echo $info['descripcionSistema'][0]['nucleo'] ?>" ></td>
			    </tr>
			    <tr >
			      <td width="200" >Procesador:</td>
			      <td><input type="text" value="<?php echo $info['placa_base'][0]['procesador'] ?>"   class="form-control int" ></td>
			      <td width="200">Memoria física GB:</td>
			      <td><input type="text" value="<?php echo  $info['descripcionSistema'][0]['memoria_fisica'] . ' GB' ?>" class="form-control int"></td>
			    </tr>
			    <tr >
			      <td width="200" >Velocidad de reloj:</td>
			      <td><input type="text" value="<?php echo $info['placa_base'][0]['velocidad_reloj'] ?>"  class="form-control int" ></td>
			      <td width="200">Capacidad disco duro:</td>
			      <td><input type="text" value="<?php echo  $info['almacenamiento'][0]['capacidad'] ?>" class="form-control int"></td>
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
	       	 	<select id="vay" onchange="cambioc();" class="form-control" name="unidad">
	       	 		
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
	       <div id="divencargado" class="col-md-4">
	       	 <div id="groupencargado" class="form-group">
	       	 	<label>Encargado:</label>
	       	 	<input id="asi" type="text" class="form-control" name="enc" >
	       	 </div>
	       </div>
	       <div id="ele">
	       	<div id="delete">
	       		<div class="col-md-1 ">
           	    <div id="cont" class="form-group">
	       	 	  <label></label>
	       	 	   <input readonly="" value="PC" id="a" type="text" class="form-control"  >
	       	    </div>
               </div>
               <div class="col-md-2">
           	    <div id="cont" class="form-group">
	       	 	  <label>Codigo PC</label>
	       	 	   <input id="b" min="0"  type="number" class="form-control"  >
	       	    </div>
               </div>
               <div class="col-md-1 ">
           	    <div id="cont" class="form-group">
	       	 	  <label></label>
	       	 	   <input id="c" value="USAM" readonly="" type="text" class="form-control">
	       	    </div>
               </div>
	       	</div>
	       	   
	       </div>
           <input id="d" type="hidden"  name="codigopc">
           <input id="centinela" type="hidden" value="admin" name="centinela">
      	 
      	  <div class="row">
      	  	<div class="col-md-12">
      	  		<button style="margin-left: 20px;" type="button" class="btn btn-danger" onclick="Obtener_pc_ID();">Validar codigo</button>
      	  	</div>
      	  </div>
	       
	    </div>
	    

<br>
<div class="row border">
	       <div class="text-center">
				<label><u>Movimiento - sustitución</u></label>
			</div>
			<br>
			<div class="col-md-4">
				<div class="form-group">
				<!--	<label>¿Qué cambio sufrio el equipo?</label>-->
				<label>¿Porque se asigno el equipo?</label>
				    <textarea name="cambio" class="form-control" required></textarea>
					
				</div>
				<div class="form-group">
					<!--<label> Caracteristicas de equipo que queda en función con ese código de inventario</label>-->
					<label>Caracteristicas de equipo asignado</label>
					<textarea name="desequipo" class="form-control" ></textarea>
					
				</div>
			</div>
			<div class="col-md-4">
				<label>Breve descripción porque se hizo la asignación</label>
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