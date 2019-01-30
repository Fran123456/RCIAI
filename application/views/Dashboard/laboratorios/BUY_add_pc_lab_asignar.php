<!DOCTYPE html>
<html>
<head>
  <title>Agrega una PC</title>
    <?php require 'application/views/Plantilla/Bootstrap.php'; ?>
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/app/shopping.css "><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
    <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>

   <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
   <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>




  <style type="text/css">
  .es{
    margin-bottom: 10px;
  }
  .back{
    border: 1px solid red;
  }


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


</head>
<body id="compra">
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->






<form method="post" action="<?php echo base_url()?>laboratorios_Controller/pc_nuevo_add">

<div class="col-md-12">
        <div class="thead-d">
          <h4>Descripción del sistema</h4>
       </div>
        <table class="table">
        <tbody>
          <tr>
            <td width="200">Nombre:</td>
            <td><input type="text"  name="des-0" id="des-nombre" value="" class="form-control int"></td>
            <td width="200">Fabricante:</td>
            <td><input type="text" name="des-1" id="des-fabricante" class="form-control int"></td>
          </tr>
          <tr>
            <td width="200">Sistema operativo:</td>
            <td><input type="text" name="des-2" id="des-op" class="form-control int"></td>
            <td width="200">Nucleo</td>
             <td><select name="des-3" id="des-version" class="form-control int">
              <option selected="" value="64 bits">64 bits</option>
              <option value="32 bits">32 bits</option>
             </select></td>

          </tr>
          <tr>
            <td width="200">Paquete de versión:</td>
             <td><input type="text" name="des-4" id="des-version" class="form-control int"></td>
             <td width="200">Version:</td>
             <td><input type="text" name="des-5" id="des-usuario" class="form-control int"></td>

          </tr>
          <tr>
            <td width="200">Usuario registrado:</td>
             <td><input type="text" name="des-6" id="des-usuario" class="form-control int"></td>
             <td width="200">Memoria física: </td>
             <td><input type="text" name="des-7" id="des-memoriaFisica" class="form-control int" value="4 GB"></td>

          </tr>
          <tr>
            <td width="200">Dominio/ Grupo de trabajo: </td>
             <td><input type="text" name="des-8" id="des-dominio" class="form-control int" value="WORKGROUP"></td>
             <td width="200">Modelo:</td>
             <td><input type="text" name="des-9" id="des-modelo" class="form-control int"></td>

          </tr>
          <tr>
            <td width="200">Número de serie:</td>
             <td><input type="text" name="des-10" id="des-serie" class="form-control int"></td>
             <td width="200">Organización:</td>
             <td><input type="text" name="des-11" id="des-org" class="form-control int"></td>

          </tr>
          <tr>
            <td width="200">Idioma del sistema:</td>
             <td><input type="text" name="des-12" id="des-idioma" class="form-control int" value="Español (México)"></td>
             <td width="200">Zona horaria del sistema:</td>
            <td><input type="text" name="des-13" id="des-zona" class="form-control int" value="(GMT -06:00) Hora estándar, América Central"></td>

          </tr>
          <tr>
             <td width="200">Usuario con sesión abierta:</td>
             <td><input type="text" name="des-14" id="des-sesion" class="form-control int"></td>
             <td width="200">Versión de Direct X:</td>
             <td><input type="text" name="des-15" id="des-zona" class="form-control int" value="12"></td>

          </tr>
          <tr><td width="200">Caja del sistema:</td>
             <td><input type="text" name="des-16" id="des-sesion" class="form-control int" value="Desktop"></td></tr>

        </tbody>
      </table>
      </div>



