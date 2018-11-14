<!DOCTYPE html>
<html>
<head>
	<title>Compra</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?>
<!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
  <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
    
 

  <style type="text/css" media="screen">
  	.int{
  		color: red;
  		background-color: #c7ede5;
  	}
  </style>

</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->
    
     <form  method="post" id="form-compra">

        <?php if($this->session->flashdata('item')):  ?>
        <script type="text/javascript">
          swal({
           type: 'success',
           title: 'COMPRA REALIZADA CORRECTAMENTE',
           });
        </script>
        <?php endif; ?>

    	<div class="panel" > <!--INICIO DE COMPONENTE VUE-->
                <div class="panel-heading">
                  <div class="text-center "><h3>COMPRA</h3></div>
                  <div class="right">
                  <button  type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                  </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                     	 <label class="control-label">Tipo de producto</label>
                                     	  <input  readonly type="text" class="form-control" name="tipo" value="<?php echo $data[0]['tipo'] ?>">
                                     </div>
                                 </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">proveedor</label>
                                        <input  readonly value="<?php echo $data[0]['proveedor'] ?>" class="form-control" type="text" name="proveedor"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha autorización</label>
                                        <input readonly=""  value="<?php echo $data[0]['fecha_autorizacion']?>" class="form-control" type="text" name="fechautorizacion"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de compra</label>
                                        <input  class="form-control" readonly="" value="<?php echo $data[0]['fecha_compra']?>" type="text" name="fechacompra"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
	                            <label class="control-label">Detalle del producto</label>
	                            <textarea  class="form-control"  name="detalle" readonly="" cols="30" rows="6"><?php echo $data[0]['detalle']?></textarea>
	                        </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Cantidad producto</label>
                                <input value="<?php echo $data[0]['cantidad']?>"class="form-control" readonly type="number" min="0"  id="cantidadproducto" name="cantidadproducto"/>
                             </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="control-label">N° factura</label>
                                <input value="<?php echo $data[0]['n_factura']?>"  class="form-control" readonly="" type="text"  name="factura"/>
                             </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Periodo garantia</label>
                                <input value="<?php echo $data[0]['garantia']?>"  class="form-control" readonly="" type="text"  name="garantia"/>
                             </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Total de compra ($)</label>
                                <input value="$ <?php echo $data[0]['total']?>" class="form-control" readonly="" type="text"  name="total"/>
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
                                        <textarea id="observaciones"  class="form-control" name="observaciones" rows="3"><?php echo $data[0]['observaciones']?></textarea>
                                     </div>
                                </div>
                             </div>
                       </div>
                         <div class="col-md-4">
                         	<div class="form-group">
                         		<label>Codigo compra</label>
                                <input required  type="text" name="code" class="form-control int" value="<?php echo $ida ?>">
                         	</div>
                         </div>
                    </div>
					<a href="<?php echo base_url().'add-element-buy'?>" class="btn btn-success">Agregar elementos a la compra</a>
                    </div>
              </div>
     </form>
    <!--CONTENIDO DE LA APLICACION-->
    

    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
