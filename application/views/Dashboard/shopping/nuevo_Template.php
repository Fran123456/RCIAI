<!--FLUJO NUEVO OPCION 1-->
            <div v-if='radio == "Nuevo"'> <!--INICIO IF DE OPCION 1 PERIFERICO-->
              <div v-if='validar1 == true'>
                <!--FLUJO SI ES UN PERIFERICO-->
                <div v-if="selected == 'Periferico' || selected == 'Disco duro externo' || selected == 'Laptop'" class="row">
                  <!-- PANEL DEFAULT -->
                   <div v-for="item in lists_perifericos"  class="col-md-12">
                      <div  class="panel">
                      <div class="panel-heading">
                        <h3 class="panel-title">{{selected}} #{{item.id}}</h3>
                        <div class="right">
                          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        </div>
                      </div>
                      <div class="panel-body">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Serial</label>
                            <input type="text" required name='serial-{{item.id - 1}}' class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" required name='nombre-{{item.id - 1}}' class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Marca</label>
                            <input type="text" name='marca-{{item.id - 1}}' class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Capacidad</label>
                            <input type="text" name='capacidad-{{item.id - 1}}' class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Tipo</label>
                            <select v-if="selected == 'Periferico'" class="form-control" name="tipo-{{item.id - 1}}">
                                        <option value="MOUSE">MOUSE</option>
                                        <option value="TECLADO">TECLADO</option>
                                        <option value="MOUSE">MONITOR</option>
                                        <option value="USB">USB</option>
                                        <option value="MEMORIA SD">MEMORIA SD</option>
                                        <option value="LECTOR DVD/CD">LECTOR DVD/CD</option>
                                        <option value="IMPRESORES MATRICIALES">IMPRESORES MATRICIALES</option>
                                        <option value="IMPRESORES MULTIFUNCIONALES">IMPRESORES MULTIFUNCIONALES</option>
                                        <option value="IMPRESOR DESJEKT">IMPRESOR DESJEKT</option>
                                        <option value="SCANNER">SCANNER</option>
                                        <option value="WEBCAN">WEBCAN</option>
                                        <option value="PARLANTES">PARLANTES</option>
                                        <option value="LECTOR PARA MEMORIA SD">LECTOR PARA MEMORIA SD</option>
                                        <option value="UPS">UPS</option>
                                        <option value="AUDIFONOS">AUDIFONOS</option>
                                        <option value="MEMORIA SD">MEMORIA SD</option>
                                        <option value="PROYECTOR">PROYECTOR</option>
                                        <option value="FAX">FAX</option>
                                        <option value="MICROFONO">MICROFONO</option>
                                        <option value="OTRO">OTRO</option>
                             </select>
                            <input v-if="selected == 'Disco duro externo'" value="DISCO DURO EXTERNO" type="text" name='tipo-{{item.id - 1}}' class="form-control">

                            <input v-if="selected == 'Laptop'" value="LAPTOP" type="text" name='tipo-{{item.id - 1}}' class="form-control"> 
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Velocidad</label>
                            <input type="text" name='velocidad-{{item.id - 1}}' class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Estado</label>
                            <input type="text" value="nuevo" name='estatus-{{item.id - 1}}' class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Fecha ingreso</label>
                            <input type="date" value="{{fecha_compra}}" required name='fecha_ingreso-{{item.id - 1}}' class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Origen</label>
                            <input readonly type="text" name='origenF-{{item.id - 1}}' value="nuevo" class="form-control">
                            <input hidden type="text" name="origen-{{item.id - 1}}" value="4">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Fecha de salida</label>
                            <input type="date" name='fecha_salida-{{item.id - 1}}' class="form-control">

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Destino</label>
                            <input type="text" value="Bodega informatica" name='destino_name-{{item.id - 1}}' class="form-control">
                            <input type="text" hidden name="destino-{{item.id - 1}}" value="1">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END PANEL DEFAULT -->
                  <div class="col-md-12">
                    <button class="btn btn-success" type="submit">Enviar</button>
                  </div>
                </div>
                <!--FLUJO SI ES UN PERIFERICO-->




                <!--FLUJO SI ES UNA PC O SERVIDOR-->
                <div v-if="selected == 'PC' || selected == 'Servidor'" class="row">
                  <!--CAPTURAMOS LOS NOMBRES DE LOS ELEMENTOS DEL PC -->
                  <input hidden="" v-for="(item4, data) in seleccionPC" type="" name="{{item4}}-A" value="{{data}}">
                  <!-- PANEL DEFAULT -->
                   <div v-for="item in lists_pc"  class="col-md-12">
                      <div class="panel">
                      <div class="panel-heading">
                        <h3 class="panel-title">{{selected}} #{{item.id}}</h3>
                        <div class="right">
                          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        </div>
                      </div>
                      <div class="panel-body">
                          <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Origen</label>
                                    <input type="text" readonly class="form-control" value="nuevo" name="OrigenPC_Falso-{{item.id}}">
                                    <input hidden type="text" value="4" name="OrigenPC-{{item.id}}">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Destino</label>
                                    <input type="text" readonly class="form-control" value="bodega de informatica" name="destinoPC_Falso-{{item.id}}">
                                    <input hidden type="text" value="1" name="destinoPC-{{item.id}}">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Fecha ingreso</label>
                                    <input type="date"  class="form-control" value="{{fecha_compra}}" name="ingreso-{{item.id}}">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Fecha de salida</label>
                                    <input type="date"  class="form-control"  name="salida-{{item.id}}">
                                  </div>
                                </div>
                           </div>
                        <br>
                         <!--REFERENTE A CADA COMPONENTE DEL PC-->
                         <!-- Button trigger modal -->
                         <button v-for='(item2, index) in seleccionPC' type="button" class="btn btn-primary space text-center PC{{item.id - 1}}-{{item2}}-{{index}}" data-toggle="modal" data-target="#{{item.id - 1}}-{{item2}}-{{index}}">
                            {{index}}
                        </button>

                       <!-- Modal -->
                        <div v-for='(item3, index) in seleccionPC' class="modal fade" id="{{item.id - 1}}-{{item3}}-{{index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{index}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Serial</label>
                                      <input  type="text" id="serial-{{item.id - 1}}-{{item3}}-{{index}}" required class="form-control"  name="serial-{{item.id}}-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Nombre</label>
                                      <input type="text" id="nombre-{{item.id - 1}}-{{item3}}-{{index}}" required class="form-control"  name="nombre-{{item.id}}-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Marca</label>
                                      <input type="text"  class="form-control"  name="marca-{{item.id}}-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Capacidad</label>
                                      <input type="text"  class="form-control"  name="capacidad-{{item.id}}-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Tipo</label>
                                      <input type="text" value="{{index}}" readonly="" class="form-control"  name="tipo-{{item.id}}-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Velocidad</label>
                                      <input type="text" class="form-control"  name="velocidad-{{item.id}}-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Estado</label>
                                      <input type="text" value="nuevo" class="form-control"  name="estado-{{item.id}}-{{item3}}-{{index}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="{{item.id - 1}}-{{item3}}-{{index}}" onclick="color(this);" class="btn btn-primary">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                        <!--REFERENTE A CADA COMPONENTE DEL PC-->
                      </div>
                    </div>
                  </div>
                  <!-- END PANEL DEFAULT -->
                    <div class="col-md-12">
                        
                        <!--INPUTS NECESARIOS -->
                        <input type="text" hidden="" name="cantidadElementoPC_x" value="{{ seleccionPC.length }}"> <!--CUANTOS ELEMENTOS TIENE EL PC-->
                        <input type="text" hidden=""  name="cantidadPC_x" value="{{lists_pc.length}}"> <!--CUANTAS PC HAY-->

                     <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                <!--FLUJO SI ES UNA PC O SERVIDOR-->


              </div>
            </div><!--INICIO IF DE OPCION 1-->
          </div>
