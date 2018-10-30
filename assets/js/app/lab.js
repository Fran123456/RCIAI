
var cont = 0;

function add_software(){
   
   var data = '<tr>'+
		 			'<td width="400"><input  type="text" name="'+cont+'-descripcion"  class="form-control int"></td>'+
		 			'<td width="300"><input type="text" name="'+cont+'-empresa"  class="form-control int"></td>'+
		 			'<td><input type="text" name="'+cont+'-nombre_carpeta" class="form-control int"></td>'+
		 			'<td><input type="text" name="'+cont+'-version"  class="form-control int"></td>'+
		 			'<td><input type="text" name="'+cont+'-nombreArchivo" class="form-control int"></td>'+
		 		'</tr>';
   $("#elementoTR").append(data);
   cont++;

   $("#softwareCONT").val(cont);
}

function delete_software(){
	$("#elementoTR tr").last().remove();
	cont--;
	$("#softwareCONT").val(cont);
}

function delete_(){
	$("#elementoTR").remove();
	var data = '<tbody id="elementoTR"></tbody>';
	$('#tab').append(data);
	cont = 0;
	$("#softwareCONT").val(cont);
}


var PC= new Vue({
   el: "#cod",
   data: { //inicio de data
       cod1:"",
       cod2:"",
       finalcode: "",
     }, //fin de data
      methods:{
        
      }
});




