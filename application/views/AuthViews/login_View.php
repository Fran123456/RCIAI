<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	<script src="<?php echo base_url() ?>assets/js/vue.js"></script> <!--INTEGRANDO VUE JS-->
    <script src="<?php echo base_url() ?>assets/js/vue-resource.js" type="text/javascript"></script>



	<style type="text/css">
		.space{
            padding-top: 30px;
		}
		.auth-box .right {
			    float: right;
			    width: 58%;
			    height: 100%;
			    position: relative;
			    /*background-image: url("assets/img/usamback.jpg");	*/
			    background-repeat: no-repeat;
			    background-size: cover;
			}
			.auth-box .right .overlay {
			    position: absolute;
			    top: 0;
			    display: block;
			    width: 100%;
			    height: 100%;
			    background: rgba(99, 190, 160, 0.22);
			}
			.auth-box .content {
			    display: inline-block;
			    vertical-align: middle;
			    width: 90%;
			    vertical-align: middle;
			}

	</style>
</head>
<body>
    <!--CONTENIDO DE LA APLICACION-->
 <br>
 <br>

      <!-- WRAPPER -->
	<div id="wrapper space">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content" id="validatorContainer" v-cloak>
						<div class="header">

						<?php if(isset($error)): ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								  <?php  echo $error ?>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
							</div>
						 <?php endif; ?>


						 <?php if(isset($success)): ?>
							<div class="alert alert-success alert-dismissible" role="alert">
								  <?php  echo $success ?>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
							</div>
						 <?php endif; ?>

								<p class="lead">Accede</p>
							</div>
							<form action="<?php echo base_url()?>login_Controller/login" method="post"  class="form-auth-small">

	                         <div class="form-group">
	                            <label for="email" class="control-label">Usuario</label>
	                            <input required class="form-control" type="text" name="user"/>

	                          </div>

	                          <div class="form-group">
	                            <label for="password" class="control-label" >Contraseña</label>
	                            <input required type="password" class="form-control" name="password">
	                         </div>

						       <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresa</button>
							</form>
						</div>
					</div>
					<div  class="right" style="background-image: url('<?php echo base_url(). "assets/img/usamback.jpg"?>')";>
						<div class="overlay" ></div>
						<div class="content text">
							<!--<h1 class="heading">SISTEMA DE INVENTARIO</h1>-->

						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
    <!--FIN CONTENIDO DE LA APLICACION-->


</body>




</html>
