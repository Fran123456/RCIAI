<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
    <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>
	<style type="text/css" media="screen">
		.es{
			padding-right: 40px;
			padding-left: 40px;
			padding-top: 20px;padding-bottom: 20px;
			border: 1px solid gray; 

		}
	</style>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
    <form id="compra" action="<?php echo base_url()?>add-periferico" method="post" class="es" accept-charset="utf-8">
       <!--PARA PC-->
                    
                    <div class="row">
                    	<div class="text-center">
                    		<h3>Agregar un periferico para luego asignar</h3>
                    		<hr>
                    	</div>
                    	
                        <div class="col-md-3">
                           <div class="form-group">
                           	 <label>Serial</label>
                           	 <input type="text" required class="form-control" name="bo-0">
                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="form-group">
                           	 <label>Nombre</label>
                           	 <input type="text" required value="{{seleccionPC}}" class="form-control" name="bo-1">
                           </div>
                       </div>	

                       <div class="col-md-3">
                           <div class="form-group">
                           	 <label>Marca</label>
                           	 <input type="text"   class="form-control" name="bo-2">
                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="form-group">
                           	 <label>Capacidad</label>
                           	 <input type="text"   class="form-control" name="bo-3">
                           </div>
                       </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div >
                           <label>Seleccione el tipo de periferico</label>
                           <select name="bo-4" id="exampleFormControlSelect2" v-model='seleccionPC' class="form-control">
                              <option v-for="item in lists" selected value="{{item.keep}}">{{item.keep}}</option>
                              <option value="AUDIFONOS" >AUDIFONOS</option>
                              <option value="IMPRESORES-MATRICIALES">IMPRESORES MATRICIALES</option>
                              <option value="IMPRESORES-MULTIFUNCIONALES">IMPRESORES MULTIFUNCIONALES</option>
                              <option value="IMPRESOR-DESJEKT">IMPRESOR DESJEKT</option>
                              <option value="SCANNER">SCANNER</option>
                              <option value="PARLANTES">PARLANTES</option>
                              <option value="LECTOR-PARA-MEMORIA-SD">LECTOR PARA MEMORIA SD</option>
                              <option value="UPS">UPS</option>
                              <option value="WEBCAN">WEBCAN</option>
                              <option value="LECTOR-PARA-MEMORIA-SD">LECTOR PARA MEMORIA SD</option>
                              <option value="MEMORIA-SD">MEMORIA-SD</option>
                              <option value="PROYECTOR">PROYECTOR</option>
                              <option value="FAX">FAX</option>
                              <option value="MICROFONO">MICROFONO</option>
                            </select>
                            <br>
                        </div>
                      </div>            
                      <input  v-model="length_PC" type="text" hidden=""  value="{{seleccionPC.length}}" name="length_elementosPC">
                      <div class="col-md-6">
                        <label>Ingrese un nuevo periferico si no esta en la lista</label>
                        <input  :readonly="defaultK == false" class="form-control" type="text" v-model='opcion' v-on:keyup.enter='agregar_opcion' name="" >
                      </div>
                    </div>
                    <!--PARA PC-->

                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                           	 <label>Velocidad</label>
                           	 <input type="text" class="form-control" name="bo-5">
                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="form-group">
                           	 <label>estatus</label>
                           	 <input type="text" value="nuevo" class="form-control" name="bo-6">
                           </div>
                       </div>	

                       <div class="col-md-3">
                           <div class="form-group">
                           	 <label>Fecha ingreso</label>
                           	 <input type="date" required="" class="form-control" name="bo-7">
                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="form-group">
                           	 <label>Origen</label>
                           	 <input type="text" readonly="" class="form-control" value="nuevo">
                           	 <input type="text" hidden="" value="4" name="bo-8">
                           </div>
                       </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                           	 <label>Fecha salida</label>
                           	 <input type="date" readonly  class="form-control" name="bo-9">
                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="form-group">
                           	 <label>Destino</label>
                           	 <input type="text" readonly="" class="form-control" value="Bodega informatica">
                           	 <input type="text" hidden="" value="1" name="bo-10">
                           </div>
                       </div>	
                    </div>
                    <br>
                    <button class="btn btn-info" type="submit">Agregar</button>

    </form>
    <!--FIN CONTENIDO DE LA APLICACION-->

	 <!--SCRIPTS PARA LOS DESTINOS Y COMPRA-->
	<script src=" <?php echo base_url()?>assets/js/app/shopping.js "></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>