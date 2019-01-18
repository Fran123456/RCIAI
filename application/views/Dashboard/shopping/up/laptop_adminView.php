 <?php if($op =="Nuevo para asignar" &&   $tipo == 'Laptop'): ?>

            <div class="row">

                <input type="text" hidden value="<?php echo $laptop['cantidad'] ?>" name="cantidadPerifericos" >
                <?php for ($i = 0; $i <$laptop['cantidad'] ; $i++): ?>
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
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo $tipo; ?> # <?php echo $i+1 ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                 <label>Codigo disco</label>
                                 <input required type="text"  class="form-control" value="<?php echo $laptop[$i]['identificador']?>" name=" <?php echo 'identificador-'.($i+1)?>">
                                 </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                 <label>Encargado de puesto</label>
                                 <input required type="text" class="form-control" value="<?php echo$laptop[$i]['encargado_puesto']?>" name=" <?php echo 'encargado_puesto-'.($i+1)?>">
                                 </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                <label>serial</label>
                                <input required type="text" class="form-control" value="<?php echo $laptop[$i]['serial']?>" name="<?php echo 'serial-'.($i+1)?>">
                              </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Fecha ingreso</label>
                                    <input type="date" class="form-control" value="<?php echo$laptop[$i]['fecha_ingreso']?>" name="<?php echo 'ingresofecha-'.($i+1)?>">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                   <div class="form-group">
                                    <label>Fecha salida</label>
                                    <input type="date" class="form-control" value="<?php echo $laptop[$i]['fecha_salida']?>" name="<?php echo'salidafecha-'.($i+1)?>">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Destino</label>
                                    <input readonly type="text" class="form-control" value="<?php echo $laptop[$i]['destinoString'][0]['unidad']?>" name="<?php echo 'destino-'.($i+1)?>">

                                    <!--ESTE INPUT ES IMPORTANTE PLOX-->
                                    <input hidden type="text" value="<?php echo $laptop[$i]['destino']?>" name="<?php echo 'destinoID-'.($i+1)?>">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Origen</label>
                                    <input readonly type="text" class="form-control" value="<?php echo $laptop[$i]['origenString'][0]['unidad']?>  " name="<?php echo 'origen-'.($i+1)?>">
                                    <!--ESTE INPUT ES IMPORTANTE PLOX-->
                                    <input hidden type="text" value="<?php echo $laptop[$i]['origen']?>" name="<?php echo 'origenID-'.($i+1)?>">
                                   </div>
                                </div>
                                <div class="col-md-2">
                                   <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" class="form-control" value="<?php echo $laptop[$i]['marca']?>" name="<?php echo'marca-'.($i+1)?>">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                   <div class="form-group">
                                    <label>nombre laptop</label>
                                    <input type="text" class="form-control" value="<?php echo $laptop[$i]['nombreLap']?>" name="<?php echo'nombreLap-'.($i+1)?>">
                                  </div>
                                </div>
                              </div>

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
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['nombre_equipo']?>" name="<?php echo 'sistema-nombreEquipo-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Usuario sistema</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['usuario_re']?>" name="<?php echo 'sistema-usuario_re-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Dominio</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['dominio']?>" name="<?php echo 'sistema-dominio-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Fabricante</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['fabricante']?>" name="<?php echo 'sistema-fabricante-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Sistema operativo</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['sistema_op']?>" name="<?php echo 'sistema-sistema_op-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Nucleos</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['nucleos']?>" name="<?php echo 'sistema-nucleos-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Memoria ram</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['memoriaFisica']?>" name="<?php echo 'sistema-memoriaFisica-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Serial</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['seriaN']?>" name="<?php echo 'sistema-serialN-'.($i+1)?>">
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
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['procesador']?>" name="<?php echo 'hard-procesador-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Velocidad GHZ</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['velocidad_GHZ']?>" name="<?php echo 'hard-velocidad_GHZ-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Fabricante procesador</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['fabricante_procesador']?>" name="<?php echo 'hard-fabricante_procesador-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Modelo motherboard</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['Modelo_Mod']?>" name="<?php echo 'hard-Modelo_Mod-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Marca ram</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['ram_marca']?>" name="<?php echo 'hard-ram_marca-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Dirección IP</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['dir_ip']?>" name="<?php echo 'hard-dir_ip-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Tarjeta extra</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['tarjeta_extra']?>" name="<?php echo 'hard-tarjeta_extra-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Marca monitor</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['marcaMonitor']?>" name="<?php echo 'hard-marcaMonitor-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Tipo monitor</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['TipoMonitor']?>" name="<?php echo 'hard-TipoMonitor-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Modelo/Serie</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['modelo_serie']?>" name="<?php echo 'hard-modelo_serie-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Disco físico</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['discoFisico']?>" name="<?php echo 'hard-discoFisico-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Capacidad del disco (GB)</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['capacidadDisco']?>" name="<?php echo 'hard-capacidadDisco-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Marca disco duro</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['marcaDiscoDuro']?>" name="<?php echo 'hard-marcaDiscoDuro-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>DVD</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['dvd']?>" name="<?php echo 'hard-dvd-'.($i+1)?>">
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
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['office']?>" name="<?php echo 'softwareoffice-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Winrar (versión)</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['winrar']?>" name="<?php echo 'software-winrar-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Antivirus</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['antivirus']?>" name="<?php echo 'software-antivirus-'.($i+1)?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Navegador</label>
                                        <input class="form-control" type="text" value="<?php echo $laptop[$i]['fabri']?>" name="<?php echo 'software-fabri-'.($i+1)?>">
                                      </div>
                                    </div>
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