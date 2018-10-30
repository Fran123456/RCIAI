/* VARIABLES GLOBALES */
var next = 0; //HACE EL TRABAJO DE UN CONTADOR
var  contador = 0; //TRABAJO DE UN CONTADOR
var x = 0; //TRABAJO DE UN ACUMULADOR
var cantidadDestinos = 0; //TRABAJO DE CAPTURAR LOS DESTINOS
var cantidadProductoTotal= $('#cantidadproducto').val(); //CAPTURAMOS LA CANTIDAD DE PRODUCTOS TOTALES
var contadorCantidad = 0; //CAPTURAMOS LA CANTIDAD DE PRODUCTO QUE VA AUN DESTINO
var tipo = ""; //CAPTURALOS EL TIPO
var html = ""; //VARIABLE QUE CAPTURA CODIGO HTML
var foo; //CAPTURA LOS ELEMENTOS DEL PC QUE HAN SIDO SELECCIONADOS
var datosPeriferidos = "";

tipo = $('#tipo').val(); //CAPTURAMOS EL TIPO
       $('#tipoSelectA').val(tipo); //asignamos el tipo


//VARIABLES PARA PERIFERICO ESPECIFICO
var unidadDete = null;
var cantidadDete = null;
var htmlPeriferico = null;


function listo() //FUNCION SI LA COMPRA HA SIDO VERIFICADA
{
   cantidadProductoTotal= $('#cantidadproducto').val(); //CAMPTURAMOS LA CANTIDAD DE PRODUCTOS
   var centinela = document.getElementById("clicks").innerHTML; //CAPTURAMOS LA CANTIDAD DE UNIDADES DIVIDIDAS
   $('#destinosCreados').val(centinela);

   if(centinela >= 1) //SI CENTINELA >=1 ENTONCES HAY UNA UNIDAD ASIGNADA Y HABILITAREMOS EL SIGUIENTE PASO
   {
      for (var i = 1; i <=next ; i++) {
       var nameCantidadx = 'cantidadUnidad'+i;
        contadorCantidad+= parseInt($('#'+nameCantidadx).val()); //AQUI VALIDAREMOS SI LA CANTIDAD DE UNIDADES ASIGNADAS CON LA CANTIDAD DE PRODUCTOS COINCIDEN CON EL TOTAL DE PRODUCTOS
      }
      if(contadorCantidad == cantidadProductoTotal){ //SI LA CANTIDAD DE PRODUCTOS ES IGUAL A LA SUMATORIA

       document.getElementById("a").disabled = true;
       document.getElementById("d").disabled = true;
       document.getElementById('listoYa').disabled = true;
       document.getElementById('a').disabled = false
       seleccionTipo();//mandamos a llamar a EL METODO QUE DETERMINAR QUE DEBEMOS MOSTRAR
       contadorCantidad = 0;


      }
      else{ //SI LA CANTIDAD DE PRODUCTOS NO ES IGUAL AL TOTAL ENTONCES VALIDAMOS QUE DEBE SERLO.
        if(isNaN(contadorCantidad)){
          contadorCantidad = 0;
        }
       $('#modal-body').html('<h4>Las cantidad de producto no es igual a la sumatoria en la distribución<br><br> Suma de la distribución: '+
       contadorCantidad + '<br>Cantidad total de productos: '+ cantidadProductoTotal);
       $('#myModal2').modal('show');
       contadorCantidad = 0;
      }
   }
   else
   {
     $('#myModal').modal('show');
   }
}


function Obtener_pc_ID(dato1){
  let html = null;
  var dato = dato1;
  $.ajax({
     type: 'ajax',
     method: 'post',
     url: 'shopping_Controller/showCodePC',
     data: {dato: dato},
     async: false,
     dataType: 'json',
     success: function(data){
       console.log(Object.values(data));
       //html = data;
       for(i=0;i<data.length;i++){
          html +="<option>"+data[i].identificador+"</option>";
       }
       html+="<option>ninguna</option>"
     },
     error: function(){
         alert("error");
     }

  });
  return html;
}



