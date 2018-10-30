 <?php if(($tipo == "PC" || $tipo == 'Servidor') && $op =="Nuevo"): ?>
        <!--CANTIDAD DE PC -->
        <input type="text" hidden value="<?php echo $PC['cantidadPC'] ?> " name="cantidadPC">
        <!--IMPOTANTE AQUI SABEMOS CUANTOS ELEMENTOS VA TENER LA picture-->
        <input type="text" hidden name="cantidadElementosPC" value="<?php echo $PC['cantidadElementosPC'] ?>">

       <?php for ($h = 0; $h <($PC['cantidadPC']) ; $h++):?>
               <div class="panel">
                 <div class="panel-heading">
                  <h3 class="panel-title"><?php  echo '<i class="fa fa-desktop" aria-hidden="true"></i> '. $tipo . " #" . ($h+1)?></h3>
                  <div class="right">
                  <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                  </div>
                </div>


                  <div class="panel-body"> <!--PANEL BODY DEL DIV COMPLETO-->
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Origen</label>
                              <input type="text" readonly value="<?php echo $PC['informacionPC']['origenID'][$h]?>" class="form-control"  name="origen-<?php echo ($h+1)?>">
                              <input type="text" hidden readonly value="<?php echo $PC['informacionPC']['origen'][$h] ?>"  name="origenID-<?php echo ($h+1)?>">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Destino</label>
                              <input type="text" readonly value="<?php echo $PC['informacionPC']['destinoID'][$h]?>" class="form-control"  name="destino-<?php echo ($h+1)?>">
                              <input type="text" hidden readonly value="<?php echo $PC['informacionPC']['destino'][$h] ?>"  name="destinoID-<?php echo ($h+1)?>">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Ingreso</label>
                              <input  value="<?php echo $PC['informacionPC']['ingreso'][$h] ?>" class="form-control" readonly type="date" name="ingreso-<?php echo ($h+1)?>">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Salida</label>
                              <input type="date" value="<?php echo $PC['informacionPC']['salida'][$h]?>" class="form-control" readonly  name="salida-<?php echo ($h+1)?>">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <?php for ($k = 0; $k<count($PC['nombreElementosPC']) ; $k++):?>
                              <div class="col-md-3">
                                    <!-- PANEL SCROLLING -->
                      <div id="panel-scrolling-demo" class="panel">
                        <div class="panel-heading">
                           <h3 class="panel-title"><?php echo $PC['nombreElementosPC'][$k] ?></h3>
                           <input type="text" hidden value="<?php echo $PC['nombreElementosPC'][$k] ?>" name="<?php echo 'put-'.$k ?>">
                        </div>
                        <div class="panel-body">
                          <div class="row">

                          <?php for ($q = 0; $q <count($PC['campos']) ; $q++): ?>
                           <div class="col-md-12">
                            <div class="form-group">
                              <label> <?php echo $PC['campos'][$q] ?> </label>
                              <input name="K-<?php echo ($h+1).'-'. $PC['campos'][$q].'-'.$PC['nombreElementosPC'][$k]  ?>"  class="form-control" type="text" value="<?php echo $PC['elementosPC'][$h+1][$PC['nombreElementosPC'][$k]][$PC['campos'][$q]] ?>" >
                            </div>
                           </div>
                             <?php endfor; ?><!--END FOR DE Q -->

                          </div>
                        </div>
                      </div>
                      <!-- END PANEL SCROLLING -->
                              </div>
                           <?php endfor; ?><!--END FOR DE K-->

                        </div>
                     </div>
                 </div><!--PANEL BODY DEL DIV COMPLETO-->
              </div>
           <?php endfor; ?> <!--END FOR DE H -->
 <?php endif; ?>