<div class="col-md-12">
        <div class="thead-d">
          <h4>Placa base</h4>
       </div>
        <table class="table">
        <tbody>
          <tr>
            <td width="200">Procesador:</td>
            <td><input type="text" name="placa-0" id="placa-nombre" class="form-control int"></td>
            <td width="200">Velocidad de reloj (GHZ): </td>
            <td><input type="text" name="placa-1" id="placa-velocidad" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">Fabricante del procesador:</td>
             <td><input type="text" name="placa-2" id="placa-procesador" class="form-control int" value="Intel"></td>
             <td width="200">Etiqueta de la BIOS:</td>
             <td><input type="text" name="placa-3" id="placa-bios" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">Fabricante de la BIOS: </td>
             <td><input type="text" name="placa-4" id="placa-fabriBios" class="form-control int"></td>
             <td width="200">Versión de la BIOS: </td>
             <td><input type="text" name="placa-5" id="placa-versionBios" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">Número de serie de la BIOS:</td>
             <td><input type="text" name="placa-6" id="placa-serieBios" class="form-control int"></td>
             <td width="200">Fecha de instalación de la BIOS:</td>
             <td><input type="date" name="placa-7" id="placa-fechaBios" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">Fabricante de la placa base:</td>
             <td><input type="text" name="placa-8" id="placa-modeloPlacaBase" class="form-control int"></td>
             <td width="200">Modelo de placa base:</td>
             <td><input type="text" name="placa-9" id="placa-modeloPlacaBase" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">Versión de placa base:</td>
             <td><input type="text" name="placa-10" id="des-versionPlacaBase" class="form-control int"></td>
             <td width="200">Marca de RAM:</td>
             <td><input type="text" name="placa-11" class="form-control int"></td>

          </tr>
          <tr>
            <td width="200">Ranura de memoria 0:</td>
             <td><textarea name="placa-12" class="form-control int"></textarea></td>
             <td width="200">Ranura de sistema 0:</td>
             <td><textarea name="placa-13" class="form-control int"></textarea></td>

          </tr>
          <tr>
            <td width="200">Ranura de sistema 1:</td>
             <td><textarea name="placa-14" class="form-control int"></textarea></td>
             <td width="200">Ranura de sistema 2:</td>
             <td><textarea name="placa-15" class="form-control int"></textarea></td>

          </tr>
           <tr>
            <td width="200">Ranura de sistema 3:</td>
             <td><textarea name="placa-16" class="form-control int"></textarea></td>
             <td width="200">Ranura de sistema 4:</td>
             <td><textarea name="placa-17" class="form-control int"></textarea></td>
          </tr>
        </tbody>
      </table>
      </div>





      <div class="col-md-12">
        <div class="thead-d">
          <h4>Adaptador de red</h4>
       </div>
        <table class="table">
        <tbody>
          <tr>
            <td width="200">Adaptador de red 1:</td>
            <td><input type="text" name="adaptadores-0" id="adaptadores-nombre&quot;" class="form-control int"></td>
            <td width="200">Tipo de adaptador: </td>
            <td><input type="text" name="adaptadores-1" id="adaptadores-velocidad&quot;" class="form-control int" value="Ethernet"></td>
          </tr>
          <tr>
            <td width="200">Dirección IP:</td>
            <td><input type="text" name="adaptadores-2" id="adaptadores-op" class="form-control int"></td>
            <td width="200">Subred IP:</td>
            <td><input type="text" name="adaptadores-3" id="adaptadores-version" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">Gateway IP predeterminado:</td>
             <td><input type="text" name="adaptadores-4" id="adaptadores-procesador" class="form-control int"></td>
             <td width="200">Servidor primario WINS:</td>
             <td><input type="text" name="adaptadores-5" id="adaptadores-bios" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">Servidor DNS:</td>
             <td><input type="text" name="adaptadores-6" id="adaptadores-fabriBios" class="form-control int"></td>
             <td width="200">Servidor DHCP:</td>
             <td><input type="text" name="adaptadores-7" id="adaptadores-versionBios" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">Dirección MAC: </td>
             <td><input type="text" name="adaptadores-8" id="adaptadores-serieBios" class="form-control int"></td>
          </tr>
        </tbody>
      </table>
      </div>



      <div class="col-md-12">
        <div class="thead-d">
          <h4>Almacenamiento</h4>
       </div>
        <table class="table">
        <tbody>
          <tr>
            <td width="200">disco fisico 1:</td>
            <td><input type="text" name="almacenamiento-0" id="almacenamiento-adaptador" class="form-control int"></td>
            <td width="200">Capacidad: </td>
            <td><input type="text" name="almacenamiento-1" id="almacenamiento-adaptadorRam" class="form-control int"></td>
          </tr>
          <tr>
            <td width="200">Disco logico/descripcion:</td>
            <td><input type="text" name="almacenamiento-2" id="almacenamiento-op" class="form-control int"></td>
            <td width="200">Sistema de archivos:</td>
            <td><input type="text" name="almacenamiento-3" id="almacenamiento-version" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">Tamaño:</td>
             <td><input type="text" name="almacenamiento-4" id="almacenamiento-resolucion" class="form-control int"></td>
             <td width="200">Espacio libre:</td>
             <td><input type="text" name="almacenamiento-5" id="almacenamiento-velocidad" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">DVD 1:</td>
             <td><input type="text" name="almacenamiento-6" id="almacenamiento-resolucion" class="form-control int"></td>
             <td width="200">Letra de unidad: </td>
             <td><input type="text" name="almacenamiento-7" id="almacenamiento-velocidad" class="form-control int"></td>
          </tr>
        </tbody>
      </table>
      </div>


      <div class="col-md-12">
        <div class="thead-d">
          <h4>Adaptador de video</h4>
       </div>
        <table class="table">
        <tbody>
          <tr>
            <td width="200">Adaptador de video:</td>
            <td><input type="text" name="video-0" id="video-adaptador" class="form-control int"></td>
            <td width="200">Ram adaptador: </td>
            <td><input type="text" name="video-1" id="video-adaptadorRam" class="form-control int"></td>
          </tr>
          <tr>
            <td width="200">Tipo DAC:</td>
            <td><input type="text" name="video-2" id="video-op" class="form-control int"></td>
            <td width="200">Monitor de PC 1 S/N:</td>
            <td><input type="text" name="video-3" id="placa-version" class="form-control int"></td>
          </tr>
          <tr>
             <td width="200">resolucion de video:</td>
             <td><input type="text" name="video-4" id="video-resolucion" class="form-control int"></td>
             <td width="200">Velocidad de regeneracion:</td>
             <td><input type="text" name="video-5" id="video-velocidad" class="form-control int"></td>
          </tr>
        </tbody>
      </table>
      </div>