function Agregar(){
     document.getElementById("listoYa").disabled = false;
     contador++;
     $.ajax({ //TRAEMOS LAS UNIDADES POR MEDIO DE AJAX
             type: 'ajax',
             url: 'shopping_Controller/showUnidadesAjax',
             async: false,
             dataType: 'json',
             success: function(data)
             {
               var html = ''; //variable donde almacenaremos los inputs
               var i;

               for(i=0;i<data.length;i++){
                 html +='<option value="'+data[i].unidad+'" >'+data[i].unidad+'</option>';
                }
                   next++; //aumento de la variable next
                   var nameCantidad = 'cantidadUnidad'+next;
                   campo = '<div class="col-md-6 col-sm-6"><div class="form-group"><label>Unidad</label><select required class="form-control"  id="unidaddestino'+next+'" name="unidaddestino'+next+'">'+html+'</select></div></div>'
                    +'<div class="col-md-6 col-ms-6"><div class="form-group"><label>Cantidad</label><input type="number" required class="form-control" id="'+nameCantidad+'" min="1"  name="'+nameCantidad+'"></div></div><br>';

                   $("#campos").append(campo); //ASIGNAMOS

                           document.getElementById("d").disabled = false;
                           //llevamos la cuenta de los destinos creados
                           x++;
                           if (x == 1) {
                               document.getElementById("clicks").innerHTML = x;
                           }
                           else
                           {
                               document.getElementById("clicks").innerHTML = x;
                           }

              },
             error: function(){
               alert('NO se pudo obtener los datos');
             }
   });
}


function eliminar(){ //ELIMINAMOS CAMPOS
 var element  = document.getElementById("campos");
   while (element.firstChild) {
  element.removeChild(element.firstChild);
 }
 eliminarCampos();
 document.getElementById("del").disabled = true;
 document.getElementById("ag").disabled = true;
 document.getElementById("a").disabled = false;

  document.getElementById("clicks").innerHTML = 0;
  x = 0;
  next = 0

}



function capturarDestinos(){
  destinosCreados = $('#destinosCreados').val(); //cantidad
  var arraydestinos = [];
  var arraycantidades = [];
  for (var i = 0; i < destinosCreados; i++) {
    arraydestinos.push($('#unidaddestino'+(i+1)).val());
    arraycantidades.push($('#cantidadUnidad'+(i+1)).val());
  }
  var final = [ arraydestinos, arraycantidades  ];
  return final;
}




function seleccionTipo(){
//FUNCION QUE NOS DETERMINA QUE DEBEMOS MOSTRAR SI SELECCIONO UNA PC O UN SERVIDOR O UN PERIFERICO
 // var valor = $('input:text=[name=tipo]').val();

  var valor = $('#tipo').val();
  var valorRadioButton = $('#op').val();


  /*
    #option1 = nuevo
    #option2 = nuevo para asignar
    #option3 = nuevo en prestamo
    #option4 = nuevo en sustution
  */

  if(valor == 'PC' ){
     AgregarCamposPC('PC', valorRadioButton);
  }

  if(valor == 'Periferico'){

      AgregarCamposPerifericos();
  }

  if(valor == 'Disco duro externo'){
      AgregarCamposDiscoDuroExterno();
  }

  if(valor == 'Servidor'){
     AgregarCamposPC('Servidor', valorRadioButton);
  }

  if(valor == 'Laptop'){
    AgregarCamposLaptop('Laptop', valorRadioButton);
  }

}



