

<?php if(($tipo == "PC" || $tipo == 'Servidor') && $op =="Nuevo para asignar"): ?>
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
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Codigo</label>
                        <input type="text"  value="<?php echo $PC['informacionPC']['cod'][$h]?>" class="form-control"  name="code-<?php echo ($h+1)?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Origen</label>
                        <input type="text" readonly value="<?php echo $PC['informacionPC']['origen'][$h]?>" class="form-control"  name="origen-<?php echo ($h+1)?>">
                        <input type="text" hidden readonly value="<?php echo $PC['informacionPC']['origenID'][$h][0]['id_unidad']?>"  name="origenID-<?php echo ($h+1)?>">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Destino</label>
                        <input type="text" readonly value="<?php echo $PC['informacionPC']['destino'][$h]?> " class="form-control"  name="destino-<?php echo ($h+1)?>">
                        <input type="text" hidden readonly value="<?php echo $PC['informacionPC']['destinoID'][$h][0]['id_unidad']?>"  name="destinoID-<?php echo ($h+1)?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Ingreso</label>
                        <input  value="<?php echo $PC['informacionPC']['ingreso'][$h] ?>" class="form-control" readonly type="date" name="ingreso-<?php echo ($h+1)?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Salida</label>
                        <input type="date" value="<?php echo $PC['informacionPC']['salida'][$h]?>" class="form-control" readonly  name="salida-<?php echo ($h+1)?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Encargado</label>
                        <input type="text" value="<?php echo $PC['informacionPC']['encargado'][$h]?>" class="form-control"   name="encargado-<?php echo ($h+1)?>">
                      </div>
                    </div>

                  </div>
                  <hr>
                  <div class="row">
                    <br>
                    <div class="col-md-4">
                      <div id="panel-scrolling-demo" class="panel">
                        <div class="panel-heading">
                          <h3 class="panel-title">Descripción del sistema</h3>
                        </div>
                        <div class="panel-body">
                          <div class="form-group">
                            <label>Nombre equipo</label>
                            <input class="form-control" type="text" value="<?php echo $PC['descripcion_pc']['nombre_equipo'][$h]?>" name="<?php echo 'sistema-nombreEquipo-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Usuario sistema</label>
                            <input class="form-control" type="text" value="<?php echo $PC['descripcion_pc']['usuario_re'][$h]?>" name="<?php echo 'sistema-usuario_re-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Dominio</label>
                            <input class="form-control" type="text" value="<?php echo $PC['descripcion_pc']['dominio'][$h]?>" name="<?php echo 'sistema-dominio-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Fabricante</label>
                            <input class="form-control" type="text" value="<?php echo $PC['descripcion_pc']['fabricante'][$h]?>" name="<?php echo 'sistema-fabricante-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Sistema operativo</label>
                            <input class="form-control" type="text" value="<?php echo $PC['descripcion_pc']['sistema_op'][$h]?>" name="<?php echo 'sistema-sistema_op-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Nucleos</label>
                            <input class="form-control" type="text" value="<?php echo $PC['descripcion_pc']['nucleo'][$h]?>" name="<?php echo 'sistema-nucleos-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Memoria ram</label>
                            <input class="form-control" type="text" value="<?php echo $PC['descripcion_pc']['memoria_fisica'][$h]?>" name="<?php echo 'sistema-memoriaFisica-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Serial</label>
                            <input class="form-control" type="text" value="<?php echo $PC['descripcion_pc']['n_serie'][$h]?>" name="<?php echo 'sistema-serialN-'.($h+1)?>">
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-4">
                      <div id="panel-scrolling-demo" class="panel">
                        <div class="panel-heading">
                          <h3 class="panel-title">Hardware y adaptadores</h3>
                        </div>
                        <div class="panel-body">
                          <div class="form-group">
                            <label>Procesador</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['procesador'][$h]?>" name="<?php echo 'hard-procesador-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Velocidad GHZ</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['velocidad_GHZ'][$h]?>" name="<?php echo 'hard-velocidad_GHZ-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Fabricante procesador</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['fabri_pro'][$h]?>" name="<?php echo 'hard-fabricante_procesador-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Modelo motherboard</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['modelo_mod'][$h]?>" name="<?php echo 'hard-Modelo_Mod-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Marca ram</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['marca_ram'][$h]?>" name="<?php echo 'hard-ram_marca-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Dirección IP</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['dir_ip'][$h]?>" name="<?php echo 'hard-dir_ip-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Tarjeta extra</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['tarjeta_extra'][$h]?>" name="<?php echo 'hard-tarjeta_extra-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Marca monitor</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['marcaMonitor'][$h]?>" name="<?php echo 'hard-marcaMonitor-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Tipo monitor</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['tipo_monitor'][$h]?>" name="<?php echo 'hard-TipoMonitor-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Modelo/Serie</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['modelo_serie'][$h]?>" name="<?php echo 'hard-modelo_serie-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Disco físico</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['discoFisico'][$h]?>" name="<?php echo 'hard-discoFisico-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Capacidad del disco (GB)</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['capacidad'][$h]?>" name="<?php echo 'hard-capacidadDisco-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Marca disco duro</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['marcaDiscoDuro'][$h]?>" name="<?php echo 'hard-marcaDiscoDuro-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>DVD</label>
                            <input class="form-control" type="text" value="<?php echo $PC['hardware']['dvd'][$h]?>" name="<?php echo 'hard-dvd-'.($h+1)?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div id="panel-scrolling-demo" class="panel">
                        <div class="panel-heading">
                          <h3 class="panel-title">Software</h3>
                        </div>
                        <div class="panel-body">
                          <div class="form-group">
                            <label>Microsoft office (versión)</label>
                            <input class="form-control" type="text" value="<?php echo $PC['software']['microsoft'][$h]?>" name="<?php echo 'softwareoffice-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Winrar (versión)</label>
                            <input class="form-control" type="text" value="<?php echo $PC['software']['winrar'][$h]?>" name="<?php echo 'software-winrar-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Antivirus</label>
                            <input class="form-control" type="text" value="<?php echo $PC['software']['anti'][$h]?>" name="<?php echo 'software-antivirus-'.($h+1)?>">
                          </div>
                          <div class="form-group">
                            <label>Navegador</label>
                            <input class="form-control" type="text" value="<?php echo $PC['software']['navegador'][$h]?>" name="<?php echo 'software-fabri-'.($h+1)?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="text-center">
                      <h4>Perifericos</h4> <hr> <br>
                    </div>
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
