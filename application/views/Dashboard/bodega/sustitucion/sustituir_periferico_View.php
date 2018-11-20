<!DOCTYPE html>
<html>
<head>
	<title>Sustitución de periferico</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

	
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







<form method="post" action="<?php echo base_url()?>Sustitucion_Controller/sustituir_periferico_form">
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
      		<label>Unidad</label>
      		<select onchange="pcchange();" name="unidadS" id="unidadS" class="form-control">
      			<?php for ($i=0; $i <count($unidades) ; $i++):?>
                   <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
      			<?php endfor; ?>
      		</select>
      	</div>
      </div>
      <div class="col-md-3" id="rest">
      		
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
  	 var dato = $('#unidadS').val();
     var pc = 0;
  	 var html = "";
  	 $.ajax({
	     type: 'ajax',
	     method: 'post',
	     url: '<?php echo base_url() ?>Sustitucion_Controller/get_pc',
	     data: {dato: dato},
	     async: false,
	     dataType: 'json',
	     success: function(data){
         if(data.length > 0){ //sentencia si la data tiene datos alv

          $('#rest').append('<div id="contRest"><label>PC</label><select name="selectPC" onchange="perSelect();" class="form-control" id="selectPC"></select></div>');

	      for (var i = 0; i < data.length; i++) {
	      	html += '<option value="'+data[i].identificador+'">'+data[i].identificador+'</option>'
	      }
	      $('#selectPC').append(html);
          pc = 1;


	      }//sentencia si la data tiene datos alv
	      else{ //sentencia si la data no tiene nada :'v mas solo que yo sin ella 

            $('#rest').append('<div id="contRest"><br><span style="color:red;" >No hay PC o Servidores en esta unidad</span></div>')
            $('#peri').remove();
	      }

	     },
	     error: function(){
	         alert("error");
	     }
	   });


             var dato = $('#selectPC').val();

             if(dato == null){
                dato = "1";
             }
              
		  	 var html = "";
		  	 $.ajax({
			     type: 'ajax',
			     method: 'post',
			     url: '<?php echo base_url() ?>Sustitucion_Controller/get_perifericos_PC',
			     data: {dato: dato},
			     async: false,
			     dataType: 'json',
			     success: function(data){
		         if(data.length > 0){ //sentencia si la data tiene datos alv

	              $('#peri').remove();
		          $('#g').append('<div id="peri"><label>Perifericos</label><select onchange="dela()"  class="form-control" id="perichange" name="perichange"></select></div>');

			      for (var i = 0; i < data.length; i++) {
			      	html += '<option value="'+data[i].serial+'">'+data[i].tipo+'</option>'
			      }
			      $('#perichange').append(html);
                   $('#b').append('<div id="bt"><br><button class="btn btn-info" onclick="formu();" type="button">Continuar</button></div>');
                  send();
			      }//sentencia si la data tiene datos alv
			      else{ //sentencia si la data no tiene nada :'v mas solo que yo sin ella 
			      	$('#peri').remove();
			        $('#bt').remove();
		            if(pc == 1){
		            	$('#g').append('<div id="peri"><br><span style="color:red;">No hay perifericos asignados a esta PC</span></div>')
		            }
			      }

			     },
			     error: function(){
			         alert("error");
			     }
			   });
		  	





  </script>



  <script type="text/javascript">



  	  function dela(){
   	 $('#dembele').remove();
   }


  	function pcchange(){
  		 $('#dembele').remove();
          $('#bt').remove();
  		 var dato = $('#unidadS').val();
	  	 var html = "";
	  	 $.ajax({
		     type: 'ajax',
		     method: 'post',
		     url: '<?php echo base_url() ?>Sustitucion_Controller/get_pc',
		     data: {dato: dato},
		     async: false,
		     dataType: 'json',
		     success: function(data){
	         if(data.length > 0){ //sentencia si la data tiene datos alv
           
              $('#contRest').remove();
	          $('#rest').append('<div id="contRest"><label>PC</label><select onchange="perSelect();" class="form-control" id="selectPC" name="selectPC"></select></div>');

		      for (var i = 0; i < data.length; i++) {
		      	html += '<option value="'+data[i].identificador+'">'+data[i].identificador+'</option>'
		      }
		      $('#selectPC').append(html);
		      

               perSelect();
		      }//sentencia si la data tiene datos alv
		      else{ //sentencia si la data no tiene nada :'v mas solo que yo sin ella 
		      	$('#peri').remove();
		      	$('#contRest').remove();
	            $('#rest').append('<div id="contRest"><br><span style="color:red;" >No hay PC o Servidores en esta unidad</span></div>')
		      }

		     },
		     error: function(){
		         alert("error");
		     }
		   });

	  	
	  	}





	 function perSelect(){
            $('#dembele').remove();
	  		var dato = $('#selectPC').val();
		  	 var html = "";
		  	 $.ajax({
			     type: 'ajax',
			     method: 'post',
			     url: '<?php echo base_url() ?>Sustitucion_Controller/get_perifericos_PC',
			     data: {dato: dato},
			     async: false,
			     dataType: 'json',
			     success: function(data){
		         if(data.length > 0){ //sentencia si la data tiene datos alv

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
			        $('#bt').remove();
		            $('#g').append('<div id="peri"><br><span style="color:red;">No hay perifericos asignados a esta PC</span></div>')
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
			$('#exampleModalCenter').modal('hide');
			 htmlSus = '<div id="dembele"><div class="card" style="border: 2px solid #D9D6D6;padding: 15px">'+
  '<div class="card-body">'+
    '<h4 class="card-title">Movimiento</h4>'+
    '<br>'+
    '<div class="row">'+
      '<div class="col-md-2">'+
      	 '<div class="form-group">'+
      	 '<label>Fecha retiro</label>'+
      	 	'<input type="date" class="form-control" name="fechaR">'+
      	 '</div>'+
      	 '<div class="form-group">'+
      	 	'<label>Fecha ingreso</label>'+
      	 	'<input type="date" class="form-control" name="fechaR">'+
      	 '</div>'+
      '</div>'+
      '<div class="col-md-4">'+
      	 '<div class="form-group">'+
      	 	'<label>Nombre del Encargado del Equipo.</label>'+
      	 	'<input type="text" class="form-control" name="fechaR">'+
      	 '</div>'+
      	 '<div class="form-group">'+
      	 	'<label>Nombre de Técnico que reporta el cambio.</label>'+
      	 	'<input type="text" class="form-control" name="fechaR">'+
      	 '</div>'+
      '</div>'+
      '<div class="col-md-6">'+
      	 '<div class="form-group">'+
      	 	'<label>¿Qué cambio sufrio el equipo?</label>'+
      	 	'<textarea rows="5" class="form-control"></textarea>'+
      	 '</div>'+
      '</div>'+
      '<div class="col-md-4">'+
      	 '<div class="form-group">'+
      	 	'<label>Breve descripción porque se hizo el cambio(Daño,obsoleto, etc.)</label>'+
      	 	'<textarea rows="4" class="form-control"></textarea>'+
      	 '</div>'+
      '</div>'+
     '<div class="col-md-4">'+
      	 '<div class="form-group">'+
      	 	'<label>Características del equipo que se retira.</label>'+
      	 	'<textarea rows="4" class="form-control"></textarea>'+
      	 '</div>'+
      '</div>'+
      '<div class="col-md-4">'+
      	 '<div class="form-group">'+
      	 	'<label>Caracteristicas de equipo que queda en función con ese código de inventario.</label>'+
      	 	'<textarea rows="4" class="form-control"></textarea>'+
      	 '</div>'+
      '</div>'+
       '<div class="col-md-12">'+
       	 '<input type="submit" name="Enviar" class="btn btn-info">'+
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