//SI HA SELECCIONADO 'PC COMPLETA' O 'SERVIDOR'
function AgregarCamposPC(tipox, seleccionRadioButton){

   var arrayDestino = capturarDestinos();
   destinosCreados = $('#destinosCreados').val(); //cantidad

           /* for (var nextinput = 0; nextinput  <$('#cantidadproducto').val() ; nextinput ++) {
              data = '<label>'+arrayDestino[0][0]+'</label><label>'+arrayDestino[1][0]+'</label><br><br>';

              //se muestran los datos
              $("#camposTodos").append(data);

            }*/
            var fechaA = $('#fechacompra').val();
            var contaN = 0;
            var button = "";
            var otro = "";
            var xcon = 0;
            var conta = 0; //levara los contadores de los id de cada elemento
            datosPeriferidos =  $('#exampleFormControlSelect2').val(); //capturamos las opciones que tomo para la PC (monitor, mouse teclado etc,)
            var d = datosPeriferidos.length;
            $('#cantidadElementosPC_A').val(d);

            var ibp  = "";
            for (var rowx = 0; rowx < datosPeriferidos.length; rowx++) {
               ibp+="<input name='A-"+rowx+"' hidden value='"+datosPeriferidos[rowx]+"'>";
            }
            $("#dembelecampo").append(ibp);




            for (var i = 0;i < $('#cantidadproducto').val() ; i++)
            {
              for (var u = 1; u <= arrayDestino[1][0].length ; u++)
              {

                for (var w = 0; w <arrayDestino[1][i] ; w++)
                {

                   //este elemento sirve para administrar los elementos de una PC completa
                   for(var co = 0; co < datosPeriferidos.length ; co++)
                   {

                      //aux = 'PC'+u+'-'+co+'-'+datosPeriferidos[co];
                     // button += '<button type="button">'+xcon+'-'+co+'-'+datosPeriferidos[co]+'     </button>';


                    aux = 'PC'+contaN+'-'+co+'-'+datosPeriferidos[co];
                    button += '<button    type="button" class="space btn btn-primary '+ aux +' " data-toggle="modal" data-target="#'+aux+'">'+
                    datosPeriferidos[co]+'</button>';

                     otro += '<div class="modal fade bd-example-modal-lg" id="'+aux+'" tabindex="-1" role="dialog" '+
                    'aria-labelledby="exampleModalLabel"aria-hidden="true">'+
                            '<div class="modal-dialog" role="document">'+
                              '<div class="modal-content">'+
                                '<div class="modal-header">'+
                                  '<h5 class="modal-title" id="exampleModalLabel">'+ datosPeriferidos[co] +'</h5>'+
                                  '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                   ' <span aria-hidden="true">&times;</span>'+
                                  '</button>'+
                                '</div>'+
                                '<div class="modal-body">'+

                                               '<div class="row">'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Serial</label>'+
                                                    '<input required  id="serial-'+(contaN)+'-'+co+'-'+datosPeriferidos[co]+'" name="serial-'+(contaN+1)+'-'+co+'-'+datosPeriferidos[co]+'"  class="form-control val" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Nombre</label>'+
                                                    '<input value="'+datosPeriferidos[co]+'" required id="nombre-'+(contaN)+'-'+co+'-'+datosPeriferidos[co]+'" name="nombre-'+(contaN+1)+'-'+co+'-'+datosPeriferidos[co]+'"  class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Marca</label>'+
                                                    '<input  name="marca-'+(contaN+1)+'-'+co+'-'+datosPeriferidos[co]+'"  class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Capacidad</label>'+
                                                    '<input name="capacidad-'+(contaN+1)+'-'+co+'-'+datosPeriferidos[co]+'" class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Tipo</label>'+
                                                    '<input name="tipo-'+(contaN+1)+'-'+co+'-'+datosPeriferidos[co]+'" class="form-control" value="'+datosPeriferidos[co]+'" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Velocidad</label>'+
                                                    '<input name="velocidad-'+(contaN+1)+'-'+co+'-'+datosPeriferidos[co]+'" class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                    '<label>Estado</label>'+
                                                    '<input name="estado-'+(contaN+1)+'-'+co+'-'+datosPeriferidos[co]+'" class="form-control" name="" type="text">'+
                                                  '</div>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                  '<div class="form-group">'+
                                                  '</div>'+
                                                '</div>'+
                                               '</div>'+



                                '</div>'+
                                '<div class="modal-footer">'+
                                  '<button onclick="color2(this);"  id="'+contaN+'-'+co+'-'+datosPeriferidos[co]+'" type="button" class="btn btn-success"   >Agregar</button>'+'<button    type="button" class="btn btn-danger"   data-dismiss="modal">Salir</button>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>';
                   }


                     contaN++;
                    // var h = Obtener_pc_ID(arrayDestino[0][i]);
                     var codigo = null;

                     if(arrayDestino[0][i] == "Proyecto USAID"){
                        codigo = "USAID";
                     }
                     else if(arrayDestino[1][i] == "Otros proyectos"){
                       codigo = "";
                     }
                     else
                     {
                       codigo = "USAM";
                     }

                     var tipo = $("#tipo").val();
                     var codTipo = null;
                     if(tipo == "Servidor"){
                       codTipo = "SVR";
                     }
                     else if(tipo == "PC"){
                       codTipo = "PC";
                     }

                   // data = '<label>'+arrayDestino[0][i]+'</label>--'+arrayDestino[1][i]+'-- serial-'+conta+'<br>';
                    data =  '<div class="panel">'+
                              '<div class="panel-heading">'+
                               '<h3 class="panel-title">'+$('#tipo').val()+' # '+contaN+'</h3>'+
                                '<div class="right">'+
                                  '<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>'+
                                '</div>'+
                              '</div>'+
                             '<div class="panel-body">'+
                                '<div class="row">'+

                                   '<div class="col-md-5"><div class="form-group">'+
                                   '<label>Codigo '+$('#tipo').val()+'</label>'+
                                     '<div class="row">'+
                                        '<div class="col-md-3">'+
                                            '<input required value="'+codTipo+'" name="cod1-'+conta+'"  class="form-control">'+
                                        '</div>'+
                                        '<div class="col-md-5">'+
                                            '<input required name="codenter-'+conta+'"  class="form-control">'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                            '<input value="'+codigo+'" required name="cod2-'+conta+'"  class="form-control">'+
                                        '</div>'+
                                     '</div>'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Fecha ingreso</label>'+
                                     '<input style="color: blue;" name="fecha_ingreso-'+conta+'" type="date" value="'+fechaA+'" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-4"><div class="form-group">'+
                                     '<label>Origen</label>'+
                                     '<input style="color: blue;" value="nuevo" readonly="" name="origenF-'+conta+'"  class="form-control">'+
                                     '<input value="4" name="origen-'+conta+'" type="text" hidden="">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label style="color: red;" >Destino</label>'+
                                     '<input style="color: blue;" value="'+arrayDestino[0][i]+'" readonly="" name="destino_name-'+conta+'"  class="form-control">'+
                                     '<input hidden="" value="'+arrayDestino[1][i]+'"  name="destino-'+conta+'" >'+
                                    '</div></div>'+


                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Fecha salida</label>'+
                                     '<input name="fecha_salida-'+conta+'" type="date" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Encargado</label>'+
                                     '<input name="encargado-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                '</div>'+

                                '<div class="row">'+
                                    '<h3 class="text-center">Descripción del sistema<br></h3>'+
                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Nombre del equipo</label>'+
                                     '<input name="nombreEq-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Usuario registrado</label>'+
                                     '<input value="admin" name="userRE-sis-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Dominio</label>'+
                                     '<input value="Sin grupo" name="dominio-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+


                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Fabricante</label>'+
                                     '<input value="Microsoft" name="fabri-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    ///
                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Sistema operativo<br></label>'+
                                     '<input  name="so-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Nucleos</label>'+
                                     '<select class="form-control" name="nucleos-'+conta+'"><option value="64 bits">64 bits</><option value="32 bits">32 bits</></select>'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Memoria física (GB)</label>'+
                                     '<input value="4" name="fisica-'+conta+'" type="number" class="form-control">'+
                                    '</div></div>'+
                                    ////

                                    '<div class="col-md-4"><div class="form-group">'+
                                    '<label>Nº serie</label>'+
                                     '<input  name="nserie-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+
                                '</div>'+

                                //procesador y mas
                                '<div class="row">'+
                                    '<h3 class="text-center">Descripción del hardware y adaptadores<br></h3><br>'+
                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Procesador</label>'+
                                     '<input name="procesador-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Velocidad de reloj (GHZ)</label>'+
                                     '<input name="ghz-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Fabricante procesador</label>'+
                                     '<input value="Intel" name="proFabri-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+


                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Modelo motherboard</label>'+
                                     '<input  name="mother-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    ///
                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Marca RAM</label>'+
                                     '<input  name="ramMarca-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Dirección IP</label>'+
                                    '<input  name="ip-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Tarjetas extra</label>'+
                                     '<input  name="extraT-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Marca monitor</label>'+
                                     '<input  name="marcaMonitor-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Tipo monitor</label>'+
                                     '<input  name="TipoMonitor-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Modelo y serie monitor</label>'+
                                     '<input  name="ModeloSerie-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Disco físico 1</label>'+
                                     '<input value="1"  name="discoFisico-'+conta+'" type="number" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Capacidad (GB)</label>'+
                                     '<input  name="capacidadDisco-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Marca disco duro</label>'+
                                     '<input  name="marcaDiscoDuro-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>DVD</label>'+
                                     '<select name="dvd-'+conta+'" class="form-control"><option value="si">si</option><option value="no">no</option></select>'+
                                    '</div></div>'+

                                    ////
                                '</div>'+


                                '<div class="row">'+
                                    '<h3 class="text-center">Software<br></h3>'+
                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Microsoft office (versión)</label>'+
                                     '<input name="office-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Winrar (versión)</label>'+
                                     '<input name="winrar-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Antivirus</label>'+
                                     '<input  name="antivirus-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Navegador</label>'+
                                     '<input  name="navegador-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+


                                '</div>'+



                                  '<div class="row"><br>'+
                                    '<div class="col-md-12 text-center">'+
                                       button + otro +
                                    '</div>'+
                                   '</div>'+


                              '</div>'+
                            '</div><hr>';

                     $("#camposTodos").append(data);
                     conta++;
                     otro= "";
                     button ="";

                }

              }
            }

            enviar = '<input class="btn btn-info" type="submit" value="Enviar" />';
           $("#camposTodos").append(enviar);
}


