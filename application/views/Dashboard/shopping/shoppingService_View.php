<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

	<style>
    .contenido{
        margin-top: 20px;
        margin-left: 50px;
        margin-right: 50px;
    }
    .margentitulo{
        margin-bottom: 40px;
    }
    hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #c9d0dc;
        }

    .hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #bdc4d0;
        }
        .panel {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -moz-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    -webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    box-shadow: 0.5px 2px 2px 4px #bdc4d0;
    background-color: #fff;
    margin-bottom: 30px;
}

.form-control {
    -moz-box-shadow: 0px 1px 2px 0 rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0px 1px 2px 0 rgba(0, 0, 0, 0.1);
    box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.1);
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    border-color: #b5bac1;
    background-color: #f1f3f5;
}

.space{
 margin-left: 10px;
 margin-right: 10px;
}

/*@media all and (min-width:768px)*/
.modal-dialog {
    width: 900px;
    margin: 30px auto;
}

select[multiple], select[size] {
    height: 160px;
}
    </style>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
    <form action="<?php echo base_url()?>service-adding" method="post" accept-charset="utf-8">
     <div class="">
     	<div class="text-center">
     		<h3>Agrega un servicio</h3>
     		<hr>
     	</div>
     	<div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    	<label class="control-label">Tipo de producto</label>
                                     <input type="text" required class="form-control" readonly value="servicio" name="tipoq">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">proveedor</label>
                                        <input required  class="form-control" type="text" name="proveedor"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha autorización</label>
                                        <input  required class="form-control" type="date" name="fechautorizacion"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de adquisición</label>
                                        <input  required  class="form-control" type="date" name="fechacompra"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
	                            <label class="control-label">Detalle del servicio</label>
	                            <textarea id="detalle"  class="form-control" name="detalle"  cols="30" rows="6"></textarea>
	                        </div>
                        </div>
        </div>
        <div class="row">
                       <div class="col-md-8">
                          <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Total de compra</label>
                                    <input  required  class="form-control" type="text"  name="totalcompra"/>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">N° factura</label>
                                    <input required  class="form-control" type="text"  name="factura"/>
                                 </div>
                             </div>
                             <div class="col-md-4">
                             	<div class="form-group">
                             		<label>Destino</label>
                             		<select name="destino" class="form-control">
                             	   <?php foreach ($unidades as $value):?>
                             		<option value="<?php echo $value->id_unidad ?>"><?php echo $value->unidad ?></option>
                             	   <?php endforeach; ?>
                             	    </select>
                             	</div>
                             </div>
                             <div class="col-md-6">
						            <button class="btn btn-info"  type="submit">Agregar</button>
						      </div>  
                          </div>
                       </div>
                         <div class="col-md-4">
                             <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Observaciones</label>
                                        <textarea id="observaciones"  class="form-control" name="observaciones" rows="3"></textarea>
                                     </div>
                                </div>
                             </div>
                         </div>
          </div>
     </div> 
     <hr>                 
     </form>
    <!--FIN CONTENIDO DE LA APLICACION-->


    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>