<div class="col-md-12">
              <div class="thead-d">
                <h4>AGREGA ELEMENTOS DEL PC</h4>
            </div>
            <br>
            <br>
                  <!--PARA PC-->
                  <div ><div  class="row" id="pc">
                          <div class="col-md-8">
                               <select size="14" id="exampleFormControlSelect2" name="select-A" v-model='seleccionPC' class="form-control" multiple>
                                  <option v-for="item in lists" selected value="{{item.keep}}">{{  item.keep}}</option>
                                  <option value="AUDIFONOS" >AUDIFONOS</option>
                                  <option value="PARLANTES">PARLANTES</option>
                                  <option value="MEMORIA-SD">MEMORIA-SD</option>
                                  <option value="MICROFONO">MICROFONO</option>
                                  <option value="OTRO">OTRO</option>
                                </select>
                                <br>
                          </div>
                          <div class="col-md-4">

                            <p>Aquí selecciona los elementos que componen a la PC</p>
                          </div>
                        </div>
                    </div>
                    <!--PARA PC-->
           </div>



<!-- PANEL DEFAULT -->
                   <div v-for="item in lists_pc"  class="col-md-12">
                      <div class="panel">
                      <div class="panel-heading">
                        <h3 class="panel-title">PC</h3>
                        <div class="right">
                          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        </div>
                      </div>
                      <div class="panel-body">
                          <div class="row">
                            <div class="col-md-2">
                              <label>Codigo</label>
                             <select name="codigoPC-1"  v-model="op" class="form-control int">
                              <option selected="" value="LAB1">LAB1</option>
                              <option value="LAB2">LAB2</option>
                              <option value="LAB3">LAB3</option>
                              <option value="LAB4">LAB4</option>
                              <option value="LAB5">LAB5</option>
                              <option value="HW">HW</option>
                              <option value="RED">RED</option>
                            </select>
                            </div>
                            <div class="col-md-1">
                              <label>N°</label>
                              <input type="number"  value="1" min="1"  v-model="num" class="form-control"  name="">
                            </div>
                            <div id="diverror" class="col-md-3">
                              <label id="errorlabel">Laboratorio</label>

                              <input type="text" id="codex" class="form-control"  readonly=""  value="{{op}}-PC{{num}}" name="lab">

                            </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Origen</label>
                                    <input type="text" readonly class="form-control" value="Sin origen" name="OrigenPC-1">
                                    <input hidden type="text" value="38" name="OrigenPC_Falso-1">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Destino</label>
                                    <input type="text" readonly class="form-control" value="laboratorios" name="destinoPC-1">
                                    <input hidden type="text" value="37" name="destino-0">
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Fecha ingreso</label>
                                    <input type="date" required="" class="form-control" value="" name="ingreso-1">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <br>
                                    <button  type="button" onclick="definitiva();" class="btn btn-danger">Validar</button>
                                </div>
                           </div>
                        <br>
                         <!--REFERENTE A CADA COMPONENTE DEL PC-->
                         <!-- Button trigger modal -->
             <!--IMPORTANTE-->
                         <input v-for='(item2, index) in seleccionPC' type="hidden" id="{{item2}}-ele" name="{{item2}}-ele" value="{{index}}">

                         <input type="hidden"  id="cantidadTotal" value="{{seleccionPC.length}}" name="cantidadTotal">
                         <!--IMPORTANTE-->
                         <div class="row">
                           <div style="width: 12%;" v-for='(item2, index) in seleccionPC' class="col-md-2">


                               <button  type="button" id="w{{item.id - 1}}-{{item2}}-{{index}}" class="btn btn-primary space text-center {{item.id - 1}}-{{item2}}-{{index}}"   data-toggle="modal" data-target="#{{item.id - 1}}-{{item2}}-{{index}}">
                                  {{index}}
                                 </button>
                           </div>
                         </div>

                       <!-- Modal -->
                        <div v-for='(item3, index) in seleccionPC' class="modal fade" id="{{item.id - 1}}-{{item3}}-{{index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{index}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <!--IMPORTANTE-->
                                <input hidden="" type="text" name="A-{{item3}}" value="{{index}}">
                                <!--IMPORTANTE-->
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Serial</label>
                                      <input  type="text" id="serial-{{item.id - 1}}-{{item3}}-{{index}}" required class="form-control"  name="serial-{{item3}}-{{index}}">
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Marca</label>
                                      <input type="text"  class="form-control"  name="marca-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Capacidad</label>
                                      <input type="text"  class="form-control"  name="capacidad-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Tipo de periferico</label>
                                      <input type="text" value="{{index}}" readonly="" class="form-control"  name="tipo-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Tipo</label>
                                      <input type="text" id="nombre-{{item.id - 1}}-{{item3}}-{{index}}" value=""  class="form-control"  name="nombre-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Velocidad</label>
                                      <input type="text" class="form-control"  name="velocidad-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Estado</label>
                                      <input type="text" value="En uso" class="form-control"  name="estado-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">

                                <button type="button" id="{{item.id - 1}}-{{item3}}-{{index}}" onclick="color(this);" class="btn btn-primary">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                        <!--REFERENTE A CADA COMPONENTE DEL PC-->
                      </div>
                    </div>
                  </div>
                  <!-- END PANEL DEFAULT -->











   <button id="en" disabled="" type="submit" class="btn btn-success">Guardar</button>
