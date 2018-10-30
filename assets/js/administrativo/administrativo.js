$(document).ready(function(){
	verificar();

	$("#tabla").dataTable({
		 responsive: true,
    "language": {
      "url": "assets/js/lenguaje.js"
    }
  }); 

	function verificar(){
	///////////////// detalle_adm //////////////////////////////
		if($('#identificador').val()=='no disponible'){
			$('#identificador').css('color','red');
		}
		if($('#encargado').val()=='no disponible'){
			$('#encargado').css('color','red');
		}
		if($('#fecha_ing').val()=='no disponible'){
			$('#fecha_ing').css('color','red');
		}
		if($('#origen').val()=='no disponible'){
			$('#origen').css('color','red');
		}
		if($('#fecha_s').val()=='no disponible'){
			$('#fecha_s').css('color','red');
		}
		if($('#destino').val()=='no disponible'){
			$('#destino').css('color','red');
		}
		if($('#fecha_compra').val()=='no disponible'){
			$('#fecha_compra').css('color','red');
		}
		if($('#factura').val()=='no disponible'){
			$('#factura').css('color','red');
		}
		if($('#nombre_equipo').val()=='no disponible'){
			$('#nombre_equipo').css('color','red');
		}
		if($('#usuario_registrado').val()=='no disponible'){
			$('#usuario_registrado').css('color','red');
		}
		if($('#dominio').val()=='no disponible'){
			$('#dominio').css('color','red');
		}
		if($('#fabricante').val()=='no disponible'){
			$('#fabricante').css('color','red');
		}
		if($('#so').val()=='no disponible'){
			$('#so').css('color','red');
		}
		if($('#nucleo').val()=='no disponible'){
			$('#nucleo').css('color','red');
		}
		if($('#ram').val()=='no disponible'){
			$('#ram').css('color','red');
		}
		if($('#serie_des').val()=='no disponible'){
			$('#serie_des').css('color','red');
		}
		if($('#procesador').val()=='no disponible'){
			$('#procesador').css('color','red');
		}
		if($('#velocidad_reloj').val()=='no disponible'){
			$('#velocidad_reloj').css('color','red');
		}
		if($('#modelo_base').val()=='no disponible'){
			$('#modelo_base').css('color','red');
		}
		if($('#marca_ram').val()=='no disponible'){
			$('#marca_ram').css('color','red');
		}
		if($('#ip').val()=='no disponible'){
			$('#ip').css('color','red');
		}
		if($('#tarjeta').val()=='no disponible'){
			$('#tarjeta').css('color','red');
		}
		if($('#monitor').val()=='no disponible'){
			$('#monitor').css('color','red');
		}
		if($('#tipo').val()=='no disponible'){
			$('#tipo').css('color','red');
		}
		if($('#serie').val()=='no disponible'){
			$('#serie').css('color','red');
		}
		if($('#disco_fisico1').val()=='no disponible'){
			$('#disco_fisico1').css('color','red');
		}
		if($('#capacidad').val()=='no disponible'){
			$('#capacidad').css('color','red');
		}
		if($('#marca_dd').val()=='no disponible'){
			$('#marca_dd').css('color','red');
		}
		if($('#dvd').val()=='no disponible'){
			$('#dvd').css('color','red');
		}

/////////////////            detalle_DDE            ////////////////////////////////////////
		if($('#codigoDDE').val()=='no disponible'){
			$('#codigoDDE').css('color','red');
		}
		if($('#serialDDE').val()=='no disponible'){
			$('#serialDDE').css('color','red');
		}
		if($('#encargadoDDE').val()=='no disponible'){
			$('#encargadoDDE').css('color','red');
		}
		if($('#nombreDDE').val()=='no disponible'){
			$('#nombreDDE').css('color','red');
		}
		if($('#marcaDDE').val()=='no disponible'){
			$('#marcaDDE').css('color','red');
		}
		if($('#capacidadDDE').val()=='no disponible'){
			$('#capacidadDDE').css('color','red');
		}
		if($('#tipoDDE').val()=='no disponible'){
			$('#tipoDDE').css('color','red');
		}
		if($('#velocidadDDE').val()=='no disponible'){
			$('#velocidadDDE').css('color','red');
		}
		if($('#estadoDDE').val()=='no disponible'){
			$('#estadoDDE').css('color','red');
		}
		if($('#f_ingresoDDE').val()=='no disponible'){
			$('#f_ingresoDDE').css('color','red');
		}
		if($('#origenDDE').val()=='no disponible'){
			$('#origenDDE').css('color','red');
		}
		if($('#f_salidaDDE').val() == '0000-00-00' ){
    		$('#f_salidaDDE').val('No disponible');
    		$('#f_salidaDDE').css('color','red');
    	}
		if($('#destinoDDE').val()=='no disponible'){
			$('#destinoDDE').css('color','red');
		}

/////////////////////////    detalle_lab     ////////////////////////////////////////////////////
		if($('#fabricante_procesador').val()=='no disponible'){
			$('#fabricante_procesador').css('color','red');
		}


	}//fin de la funcion


});