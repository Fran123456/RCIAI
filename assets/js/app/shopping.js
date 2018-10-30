
//componente VUE que hara aparecer si es pc o no
var PC= new Vue({
   el: "#compra",
   data: { //inicio de data
       selected: '',
       lists: [
                   {keep: 'MONITOR'},
                   {keep: 'TECLADO'},
                   {keep: 'MOUSE'},
                   {keep: 'CPU'}
               ],
       radio: '', //captura lo que tiene el radiobutton
       cantidadProducto: 0,
       op: '',
       num:'',
       total: '',
       validar1: false, //valida
       defaultK: true, //controla los radiobuttons, desabilitar boton de validar etc.
       mensaje: "Seleccione", //Aqui se ubica algun mensaje este referente a los radiobutton
       lists_perifericos: [
                     { id: 1}
       ],
       lists_pc: [
            {id: 1}
       ],
       seleccionPC: '', //SELECION DE LOS ELEMENTOS DE UNA PC O SERVIDOR
       length_PC: null,
       fecha_compra: null,
       opcion: null,
       destinox: 0,
     }, //fin de data
      methods:{
         agregar_opcion: function(){
          this.lists.push({
            keep: this.opcion
          });
          this.opcion = '';
         },
         validarOpcion1: function(){
           this.validar1 = true;
           this.defaultK = false;
           this.mensaje = "Ha seleccionado";

            if(this.selected == 'Periferico'){
              for (var i = 0; i < this.cantidadProducto; i++) {
                var r = 0;
                 r= this.cantidadProducto - i;
                if(r == 1){
                }
                else {
                   this.lists_perifericos.push({id: (i+2)});
                }
              }
            }

             if(this.selected == 'Laptop'){
              for (var i = 0; i < this.cantidadProducto; i++) {
                var r = 0;
                 r= this.cantidadProducto - i;
                if(r == 1){
                }
                else {
                   this.lists_perifericos.push({id: (i+2)});
                }
              }
            }

            if(this.selected == 'Disco duro externo'){
              for (var i = 0; i < this.cantidadProducto; i++) {
                var r = 0;
                 r= this.cantidadProducto - i;
                if(r == 1){
                }
                else {
                   this.lists_perifericos.push({id: (i+2)});
                }
              }
            }


            if(this.selected == 'PC'){
              for (var i = 0; i < this.cantidadProducto; i++) {
                var r = 0;
                 r= this.cantidadProducto - i;
                if(r == 1){
                }
                else {
                   this.lists_pc.push({id: (i+2)});
                }
              }
            }
         },

         validarOpcionA: function(){


            if(this.selected == 'PC'){
              for (var i = 0; i < this.cantidadProducto; i++) {
                var r = 0;
                 r= this.cantidadProducto - i;
                if(r == 1){
                }
                else {
                   this.lists_pc.push({id: (i+2)});
                }
              }
            }
         },

         continuar: function(){//Metodo referente a continuar con la compra opcion asignar
           if(this.radio == 'Nuevo para asignar'){
              this.destinox = 1;

            }
         }
      }
});




//JAVASCRIPT PURO
function validacionCompra() //FUNCION PARA VALIDAR LA OPCION DE COMPRA
 {
     var cont = 0;
     //alert(isNaN($('#totalcompra').val()));

     if($('#tipo').val() == "")
     {
        $('#tipo').parent().parent().addClass('has-error');
        cont++;
     }
     else {
       $('#tipo').parent().parent().removeClass('has-error');
     }

     if($('#proveedor').val() == "")
     {
       $('#proveedor').parent().parent().addClass('has-error');
       cont++;
     }else {
       $('#proveedor').parent().parent().removeClass('has-error');
     }

     if($('#fechautorizacion').val() == "")
     {
       $('#fechautorizacion').parent().parent().addClass('has-error');
       cont++;
     }else {
       $('#fechautorizacion').parent().parent().removeClass('has-error');
     }

     if($('#fechacompra').val() == "")
     {
       $('#fechacompra').parent().parent().addClass('has-error');
       cont++;
     }else {
       $('#fechacompra').parent().parent().removeClass('has-error');
     }

     if($('#detalle').val() == "")
     {
       $('#detalle').parent().parent().addClass('has-error');
       cont++;
     }else {
       $('#detalle').parent().parent().removeClass('has-error');
     }

     if($('#cantidadproducto').val() == "")
     {
       $('#cantidadproducto').parent().parent().addClass('has-error');
       cont++;
     }else {
       $('#cantidadproducto').parent().parent().removeClass('has-error');
     }

     if($('#cantidadproducto').val() > 0){
            $('#cantidadproducto').parent().parent().removeClass('has-error');
     }else{
       $('#cantidadproducto').parent().parent().addClass('has-error');
       cont++;
     }

     if($('#factura').val() == "")
     {
       $('#factura').parent().parent().addClass('has-error');
       cont++;
     }else {
       $('#factura').parent().parent().removeClass('has-error');
     }

     if($('#garantia').val() == "")
     {
       $('#garantia').parent().parent().addClass('has-error');
       cont++;
     }else {
       $('#garantia').parent().parent().removeClass('has-error');
     }

     if($('#totalcompra').val() == "")
     {
       $('#totalcompra').parent().parent().addClass('has-error');
       cont++;
     }
     else {
       $('#totalcompra').parent().parent().removeClass('has-error');
     }

     if(isNaN($('#totalcompra').val()))
     {
       cont++;
     }
     else {
       $('#totalcompra').parent().parent().removeClass('has-error');
     }


     if($('#totalcompra').val() <= 0)
     {
       $('#totalcompra').parent().parent().addClass('has-error');
       cont++;
     }else {
       $('#totalcompra').parent().parent().removeClass('has-error');
     }
     if(cont == 0){
      $('#validacion').html(
       '<h4><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Tipo de producto: <strong>'+ $('#tipo').val()+ '</strong><h4>'+
       '<h4><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Proveedor: <strong>'+ $('#proveedor').val()+ '</strong><h4>'+
       '<h4><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Fecha de autorización: <strong>'+ $('#fechautorizacion').val()+ '</strong><h4>'+
       '<h4><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Fecha de compra: <strong>'+ $('#fechacompra').val()+ '</strong><h4>'+
       '<h4><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Detalle: <strong>'+ $('#detalle').val()+ '</strong><h4>'+
       '<h4><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Cantidad del producto: <strong>'+ $('#cantidadproducto').val()+ '</strong><h4>'+
       '<h4><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Factura: <strong>'+ $('#factura').val()+ '</strong><h4>'+
       '<h4><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Garantia: <strong>'+ $('#garantia').val()+ '</strong><h4>'+
       '<h4><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Total de compra: <strong>'+ $('#totalcompra').val()+ '</strong><h4>'
      );
      $('#validacionModal').modal('show');
     //document.getElementById('a').disabled = false;
     }
}

function color(comp){ //funcion para desabilitar botones del elemento de una PC

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
     // $('.PC'+id).attr('disabled', 'disabled');
      $('#'+id).modal('hide');
      $('#w'+id).removeClass('btn-primary');
      $('#w'+id).addClass('btn-success');
     }

  //document.getElementById(id).disabled = true;
}


function cerrarB(comp)
{
   let id = comp.id;
   $('#'+id).modal('hide');
   if($('#serial-'+id).val() == ""){
      $('#w'+id).removeClass('btn-success');
      $('#w'+id).addClass('btn-primary');
   }

}


