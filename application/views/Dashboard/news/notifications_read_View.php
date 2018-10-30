<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	<style type="text/css">
		.margen{
			margin-left: 20px;
			margin-right: 20px;
			margin-top: 20px;
		}
		.margenUsuario{
			margin-left: 20px;
			margin-right: 20px;
		}
	</style>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
    <!--
        <div class="row">
        	<div class="alert alert-success" style="display: none;"></div>

			<div class="col-md-6 margenUsuario">

                <div class="">
					<!- Button trigger modal ->
					<button id="btnAdd" type="button" class="btn btn-success" data-toggle="modal" data-target="#userModal">
						Nuevo
					</button>
                </div>
			</div>
        </div>
	-->
	<div class="">
		<div class="margen">


			<table class="table table-dark">
				<thead class="thead-dark">
			    	<tr>
				      <th style="width: 20px" scope="col">#</th>
				      <th style="width: 250px" scope="col">Título de anuncio</th>
							<th style="width: 60px">usuario</th>
				      <th style="width: 60px">fecha</th>
				      <th style="width: 60px">leer</th>
			    	</tr>
			  	</thead>
			  	<tbody id='showdata'>

			  	</tbody>
			</table>
		</div>
	</div>



<!-------------------------------------------------------------------------------------------------------->


<!-------------------------------------------------------------------------------------------------------->
				<script>
					$(function(){
						showNotificaciones();


						/*funciones
						mostramos los usuarios usando ajax*/
						function showNotificaciones(){
							$.ajax({
								type: 'ajax',
								url: '<?php echo base_url() ?>news_Controller/showMessageAjax',
								async: false,
								dataType: 'json',
								success: function(data){
									var html = '';
									var i;

									for(i=0;i<data.length;i++){
										html +='<tr>'+
						      						'<th scope="row">'+(i+1)+ '</th>'+
						      						'<td>'+data[i].titulo  + '</td>'+
															'<td>'+data[i].nombre + " " + data[i].apellido + '</td>'+
						      						'<td>'+data[i].fecha + '</td>'+

						      						'<td><a href="<?php echo base_url() ?>notifications/'+data[i].id+'" class="btn btn-info item-edit"><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
						    					'</tr>';
									}//fin del for
									$('#showdata').html(html);
								},
								error: function(){
									alert('NO se pudo obtener los datos');
								}
							});
						}
					});
				</script>


    <!--FIN CONTENIDO DE LA APLICACION-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