//SI HA SELECCIONADO 'PC COMPLETA' O 'SERVIDOR'
function AgregarCamposLaptop(){

   var arrayDestino = capturarDestinos();
   destinosCreados = $('#destinosCreados').val(); //cantidad

           /* for (var nextinput = 0; nextinput  <$('#cantidadproducto').val() ; nextinput ++) {
              data = '<label>'+arrayDestino[0][0]+'</label><label>'+arrayDestino[1][0]+'</label><br><br>';

              //se muestran los datos
              $("#camposTodos").append(data);

            }*/
            var fechaA = $('#fechacompra').val();
            var contaN = 0;
            var conta = 0; //levara los contadores de los id de cada elemento
            for (var i = 0;i < $('#cantidadproducto').val() ; i++)
            {

              for (var u = 1; u <= arrayDestino[1][0].length ; u++)
              {
                for (var w = 0; w <arrayDestino[1][i] ; w++) {
                     contaN++;
                     //var h = Obtener_pc_ID(arrayDestino[0][i]);
                     var codigo = null;

                     if(arrayDestino[0][i] == "Proyecto USAID"){
                        codigo = "USAID";
                     }
                     else if(arrayDestino[1][i] == "Otros proyectos"){
                       codigo = "";
                     }
                     else
                     {
                       codigo = "USAM";
                     }


                   // data = '<label>'+arrayDestino[0][i]+'</label>--'+arrayDestino[1][i]+'-- serial-'+conta+'<br>';
                    data =  '<div class="panel">'+
                              '<div class="panel-heading">'+
                               '<h3 class="panel-title">'+$('#tipo').val()+' # '+contaN+'</h3>'+
                                '<div class="right">'+
                                  '<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>'+
                                '</div>'+
                              '</div>'+
                             '<div class="panel-body">'+
                                '<div class="row">'+

                                   '<div class="col-md-5"><div class="form-group">'+
                                   '<label>Codigo '+$('#tipo').val()+'</label>'+
                                     '<div class="row">'+
                                        '<div class="col-md-3">'+
                                            '<input required value="LAP" name="cod1-'+conta+'"  class="form-control">'+
                                        '</div>'+
                                        '<div class="col-md-5">'+
                                            '<input required name="codenter-'+conta+'"  class="form-control">'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                            '<input value="'+codigo+'" required name="cod2-'+conta+'"  class="form-control">'+
                                        '</div>'+
                                     '</div>'+
                                   '</div></div>'+

                                   '<div class="col-md-4"><div class="form-group">'+
                                     '<label>Encargado</label>'+
                                     '<input  name="encargado-'+conta+'" type="text"  class="form-control">'+
                                    '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Fecha ingreso</label>'+
                                     '<input style="color: blue;" name="fecha_ingreso-'+conta+'" type="date" value="'+fechaA+'" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Origen</label>'+
                                     '<input style="color: blue;" value="nuevo" readonly="" name="origenF-'+conta+'"  class="form-control">'+
                                     '<input value="4" name="origen-'+conta+'" type="text" hidden="">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label style="color: red;" >Destino</label>'+
                                     '<input style="color: blue;" value="'+arrayDestino[0][i]+'" readonly="" name="destino_name-'+conta+'"  class="form-control">'+
                                     '<input hidden="" value="'+arrayDestino[1][i]+'"  name="destino-'+conta+'" >'+
                                    '</div></div>'+


                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Fecha salida</label>'+
                                     '<input name="fecha_salida-'+conta+'" type="date" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Serial</label>'+
                                     '<input required name="serial-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Marca</label>'+
                                     '<input required name="marca-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Nombre laptop</label>'+
                                     '<input required name="nombreLap-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                '</div><hr>'+

                                '<div class="row">'+
                                    '<h3 class="text-center">Descripción del sistema<br></h3>'+
                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Nombre del equipo</label>'+
                                     '<input name="nombreEq-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Usuario registrado</label>'+
                                     '<input value="admin" name="userRE-sis-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Dominio</label>'+
                                     '<input value="Sin grupo" name="dominio-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+


                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Fabricante</label>'+
                                     '<input value="Microsoft" name="fabri-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    ///
                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Sistema operativo<br></label>'+
                                     '<input  name="so-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Nucleos</label>'+
                                     '<select class="form-control" name="nucleos-'+conta+'"><option value="64 bits">64 bits</><option value="32 bits">32 bits</></select>'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Memoria física (GB)</label>'+
                                     '<input value="4" name="fisica-'+conta+'" type="number" class="form-control">'+
                                    '</div></div>'+
                                    ////

                                    '<div class="col-md-4"><div class="form-group">'+
                                    '<label>Nº serie</label>'+
                                     '<input  name="nserie-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+
                                '</div>'+

                                //procesador y mas
                                '<div class="row">'+
                                    '<h3 class="text-center">Descripción del hardware y adaptadores<br></h3><br>'+
                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Procesador</label>'+
                                     '<input name="procesador-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Velocidad de reloj (GHZ)</label>'+
                                     '<input name="ghz-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Fabricante procesador</label>'+
                                     '<input value="Intel" name="proFabri-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+


                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Modelo motherboard</label>'+
                                     '<input  name="mother-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    ///
                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Marca RAM</label>'+
                                     '<input  name="ramMarca-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Dirección IP</label>'+
                                    '<input  name="ip-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Tarjetas extra</label>'+
                                     '<input  name="extraT-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Marca monitor</label>'+
                                     '<input  name="marcaMonitor-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Tipo monitor</label>'+
                                     '<input  name="TipoMonitor-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Modelo y serie monitor</label>'+
                                     '<input  name="ModeloSerie-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Disco físico 1</label>'+
                                     '<input value="1"  name="discoFisico-'+conta+'" type="number" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Capacidad (GB)</label>'+
                                     '<input  name="capacidadDisco-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-2"><div class="form-group">'+
                                    '<label>Marca disco duro</label>'+
                                     '<input  name="marcaDiscoDuro-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>DVD</label>'+
                                     '<select name="dvd-'+conta+'" class="form-control"><option value="si">si</option><option value="no">no</option></select>'+
                                    '</div></div>'+

                                    ////
                                '</div>'+


                                '<div class="row">'+
                                    '<h3 class="text-center">Software<br></h3>'+
                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Microsoft office (versión)</label>'+
                                     '<input name="office-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Winrar (versión)</label>'+
                                     '<input name="winrar-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Antivirus</label>'+
                                     '<input  name="antivirus-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                    '<label>Navegador</label>'+
                                     '<input  name="fabri-'+conta+'" type="text" class="form-control">'+
                                    '</div></div>'+


                                '</div>'+



                              '</div>'+
                            '</div><hr>';

                     $("#camposTodos").append(data);
                     conta++;
                }
              }

            }

            enviar = '<input class="btn btn-info" type="submit" value="Enviar" />';
           $("#camposTodos").append(enviar);
}





