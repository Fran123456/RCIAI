<!DOCTYPE html>
<html>
<head>
	<title>Sustitución de periferico</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
  <style type="text/css">
  	.form-control2 {
	height: 34px;
	padding: 6px 12px;
	font-size: 14px;
	color: #555;
	background-color: #fff;
	border: 1px solid #ccc;
	border-radius: 4px;
	
}
  </style>
	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>La sustitución que realizara es la siguiente:</h3>
        <div id="susti">
        	
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="send();" class="btn btn-primary">Acepto, contituar</button>
      </div>
    </div>
  </div>
</div>





<h2>Sustitución para area administrativa de perifericos con codigo</h2>

<form method="post" action="<?php echo base_url()?>Sustitucion_Controller/sustituir_periferico_form_code">
    <!--DATOS OCULTOS IMPORTANTES ALV :'v -->
	<input type="hidden" value="<?php echo $infoPeriferico[0]['serial'] ?>" id="xx" name="serialNueva">
    <input type="hidden" value="<?php echo $infoPeriferico[0]['tipo'] ?>" id="xxx" name="tipoNueva">
<div class="card" style="border: 2px solid #D9D6D6;padding: 15px">
  <div class="card-body">
    <h4 class="card-title">Información del periferico</h4>
    
	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Serial</th>
	      <th scope="col">Tipo periferico</th>
	      <th scope="col">Marca</th>
	      <th scope="col">Estado</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <th scope="row">1</th>
	      <td><?php echo $infoPeriferico[0]['serial'] ?></td>
	      <td><?php echo $infoPeriferico[0]['tipo'] ?></td>
	      <td><?php echo $infoPeriferico[0]['marca'] ?></td>
	      <td><?php echo $infoPeriferico[0]['estatus'] ?></td>
	    </tr>
	  </tbody>
	</table>

  </div>
</div>
<br>


<div class="card" style="border: 2px solid #D9D6D6;padding: 15px">
  <div class="card-body">
    <h4 class="card-title">Sustitución</h4>
    <div class="row">
      <div class="col-md-3">
      	<div class="form-group">
      		<label>Codigo PC</label>
      		<input id="cod" value="" type="text" class="form-control" name="cod">
      	    <button type="button" onclick="perSelect();">Verificar</button>
      	</div>
      </div>
      
      <div class="col-md-3" id="g">

      </div>
      <div class="col-md-3" id="b">
      	 
      </div>	
    </div>
  </div>
</div>

<br>

<div id="fin">
	<div id="dembele"></div>

</div>
 
    <!--FIN CONTENIDO DE LA APLICACION-->
</form>






  <script type="text/javascript">


  	function dela(){
   	 $('#dembele').remove();
   }


  	
	 function perSelect(){
           
            $('#bt').remove();
	  		var dato = $('#cod').val();
		  	 var html = "";
		  	 $.ajax({
			     type: 'ajax',
			     method: 'post',
			     url: '<?php echo base_url() ?>Sustitucion_Controller/get_perifericos_PC2',
			     data: {dato: dato},
			     async: false,
			     dataType: 'json',
			     success: function(data){
		         if(data.length > 0){ //sentencia si la data tiene datos alv
                   console.log(data);
	              $('#peri').remove();
		          $('#g').append('<div id="peri"><label>Perifericos</label><select onchange="dela()" class="form-control" id="perichange" name="perichange"></select></div>');

			      for (var i = 0; i < data.length; i++) {
			      	html += '<option value="'+data[i].serial+'">'+data[i].tipo+'</option>'
			      }
			      $('#perichange').append(html);
                    $('#b').append('<div id="bt"><br><button class="btn btn-info" onclick="formu();" type="button">Continuar</button></div>');


			      }//sentencia si la data tiene datos alv
			      else{ //sentencia si la data no tiene nada :'v mas solo que yo sin ella 
                    $('#peri').remove();
		            $('#g').append('<div id="peri"><br><span style="color:red;">No se ha encontrado ningun PC con dicho codigo</span></div>')
			      }

			     },
			     error: function(){
			         alert("error");
			     }
			   });
		  	}


		function formu(){
			$('#ss').remove();
           $('#exampleModalCenter').modal('show');
           var s = "<h4 id='ss'>El periferico: " + $('select[name="perichange"] option:selected').text().toLowerCase() + " con serial: " + $('#perichange').val() + " sera sustituido por el periferico " + $('#xxx').val().toLowerCase()+ " con serial: " + $("#xx").val();+"</h4>"
           $('#susti').append(s);

          
		}

		function send(){
			$('#dembele').remove();
			$('#exampleModalCenter').modal('hide');
			 htmlSus = '<div id="dembele"><div class="card" style="border: 2px solid #D9D6D6;padding: 15px">'+
  '<div class="card-body">'+
    '<h4 class="card-title">Movimiento</h4>'+
    '<br>'+
    '<div class="row">'+
      '<div class="col-md-2">'+
      	 '<div class="form-group">'+
      	 '<label>Fecha retiro</label>'+
      	 	'<input type="date" required class="form-control" name="fechaR">'+
      	 '</div>'+
      	 '<div class="form-group">'+
      	 	'<label>Fecha cambio</label>'+
      	 	'<input type="date" required class="form-control" name="fechaI">'+
      	 '</div>'+
      '</div>'+
      '<div class="col-md-4">'+
      	 '<div class="form-group">'+
      	 	'<label>Nombre del Encargado del Equipo.</label>'+
      	 	'<input type="text" required name="encA" class="form-control" name="fechaR">'+
      	 '</div>'+
      	 '<div class="form-group">'+
      	 	'<label>Nombre de Técnico que reporta el cambio.</label>'+
      	 	'<input type="text" name="tec" class="form-control" name="fechaR">'+
      	 '</div>'+
      '</div>'+
      '<div class="col-md-6">'+
      	 '<div class="form-group">'+
      	 	'<label>¿Qué cambio sufrio el equipo?</label>'+
      	 	'<textarea rows="5" required  name="cambioA" class="form-control"></textarea>'+
      	 '</div>'+
      '</div>'+
      '<div class="col-md-4">'+
      	 '<div class="form-group">'+
      	 	'<label>Breve descripción porque se hizo el cambio(Daño,obsoleto, etc.)</label>'+
      	 	'<textarea rows="4" required name="descripcionA" class="form-control"></textarea>'+
      	 '</div>'+
      '</div>'+
     '<div class="col-md-4">'+
      	 '<div class="form-group">'+
      	 	'<label>Características del equipo que se retira.</label>'+
      	 	'<textarea rows="4" name="desRetirado" class="form-control"></textarea>'+
      	 '</div>'+
      '</div>'+
      '<div class="col-md-4">'+
      	 '<div class="form-group">'+
      	 	'<label>Caracteristicas de equipo que queda en función con ese código de inventario.</label>'+
      	 	'<textarea rows="4" name="desNew"  class="form-control"></textarea>'+
      	 '</div>'+
      '</div>'+
      	'<div class="col-md-4">'+
			'<label>Estado del periferico sustituido: </label>'+
			'<select class="form-control2" name="estado"><option value="Disponible">Disponible</option><option value="Desechado">Desechado</option></select>'+
		'</div>'+
       '<div class="col-md-4">'+
       	 '<input type="submit" value="Enviar" class="btn btn-info">'+
       '</div>'+
    '</div>'+
  '</div>'+
'</div></div>';

            $('#fin').append(htmlSus);
		}
  </script>



    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>