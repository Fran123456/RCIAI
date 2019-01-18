$(document).ready(function(){

	verificar();

	$("#tabla").dataTable({
    "language": {
      "url": "assets/js/lenguaje.js"
    }
  }); 
	

	$('#showdata').on('click','.item-edit',function(){
		var id = $(this).attr('data');

		alert(id);
	});

	$('#showdata').on('click','.item-delete',function(){
		var id = $(this).attr('data');

		alert(id);
	});

//FUNCIÓN PARA VERIFICAR SI LOS CAMPOS ESTAN VACIOS O TIENEN DATOS
	function verificar(){


		/*     show_shopping       */
		if($("#id_compra").val()=='no disponible'){
			$("#id_compra").css('color','red');
		}
		if($("#cantidad").val()=='no disponible'){
			$("#cantidad").css('color','red');
		}
		if($("#tipo").val()=='no disponible'){
			$("#tipo").css('color','red');
		}
		if($("#detalle").val()=='no disponible'){
			$("#detalle").css('color','red');
		}
		if($("#n_factura").val()=='no disponible'){
			$("#n_factura").css('color','red');
		}
		if($("#proveedor").val()=='no disponible'){
			$("#proveedor").css('color','red');
		}
		if($("#garantia").val()=='no disponible'){
			$("#garantia").css('color','red');
		}
		if($("#f_autorizacion").val()=='no disponible'){
			$("#f_autorizacion").css('color','red');
		}
		if($("#f_compra").val()=='no disponible'){
			$("#f_compra").css('color','red');
		}
		if($("#total").val()=='no disponible'){
			$("#total").css('color','red');
		}
		if($("#usuario_id").val()=='no disponible'){
			$("#usuario_id").css('color','red');
		}
		if($("#observaciones").val()=='no disponible'){
			$("#observaciones").css('color','red');
		}
		if($("#unidad").val()=='no disponible'){
			$("#unidad").css('color','red');
		}
		if($("#cantidad_U").val()=='no disponible'){
			$("#cantidad_U").css('color','red');
		}


		/*      show_Services       */


	}//fin función verificar


});