<?php if($op =="Nuevo para asignar" &&   $tipo == 'Disco duro externo'): ?>
            <div class="row">
                <input type="text" hidden value="<?php echo $discosDuros['cantidad'] ?>" name="cantidadPerifericos" >
                 <?php for ($i = 0; $i <$discosDuros['cantidad'] ; $i++): ?>
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
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo $tipo; ?> # <?php echo $i+1 ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                 <label>Codigo disco</label>
                                 <input required type="text"  class="form-control" value="<?php echo$discosDuros[$i]['identificador']?>" name="<?php echo 'codex-'.($i+1)?>">
                                 </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                 <label>Serial</label>
                                 <input required type="text" class="form-control" value="<?php echo$discosDuros[$i]['serial']?>" name="<?php echo 'serial-'.($i+1)?>">
                                 </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                <label>nombre</label>
                                <input required type="text" class="form-control" value="<?php echo$discosDuros[$i]['nombre']?>" name="<?php echo 'nombre-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                  <label>tipo</label>
                                  <input type="text" class="form-control" value="<?php echo$discosDuros[$i]['tipo']?>" name="<?php echo 'tipo-'.($i+1)?>">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                <label>velocidad</label>
                                <input type="text" class="form-control" value="<?php echo$discosDuros[$i] ['velocidad']?>" name="<?php echo 'velocidad-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" value="<?php echo$discosDuros[$i]['estatus']?>" name="<?php echo 'estatus-'.($i+1)?>">
                              </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                  <label>Marca</label>
                                  <input type="text" class="form-control" value="<?php echo$discosDuros[$i]['marca']?>" name="<?php echo 'marca-'.($i+1)?>">
                                </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                  <label>Capacidad</label>
                                  <input type="text" class="form-control" value="<?php echo$discosDuros[$i]['capacidad']?>" name="<?php echo 'capacidad-'.($i+1)?>">
                                </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                <label>Fecha ingreso</label>
                                <input type="date" class="form-control" value="<?php echo$discosDuros[$i]['fecha_ingreso']?>" name="<?php echo 'ingresofecha-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                <label>Fecha salida</label>
                                <input type="date" class="form-control" value="<?php echo $discosDuros[$i]['fecha_salida']?>" name="<?php echo'salidafecha-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                <label>Destino</label>
                                <input readonly type="text" class="form-control" value="<?php echo $discosDuros[$i]['destinoString'][0]['unidad']?>" name="<?php echo 'destino-'.($i+1)?>">

                                <!--ESTE INPUT ES IMPORTANTE PLOX-->
                                <input hidden type="text" value="<?php echo $discosDuros[$i]['destino']?>" name="<?php echo 'destinoID-'.($i+1)?>">
                              </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                <label>Origen</label>
                                <input readonly type="text" class="form-control" value="<?php echo $discosDuros[$i]['origenString'][0]['unidad']?>  " name="<?php echo 'origen-'.($i+1)?>">


                                <!--ESTE INPUT ES IMPORTANTE PLOX-->
                                <input hidden type="text" value="<?php echo $discosDuros[$i]['origen']?>" name="<?php echo 'origenID-'.($i+1)?>">
                               </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Encargado</label>
                                    <input type="text" class="form-control" value="<?php echo $discosDuros[$i]['encargado_puesto']?>" name="<?php echo'encargado-'.($i+1)?>">
                                   </div>
                                </div>



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
          <?php endif; ?>
