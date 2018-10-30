<!DOCTYPE html>
<html>
<head>
	<title>Shopping</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA
  LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
  <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>
  <link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/app/shopping.css ">
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->
    <!--CONTENIDO DE LA APLICACION-->

      <div id="compra" class="contenido">
        <?php require 'application/views/Plantilla/alert_.php'; ?>
          <div class="row">
            <div class="col-md-12">
              <form id="formid" method="post" action="<?php echo base_url()?>shopping-adding">
              <!--CREA UNA NUEVA COMPRA-->
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
                                    <label class="control-label">Tipo de producto</label>
                                    <div v-if="defaultK"  class="form-group">
                                     <select v-model="selected" name="tipo" id="tipo" class="form-control">
                                      <option  selected value="Periferico">Perifericos</option>
                                      <option value="PC">PC completa</option>
                                      <option  value="Servidor">Servidor</option>
                                      <option value="Laptop">Laptop</option>
                                      <option value="Disco duro externo">Disco duro externo</option>
                                     </select>
                                    </div>
																		<div v-else class="form-group">
                                          <input class="form-control" type="text" id="tipo" readonly name="tipo" value="{{selected}}">
																		</div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">proveedor</label>
                                        <input id="proveedor" :readonly="defaultK == false" class="form-control" type="text" name="proveedor"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha autorización</label>
                                        <input id="fechautorizacion" :readonly="defaultK == false"  class="form-control" type="date" name="fechautorizacion"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de compra</label>
                                        <input v-model="fecha_compra" id="fechacompra"  :readonly="defaultK == false" class="form-control" type="date" name="fechacompra"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
	                            <label class="control-label">Detalle del producto</label>
	                            <textarea id="detalle" :readonly="defaultK == false"  class="form-control" name="detalle"  cols="30" rows="6"></textarea>
	                        </div>
                        </div>
                    </div>
                    <br>
                    <!--PARA PC-->
                    <div class="row" id="pc">
                      <div class="col-md-6">
                        <div v-if='selected =="PC" || selected == "Servidor"'>
                           <select id="exampleFormControlSelect2" v-model='seleccionPC' class="form-control" multiple>
                              <option v-for="item in lists" selected value="{{item.keep}}">{{  item.keep}}</option>
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
                      <div class="col-md-6"  v-if='selected =="PC" || selected == "Servidor"'>
                        <label>Ingrese un nuevo elemento</label>
                        <input  :readonly="defaultK == false" class="form-control" type="text" v-model='opcion' v-on:keyup.enter='agregar_opcion' name="" >
                      </div>
                    </div>
                    <!--PARA PC-->
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Cantidad producto</label>
                                <input v-model='cantidadProducto' :readonly="defaultK == false"  class="form-control" type="number" min="0"  id="cantidadproducto" name="cantidadproducto"/>
                             </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="control-label">N° factura</label>
                                <input id="factura" :readonly="defaultK == false" class="form-control" type="text"  name="factura"/>
                             </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Periodo garantia</label>
                                <input id="garantia" :readonly="defaultK == false" class="form-control" type="text"  name="garantia"/>
                             </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                       <div class="col-md-8">
                          <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Total de compra $</label>
                                    <input id="totalcompra"  step="0.01" value="0.00"  class="form-control" type="number"  name="totalcompra"/>
                                 </div>
                             </div>
                             <div class="text-center"><label>{{mensaje}}</label></div>
                             <div v-if="defaultK == true"    class="col-md-4">
                                 <div  class="form-check form-check-inline">
                                      <input v-model="radio" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" checked  value="Nuevo">
                                      <label class="form-check-label" for="inlineRadio1">Nuevo</label>
                                </div>
                                
                             </div>
                             <div v-if="defaultK == true" class="col-md-4">
                                <div class="form-check form-check-inline">
                                      <input v-model="radio" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Nuevo para asignar">
                                      <label class="form-check-label" for="inlineRadio2">Nuevo para asignar</label>
                                </div>
                                <!-- <div class="form-check form-check-inline">
                                      <input v-model="radio" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                      <label class="form-check-label" for="inlineRadio3">nuevo en prestamo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                      <input v-model="radio" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                                      <label class="form-check-label" for="inlineRadio4">nuevo en sustitución</label>
                                </div>-->
                             </div>
														 <div v-if="defaultK == false" class="col-md-8">
															 <div class="form-group">
															  <input type="text" class="form-control" name="op" id="op" value="{{radio}}"> <!--VALOR DEL RADIO BUTTON-->
															 </div>
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
                   <!--INPUTS IMPORTANTES-->
                   <!--INPUT PARA SABER ELEMENTOS QUE SELECCIONO :V-->
                   <div id="dembelecampo">

                   </div>
                   <input type="text" hidden="" name="numeroSelect" id="numeroSelect">
                   <input type="text" hidden="" name="cantidadElementosPC_A" id="cantidadElementosPC_A">
                    <div class="row">
                      <div class="col-md-12 text-right">
                        <button onclick="validacionCompra();" :disabled="defaultK == false" class="btn btn-success" type="button">Validar</button>
                      </div>
                    </div>
                    </div>
              </div>
              <hr>
               <!--FIN CREA UNA NUEVA COMPRA-->


              <!--DESTINOS-->


           <div v-if='radio == "Nuevo para asignar"'> <!--INICIO IF DE OPCION 1 PERIFERICO-->

                <!--FLUJO SI ES UN PERIFERICO-->

                  <?php require "application/views/Dashboard/shopping/destino_Template.php" ?>
                  <script src="<?php echo base_url()?>assets/js/app/destinos_asignar.js"></script>


          </div>



              <!--FIN DESTINO-->



               <!--INICIO DE COMPRA PARA NUEVO-->
                <?php require "application/views/Dashboard/shopping/nuevo_Template.php" ?>
               <!--FIN DE COMPRA PARA NUEVO-->


               <!--INICIO DE COMPRA PARA NUEVO ASIGNADO-->
                <?php require "application/views/Dashboard/shopping/nuevo_asignar_Template.php" ?>
               <!--FIN DE COMPRA PARA NUEVO ASIGNADO -->

          </form>
        </div>
      </div>
   </div>

   <!--FLUJO NUEVO ASIGNAR-->




<!--SCRIPTS PARA LOS DESTINOS Y COMPRA-->
<script src=" <?php echo base_url()?>assets/js/app/shopping.js "></script>

    <!--FIN CONTENIDO DE LA APLICACION-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
