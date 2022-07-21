
 <!--MODAL EDITAR-->
  <div class="modal fade edit_<?php echo $res_busc_mod['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel" align="center">Editar Datos del Módulo Formativo</h4>
                        </div>
                        <div class="modal-body">
                          <!--INICIO CONTENIDO DE MODAL-->
                  <div class="x_panel">
                    
                  
                  <div class="x_content">
                    <br />
                    <form role="form" action="operaciones/actualizar_modulo_formativo.php" class="form-horizontal form-label-left input_mask" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $res_busc_mod['id']; ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Carrera Profesional : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="carrera" value="<?php echo $res_busc_mod['id_carrera_profesional']; ?>" required="">
                            <option></option>
                          <?php 
                            $busc_car_prof = "SELECT * FROM carrera_profesional";
                            $ejec_busc_car_prof = mysqli_query($conexion, $busc_car_prof);
                            while ($res_busc_car_prof = mysqli_fetch_array($ejec_busc_car_prof)) {
                              $id_car_prof = $res_busc_car_prof['id'];
                              $car_prof = $res_busc_car_prof['nombre'];
                              ?>
                              <option value="<?php echo $id_car_prof;
                              ?>"<?php if($id_car_prof == $id_carrera){
                                echo 'selected=""';
                              };?>><?php echo $car_prof; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nro Módulo : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="nro_modulo" required="" value="<?php echo $res_busc_mod['nro_modulo']; ?>" maxlength="3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="nom_mod" required="" value="<?php echo $res_busc_mod['nombre']; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <br>
                          <br>
                        </div>
                      </div>
                      
                     
                      
                      <div align="center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button class="btn btn-primary" type="reset">Deshacer Cambios</button>
                          <button type="submit" class="btn btn-primary">Guardar</button>
                      </div>
                    </form>
                  </div>
                </div>
                          <!--FIN DE CONTENIDO DE MODAL-->
                        </div>
                      </div>
                    </div>
                  </div>
