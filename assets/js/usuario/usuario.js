$(document).ready(function(){
	$("#tabla").dataTable({
	 responsive: true,	
    "language": {
      "url": "assets/js/lenguaje.js"
    }
  }); 
	

	

	/*$('#showdata').on('click','.item-view',function(){
		var serial = $(this).attr('data');
		$('#modalView').modal('show');
		$('#modalView').find('.modal-title').text('Articulo en bodega');
		$('#viewForm').attr('action','bodega_Controller/detalleAjax');

		$.ajax({
			type: 'post',
			url: "bodega_Controller/detalleAjax/",

			data: {serial: serial},
			async: false,
			dataType: 'json',
			success: function(data){
				alert(data);
				
			},
			error: function(){
				alert('No se puede ver los datos');
			}
		});
	});*/


});