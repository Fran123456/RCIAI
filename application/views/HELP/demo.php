<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
 <style type="text/css">
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

 </style>
	<script src="<?php echo base_url() ?>assets/js/vue.js"></script> <!--INTEGRANDO VUE JS-->
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--SI ES PC PARA SIGNAR EN ZONA ADMINISTRATIVA--> 
             <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">PC N°1</h3>
                  <div class="right">
                  <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                  </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                           <div class="col-md-4">
                           	<div class="form-group">
                           		<label>Codigo de PC</label>
                           		<input type="text" class="form-control" name="">
                           	</div>
                           </div>
                           <div class="col-md-4">
                           	<div class="form-group">
                           		<label>Origen</label>
                           		<input type="text" class="form-control" name="">
                           	</div>
                           </div>
                           <div class="col-md-4">
                           	<div class="form-group">
                           		<label>Destino</label>
                           		<input type="text" class="form-control" name="">
                           	</div>
                           </div>
                     </div>
                     <hr>
                     <div class="row">
                     	<div class="col-md-4">
                     		
                     	</div>
                     </div>
                     <!--FIN CREACION DE DESTINOS-->  
               </div>
          </div>
    <!--SI ES PC PARA SIGNAR EN ZONA ADMINISTRATIVA--> 


 <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
          Collapsible Group Item #2
        </button>
<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
           </button>




 <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="heading1">
      <h5 class="mb-0">
       
      </h5>
    </div>
    <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
      <div class="card-body">
        Afinable VHS.
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
       trtt
      </div>
    </div>
  </div>
</div>






    <!--SI ES PC PARA SIGNAR EN ZONA DE LABORATORIO--> 


    <!--SI ES PC PARA SIGNAR EN ZONA DE LABORATORIO--> 

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>










