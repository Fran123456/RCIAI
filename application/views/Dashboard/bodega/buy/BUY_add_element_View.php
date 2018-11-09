<!DOCTYPE html>
<html>
<head>
	<title>Agrega una elemento</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?>
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/app/shopping.css "><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
 <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>

   <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>




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
<body id="compra">
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->


     	<?php
	     	if($datos['tipo'] == 'Periferico' && $datos['unidad'][0]['id_unidad'] == '1'){
              require 'BUY_add_periferico_new.php';
        }

        if($datos['tipo'] == 'Laptop' && $datos['unidad'][0]['id_unidad'] == '1'){
              require 'BUY_add_laptop_new.php';

        }
				

        if($datos['tipo'] == 'PC' && $datos['unidad'][0]['id_unidad'] == '1'){
              require 'BUY_add_pc_new.php';
         }

        if($datos['tipo'] == 'Servidor' && $datos['unidad'][0]['id_unidad'] == '1'){
              require 'BUY_add_pc_new.php';
         }




     	?>


    <!--CONTENIDO DE LA APLICACION-->

    <script src=" <?php echo base_url()?>assets/js/app/lab.js "></script>
    <script src=" <?php echo base_url()?>assets/js/app/shopping.js"></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