</form>









     <script src=" <?php echo base_url()?>assets/js/app/lab.js "></script>
    <script src=" <?php echo base_url()?>assets/js/app/shopping.js"></script>

    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->







<script type="text/javascript">

  desactivar();
   var html = "";
   var datos;
   function seriales(){
    $.ajax({
       type: 'ajax',
       method: 'post',
       url: '<?php echo base_url() ?>laboratorios_Controller/serial__todo',
       async: false,
       dataType: 'json',
       success: function(data){
         datos = data;

       },
       error: function(){
           alert("error");
       }

    });
    return datos;
  }


    function codigo(){
    var dato1 = $('#codex').val();
    var dato = dato1;
    var valores;
    $.ajax({
       type: 'ajax',
       method: 'post',
       url: '<?php echo base_url() ?>laboratorios_Controller/codigos_lab',
       data: {dato: dato},
       async: false,
       dataType: 'json',
       success: function(data){
          valores = data;
       },
       error: function(){
           alert("error");
       }

    });
    return valores;
  }

  function definitiva(){
    var co = $('#codex').val();
     $('#codex3').val(co);
    var contadorFinal = 0;
    var controlador = 0;
    var stringVacio="";
    var stringVacioSe = "";
    var stringIguales ="";
    var contadorIguales = 0;
     seriales1 = seriales(); //seriales de bodega
    codigo1 = codigo();
    var cantidad = $('#cantidadTotal').val();
    perifericos = new Array(cantidad);
    serialesPropias = new Array(cantidad);

        for (var i = 0; i < cantidad; i++) {
           perifericos[i] = $('#'+i+'-ele').val();
           serialesPropias[i] = $('#serial-0-'+i+'-'+perifericos[i]).val();
        }

        for (var r = 0; r < cantidad; r++) {
           if(serialesPropias[r] ==""){
            stringVacio += perifericos[r] + ", ";
             controlador++;
           }
        }


        let filterConut =0;
        for (var i = 0; i<serialesPropias.length-1; i++)
        {
           for (var j =i+1; j<serialesPropias.length; j++)
           {
              if (serialesPropias[i] == serialesPropias[j]){
                 filterConut++;
              }
           }
        }
        

        if(filterConut == 0){

        if(controlador > 0){
          swal({
                  type: 'warning',
                  title: 'Debe llenar todos los campos de serial: ' +stringVacio,
            });


              if(codigo1.length > 0){
                  $("#codex").addClass("back");
                  $("#error").remove();
                  $("#errorlabel").append("<span id='error' style='color:red;'> - Ya utilizado</span>");
               }else{
                  $("#error").remove();
                  $("#codex").removeClass("back");
                  $('#codex3').val(co);
               }


        }else{

               for (var w = 0; w < seriales1.length; w++) {
                 for (var q = 0; q < cantidad; q++) {
                   if(serialesPropias[q] == seriales1[w].serial){
                      stringVacioSe += perifericos[q] + ", ";
                      contadorFinal++;
                     }
                 }

               }

               if(codigo1.length > 0){
                  $("#codex").addClass("back");
                  $("#error").remove();
                  $("#errorlabel").append("<span id='error' style='color:red;'> - Ya utilizado</span>");

               }else{
                  $("#error").remove();
                  $("#codex").removeClass("back");

                              if(contadorFinal > 0){
                                    swal({
                                      type: 'warning',
                                      title: 'Las seriales de los campos: ' +stringVacioSe + 'Ya estan en uso. <br><br>Si continua se reasignaran',
                                     });
                                    activar();
                              }
                               else{
                                swal({
                                      type: 'success',
                                      title: 'Seriales validadas',
                                     });
                                activar();
                               }

               }

        }
      }
      else{
                  swal({
                      type: 'warning',
                      title: 'Revisa las seriales no pueden ser iguales para dos o mas elementos',
                     });
      }

  }

  function activar(){
       $('#en').attr("disabled", false);
  }

  function desactivar(){
    $('#en').attr("disabled", true);
  }
</script>






















</body>
</html>
