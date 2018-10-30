<!--ERROR DEBE CREAR DESTINO-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h3>Error debe crear un destino.</h3>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
 </div>
<!--ERROR DEBE CREAR DESTINO-->

<!--ERROR LA CANTIDAD NO COINCIDE-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div id="modal-body" class="modal-body">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
 </div>
<!--ERROR LA CANTIDAD NO COINCIDE-->


<!--MENSAJE DE VALIDACION-->
<div class="modal fade" id="validacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Validación</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div id="validacion" class="modal-body">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">No estoy seguro/a</button>
                  <button id="activate"  v-on:click="validarOpcion1" class="btn btn-info" data-dismiss="modal">Continuar, todo esta correcto</button>
                </div>
              </div>
            </div>
 </div>
<!--MENSAJE DE VALIDACION-->


