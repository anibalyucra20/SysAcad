
 <!--MODAL EDITAR-->
  <div class="modal fade edit_<?php echo $res_busc_per_acad['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel" align="center">Editar Datos del Periodo Académico</h4>
                        </div>
                        <div class="modal-body">
                          <!--INICIO CONTENIDO DE MODAL-->
                  <div class="x_panel">
                    
                  
                  <div class="x_content">
                    <br />
                    <form role="form" action="operaciones/actualizar_presente_periodo.php" class="form-horizontal form-label-left input_mask" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $res_busc_per_acad['id']; ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lugar y Fecha - Nóminas : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="lug_fech_nomina" required="" value="<?php echo $res_busc_per_acad['lug_fech_nominas']; ?>">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lugar y Fecha Actas : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="lug_fech_actas" required="" value="<?php echo $res_busc_per_acad['lug_fech_actas']; ?>">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lugar y Fecha Actas Consolidadas : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="lug_fech_act_cons" required="" value="<?php echo $res_busc_per_acad['lug_fech_acta_cons']; ?>">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Periodo Académico : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="id_per_acad" value="<?php echo $res_busc_per_acad['id_periodo_acad']; ?>" required="">
                            <option></option>
                          <?php 
                            $busc_per_acad = "SELECT * FROM periodo_academico";
                            $ejec_busc_per_acad = mysqli_query($conexion, $busc_per_acad);
                            while ($res_busc_per = mysqli_fetch_array($ejec_busc_per_acad)) {
                              $id_per = $res_busc_per['id'];
                              $per = $res_busc_per['periodo'];
                              ?>
                              <option value="<?php echo $id_per;
                              ?>"<?php if($id_per == $id_periodo){
                                echo 'selected=""';
                              };?>><?php echo $per; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nro. Correlativo Matrícula : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="correlativo" required="" value="<?php echo $res_busc_per_acad['nro_correleativo_matricula']; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="2">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Última fecha de modificación : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="date" class="form-control" value="<?php echo $res_busc_per_acad['fecha_modificacion']; ?>" readonly="readonly">
                          <br><br>
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