//SI LA HA SELECCIONADO 'PERIFERICOS'
function AgregarCamposPerifericos()
{
   var arrayDestino = capturarDestinos();
   console.log(arrayDestino);
   destinosCreados = $('#destinosCreados').val(); //cantidad

           /* for (var nextinput = 0; nextinput  <$('#cantidadproducto').val() ; nextinput ++) {
              data = '<label>'+arrayDestino[0][0]+'</label><label>'+arrayDestino[1][0]+'</label><br><br>';

              //se muestran los datos
              $("#camposTodos").append(data);

            }*/
            var fechaA = $('#fechacompra').val();
            var contaN = 0;
            var conta = 0; //levara los contadores de los id de cada elemento
            for (var i = 0;i < $('#cantidadproducto').val() ; i++)
            {

              for (var u = 1; u <= arrayDestino[1][0].length ; u++)
              {
                for (var w = 0; w <arrayDestino[1][i] ; w++) {
                     contaN++;
                     var h = Obtener_pc_ID(arrayDestino[0][i]);


                      $('#nombre-'+conta).val('#tipo-'.conta);
                   // data = '<label>'+arrayDestino[0][i]+'</label>--'+arrayDestino[1][i]+'-- serial-'+conta+'<br>';
                    data =  '<div class="panel">'+
                              '<div class="panel-heading">'+
                               '<h3 class="panel-title">Periferico # '+contaN+'</h3>'+
                                '<div class="right">'+
                                  '<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>'+
                                '</div>'+
                              '</div>'+
                             '<div class="panel-body">'+
                                '<div class="row">'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Serial</label>'+
                                     '<input required name="serial-'+conta+'"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Nombre</label>'+
                                     '<input required name="nombre-'+conta+'"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Marca</label>'+
                                     '<input name="marca-'+conta+'"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Capacidad</label>'+
                                     '<input name="capacidad-'+conta+'"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Tipo</label>'+

                                      '<select class="form-control" name="tipo-'+conta+'">'+
                                        '<option value="MOUSE">MOUSE</option>'+
                                        '<option value="TECLADO">TECLADO</option>'+
                                        '<option value="MOUSE">MONITOR</option>'+
                                        '<option value="USB">USB</option>'+
                                        '<option value="MEMORIA SD">MEMORIA SD</option>'+
                                       ' <option value="LECTOR DVD/CD">LECTOR DVD/CD</option>'+
                                        '<option value="IMPRESORES MATRICIALES">IMPRESORES MATRICIALES</option>'+
                                       '<option value="IMPRESORES MULTIFUNCIONALES">IMPRESORES MULTIFUNCIONALES</option>'+
                                        '<option value="IMPRESOR DESJEKT">IMPRESOR DESJEKT</option>'+
                                        '<option value="SCANNER">SCANNER</option>'+
                                        '<option value="WEBCAN">WEBCAN</option>'+
                                        '<option value="PARLANTES">PARLANTES</option>'+
                                        '<option value="LECTOR PARA MEMORIA SD">LECTOR PARA MEMORIA SD</option>'+
                                        '<option value="UPS">UPS</option>'+
                                        '<option value="AUDIFONOS">AUDIFONOS</option>'+
                                        '<option value="MEMORIA SD">MEMORIA SD</option>'+
                                        '<option value="PROYECTOR">PROYECTOR</option>'+
                                        '<option value="FAX">FAX</option>'+
                                        '<option value="MICROFONO">MICROFONO</option>'+
                                        '<option value="OTRO">OTRO</option>'+
                                    '</select>'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Velocidad</label>'+
                                     '<input name="velocidad-'+conta+'"  class="form-control">'+
                                   '</div></div>'+


                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Estado</label>'+
                                     '<input name="estatus-'+conta+'" value="nuevo"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Fecha ingreso</label>'+
                                     '<input style="color: blue;" name="fecha_ingreso-'+conta+'" type="date" value="'+fechaA+'" class="form-control">'+
                                    '</div></div>'+



                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Origen</label>'+
                                     '<input style="color: blue;" value="nuevo" readonly="" name="origenF-'+conta+'"  class="form-control">'+
                                     '<input value="4" name="origen-'+conta+'" type="text" hidden="">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Fecha salida</label>'+
                                     '<input name="fecha_salida-'+conta+'" type="date" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label style="color: red;" >Destino</label>'+
                                     '<input style="color: blue;" value="'+arrayDestino[0][i]+'" readonly="" name="destino_name-'+conta+'"  class="form-control">'+
                                     '<input hidden="" value="'+arrayDestino[1][i]+'"  name="destino-'+conta+'" >'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>PC</label>'+
                                     '<select name="pcSeleccionada-'+conta+'"   class="form-control">'+h+
                                    '</select></div></div>'+



                                '</div>'+
                              '</div>'+
                            '</div>';
                     $("#camposTodos").append(data);

                     conta++;
                }
              }

            }

            enviar = '<input class="btn btn-info" type="submit" value="Enviar" />';
           $("#camposTodos").append(enviar);
 }//end function


