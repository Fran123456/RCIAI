<!DOCTYPE html>
<html>
<head>
	<title>Selección</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?>
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/app/shopping.css "><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
  <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>

  <style type="text/css" media="screen">
  	.thead-d{
  		background-color: black;
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
  	$(document).ready(function(){
        $('#exampleModal').modal('show');
  	});


  	var html ="";
    $.ajax({
       dataType: 'JSON',
       url: '<?php echo base_url()?>BUY_elements_Controller/unidad',
       success: function(data){
          for (var i = 0; i <data.length; i++) {
          	html+='<option value="'+data[i].id_unidad+'">'+data[i].unidad+'</option>';
          }
          $('#uni').append(html);
       },
       error: function(){
          alert('error');
       }
    });




  </script>



</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->


<!--ESTE ELEMENTO PROPORCIONA LA VALIDACION SI UNA COMPRA EXISTE Y SI HAY AUN LUGAR PARA AGREGAR-->
<?php if(!$this->session->flashdata('validar')): ?>





	<!-- Modal -->
	<form action="<?php echo base_url()?>AddBodega_Controller/validate_buy" method="post">
	<div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">VALIDAR COMPRA</h5>
	      </div>
	      <div class="modal-body">

	        	<div class="row">

              <div class="col-md-4">
                <div class="form-group" >
                  <label>Unidad para asignar</label>
                    <input class="form-control" readonly type="text"  name="unixxxx"  value="bodega de informatica">
										<input type="hidden" name="uni" id="uni" value="1">
                </div>
              </div>
	        		<div class="col-md-4">
	        			<div class="form-group" id="sel">
	        				<label>Tipo de elemento</label>
                                 <select  name="tipo" id="tipo" class="form-control">
                                      <option  selected value="Periferico">Perifericos y más</option>
                                      <!--<option value="PC">PC completa</option>
                                      <option  value="Servidor">Servidor</option>
                                      <option value="Laptop">Laptop</option>-->
                                 </select>
	        			</div>
	        		</div>

	        	</div>
	      </div>
	      <div class="modal-footer">
	        <a class="btn btn-secondary" href="<?php echo base_url()?>add-buy" >Salir</a>
	        <button type="submit" class="btn btn-primary">Validar</button>
	      </div>
	    </div>
	  </div>
	</div>
	</form>
<?php endif; ?>
<!--ESTE ELEMENTO PROPORCIONA LA VALIDACION SI UNA COMPRA EXISTE Y SI HAY AUN LUGAR PARA AGREGAR-->

<script type="text/javascript">
   select = "";
   $('#uni').change(function() {
    var dato = $('#uni').val();
    if(dato == 37){
      select = $('#tipo').remove();
    //  var html = '<input type="text" name="tipo" id="tipo"  value="PC" readonly class="form-control">';
     var html = '<select  class="form-control" name="tipo" id="tipo"><option value="PC">PC</option><option value="otro">UPS, Acces Point, Web Cam, Impresores</option></select>';

       $("#sel").append(html);

    }else{

      if(select != ""){
        $('#tipo').remove();
        $("#sel").append(select);
      }

    }
  });

</script>

    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
