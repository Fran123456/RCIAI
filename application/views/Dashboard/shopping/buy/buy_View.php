<!DOCTYPE html>
<html>
<head>
	<title>Agrega una PC para laboratorio</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?>
<!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
 

  <style type="text/css" media="screen">
  	.int{
  		color: red;
  		background-color: #c7ede5;
  	}
    .int2{
       
        background-color: #f2eceb;
        border: 1px solid #d1d0d0;
    }
  </style>

</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->
    
     <form action="<?php echo base_url() ?>addbuy" method="post" id="form-compra">
    	<div class="panel" > <!--INICIO DE COMPONENTE VUE-->
                <div class="panel-heading">
                  <div class="text-center "><h3>Crea una nueva compra</h3></div>
                  <div class="right">
                  <button   type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                  </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                          <label>Codigo compra</label>
                                          <input  type="text" readonly=""  name="code" class="form-control int2" value="<?php echo $code ?>">
                                     </div>
                                     
                                 </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">proveedor</label>
                                        <input required  class="form-control int2" type="text" name="proveedor"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha autorización</label>
                                        <input required   class="form-control int2" type="date" name="fechautorizacion"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de compra</label>
                                        <input required  class="form-control int2" type="date" name="fechacompra"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
	                            <label class="control-label">Detalle del producto</label>
	                            <textarea  class="form-control int2" name="detalle"  cols="30" rows="6"></textarea>
	                        </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Cantidad producto</label>
                                <input required   class="form-control int2" type="number" min="0"  id="cantidadproducto" name="cantidadproducto"/>
                             </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="control-label">N° factura</label>
                                <input required  class="form-control int2" type="text"  name="factura"/>
                             </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Periodo garantia</label>
                                <input required  class="form-control int2" type="text"  name="garantia"/>
                             </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Total de compra ($)</label>
                                <input required   class="form-control int2" type="text"  name="total"/>
                             </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                       <div class="col-md-8">
                          <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Observaciones</label>
                                        <textarea id="observaciones"  class="form-control int2" name="observaciones" rows="3"></textarea>
                                     </div>
                                </div>
                             </div>
                       </div><div class="col-md-4">
                          <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Tipo</label>
                                        <textarea id="observaciones"  class="form-control int2" name="tipoauto" rows="3"></textarea>
                                     </div>
                                </div>
                             </div>
                       </div>
                         <div class="col-md-4">
                         	<div class="form-group">
                         		<!--<label class="control-label">Tipo de producto</label>-->
                                          <input type="hidden"  class="form-control int2" name="tipo" value="">
                         	</div>
                         </div>
                    </div>
					<button type="submit" class="btn btn-success">Agregar</button>
                    </div>
              </div>
     </form>
    <!--CONTENIDO DE LA APLICACION-->

    

    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