function AgregarCamposDiscoDuroExterno()
{
   var arrayDestino = capturarDestinos();
   destinosCreados = $('#destinosCreados').val(); //cantidad

           /* for (var nextinput = 0; nextinput  <$('#cantidadproducto').val() ; nextinput ++) {
              data = '<label>'+arrayDestino[0][0]+'</label><label>'+arrayDestino[1][0]+'</label><br><br>';

              //se muestran los datos
              $("#camposTodos").append(data);

            }*/
            var fechaA = $('#fechacompra').val();
            var contaN = 0;
            var conta = 0; //levara los contadores de los id de cada elemento
            for (var i = 0;i < $('#cantidadproducto').val() ; i++)
            {

              for (var u = 1; u <= arrayDestino[1][0].length ; u++)
              {
                for (var w = 0; w <arrayDestino[1][i] ; w++) {
                     contaN++;
                     //var h = Obtener_pc_ID(arrayDestino[0][i]);

                     var codigo = null;

                     if(arrayDestino[0][i] == "Proyecto USAID"){
                        codigo = "USAID";
                     }
                     else if(arrayDestino[1][i] == "Otros proyectos"){
                       codigo = "";
                     }
                     else
                     {
                       codigo = "USAM";
                     }

                   // data = '<label>'+arrayDestino[0][i]+'</label>--'+arrayDestino[1][i]+'-- serial-'+conta+'<br>';
                    data =  '<div class="panel">'+
                              '<div class="panel-heading">'+
                               '<h3 class="panel-title">Disco duro externo # '+contaN+'</h3>'+
                                '<div class="right">'+
                                  '<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>'+
                                '</div>'+
                              '</div>'+
                             '<div class="panel-body">'+
                                '<div class="row">'+

                                  '<div class="col-md-5"><div class="form-group">'+
                                   '<label>Codigo '+$('#tipo').val()+'</label>'+
                                     '<div class="row">'+
                                        '<div class="col-md-3">'+
                                            '<input required value="DDE" name="cod1-'+conta+'"  class="form-control">'+
                                        '</div>'+
                                        '<div class="col-md-5">'+
                                            '<input required name="codenter-'+conta+'"  class="form-control">'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                            '<input value="'+codigo+'" required name="cod2-'+conta+'"  class="form-control">'+
                                        '</div>'+
                                     '</div>'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Encargado del puesto</label>'+
                                     '<input required name="encargado-'+conta+'"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-4"><div class="form-group">'+
                                     '<label>Serial</label>'+
                                     '<input required name="serial-'+conta+'"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Nombre</label>'+
                                     '<input required name="nombre-'+conta+'"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Marca</label>'+
                                     '<input name="marca-'+conta+'"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Capacidad</label>'+
                                     '<input name="capacidad-'+conta+'"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Tipo</label>'+
                                     '<input  class="form-control" value="DISCO DURO EXTERNO" name="tipo-'+conta+'">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Velocidad</label>'+
                                     '<input name="velocidad-'+conta+'"  class="form-control">'+
                                   '</div></div>'+


                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Estado</label>'+
                                     '<input name="estatus-'+conta+'" value="nuevo"  class="form-control">'+
                                   '</div></div>'+

                                   '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Fecha ingreso</label>'+
                                     '<input style="color: blue;" name="fecha_ingreso-'+conta+'" type="date" value="'+fechaA+'" class="form-control">'+
                                    '</div></div>'+



                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Origen</label>'+
                                     '<input style="color: blue;" value="nuevo" readonly="" name="origenF-'+conta+'"  class="form-control">'+
                                     '<input value="4" name="origen-'+conta+'" type="text" hidden="">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label>Fecha salida</label>'+
                                     '<input name="fecha_salida-'+conta+'" type="date" class="form-control">'+
                                    '</div></div>'+

                                    '<div class="col-md-3"><div class="form-group">'+
                                     '<label style="color: red;" >Destino</label>'+
                                     '<input style="color: blue;" value="'+arrayDestino[0][i]+'" readonly="" name="destino_name-'+conta+'"  class="form-control">'+
                                     '<input hidden="" value="'+arrayDestino[1][i]+'"  name="destino-'+conta+'" >'+
                                    '</div></div>'+


                                '</div>'+
                              '</div>'+
                            '</div>';
                     $("#camposTodos").append(data);

                     conta++;
                }
              }

            }

            enviar = '<input class="btn btn-info" type="submit" value="Enviar" />';
           $("#camposTodos").append(enviar);
 }//end function







function eliminarCampos(){
 var element  = document.getElementById("camposTodos");
   while (element.firstChild) {
  element.removeChild(element.firstChild);
 }
 $('#destinosCreados').val(0);
 document.getElementById("clicks").innerHTML = 0;
  x = 0;
  next = 0;
 document.getElementById("del").disabled = true;
 document.getElementById("ag").disabled = false;

}


function color2(comp){ //funcion para desabilitar botones del elemento de una PC
  let id = comp.id;
  var cont = 0;

     if($('#serial-'+id).val() == "")
     {
        $('#serial-'+id).parent().parent().addClass('has-error');
        cont++;
     }
     else {
       $('#serial-'+id).parent().parent().removeClass('has-error');
     }


     if($('#nombre-'+id).val() == "")
     {
        $('#nombre-'+id).parent().parent().addClass('has-error');
        cont++;
     }
     else {
       $('#nombre-'+id).parent().parent().removeClass('has-error');
     }


     if(cont == 0){
      $('.PC'+id).attr('disabled', 'disabled');
      $('#'+'PC'+id).modal('hide');
     }
  //document.getElementById(id).disabled = true;
}
