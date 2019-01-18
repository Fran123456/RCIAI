 <?php if($op == "Nuevo" || $op == "Nuevo para asignar" && ($tipo == 'Periferico' || $tipo == 'Disco duro externo' || $tipo == "Laptop")): ?>
      <?php if(isset($perifericos)): ?>
            <div class="row">
                <input type="text" hidden value="<?php echo $perifericos['cantidad'] ?>" name="cantidadPerifericos" >
           <?php for ($i = 0; $i <$perifericos['cantidad'] ; $i++): ?>
            <div class="col-md-3">
              <!-- PANEL WITH FOOTER -->
              <div  class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $tipo; ?> # <?php echo $i+1 ?></h3>
                  <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                  </div>
                </div>
                <div class="panel-body">

                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $i ?>">
                        Ver
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Periferico # <?php echo $i+1 ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                <label>Serial</label>
                                <input required type="text" class="form-control" value="<?php echo$perifericos[$i]['serial']?>" name="<?php echo 'serial-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                <label>nombre</label>
                                <input required type="text" class="form-control" value="<?php echo$perifericos[$i]['nombre']?>" name="<?php echo 'nombre-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                <label>tipo</label>
                                <input type="text" class="form-control" value="<?php echo$perifericos[$i]['tipo']?>" name="<?php echo 'tipo-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                <label>velocidad</label>
                                <input type="text" class="form-control" value="<?php echo$perifericos[$i] ['velocidad']?>" name="<?php echo 'velocidad-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" value="<?php echo$perifericos[$i]['estatus']?>" name="<?php echo 'estatus-'.($i+1)?>">
                              </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="form-group">
                                  <label>Marca</label>
                                  <input type="text" class="form-control" value="<?php echo$perifericos[$i]['marca']?>" name="<?php echo 'marca-'.($i+1)?>">
                                </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="form-group">
                                  <label>Capacidad</label>
                                  <input type="text" class="form-control" value="<?php echo$perifericos[$i]['capacidad']?>" name="<?php echo 'capacidad-'.($i+1)?>">
                                </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="form-group">
                                <label>Fecha ingreso</label>
                                <input type="date" class="form-control" value="<?php echo$perifericos[$i]['fecha_ingreso']?>" name="<?php echo 'ingresofecha-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                <label>Fecha salida</label>
                                <input type="date" class="form-control" value="<?php echo $perifericos[$i]['fecha_salida']?>" name="<?php echo'salidafecha-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                <label>Destino</label>
                                <input readonly type="text" class="form-control" value="<?php echo $perifericos[$i]['destinoString'][0]['unidad']?>" name="<?php echo 'destino-'.($i+1)?>">

                                <!--ESTE INPUT ES IMPORTANTE PLOX-->
                                <input hidden type="text" value="<?php echo $perifericos[$i]['destino']?>" name="<?php echo 'destinoID-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                <label>Origen</label>
                                <input readonly type="text" class="form-control" value="<?php echo $perifericos[$i]['origenString'][0]['unidad']?>  " name="<?php echo 'destino-'.($i+1)?>">


                                <!--ESTE INPUT ES IMPORTANTE PLOX-->
                                <input hidden type="text" value="<?php echo $perifericos[$i]['origen']?>" name="<?php echo 'origenID-'.($i+1)?>">
                               </div>
                                </div>

                                <?php if(isset($perifericos[$i]['codePC'])): ?>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>PC asignada</label>
                                    <input type="text" readonly="" class="form-control" value="<?php echo $perifericos[$i]['codePC']?>" name="<?php echo 'pcAsignada-'.($i+1)?>">
                                  </div>
                                </div>
                              <?php endif; ?>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>

                            </div>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
              <!-- END PANEL WITH FOOTER -->
         </div>
          <?php endfor; ?>
          </div>
           <?php endif;  ?>
  <?php endif; ?>