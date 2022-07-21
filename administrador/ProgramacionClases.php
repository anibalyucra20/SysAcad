<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="es-ES">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Programación de Clases<?php include ("../include/header_title.php"); ?></title>
    <!--icono en el titulo-->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <!-- Bootstrap -->
    <link href="../Gentella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../Gentella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../Gentella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../Gentella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../Gentella/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../Gentella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../Gentella/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../Gentella/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../Gentella/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    
    <!-- Custom Theme Style -->
    <link href="../Gentella/build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!--menu-->
          <?php 
          include ("include/menu.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="">
                    <h2 align="center">Programación de clases</h2>
                    <button class="btn btn-success" data-toggle="modal" data-target=".registrar"><i class="fa fa-plus-square"></i> Nuevo</button>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Identificador</th>
                          <th>Periodo Académico</th>
                          <th>Unidad Didáctica</th>
                          <th>Carrera Profesional</th>
                          <th>Semestre</th>
                          <th>Docente</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          //buscamos el periodo actual
                          $busc_per_ac= "SELECT * FROM presente_periodo_academico ORDER BY id LIMIT 1";
                          $e_b_per_ac = mysqli_query($conexion, $busc_per_ac);
                          $res_b_per_ac = mysqli_fetch_array($e_b_per_ac);
                          $id_periodo_actual = $res_b_per_ac['id_periodo_acad'];
                          //buscamos datos para la tabla
                          $busc_cur_doc = "SELECT * FROM cursos_docentes";
                          $ejec_busc_cur_doc = mysqli_query($conexion, $busc_cur_doc); 
                          while ($res_busc_cur_doc=mysqli_fetch_array($ejec_busc_cur_doc)){
                          $id_curso_docente = $res_busc_cur_doc['id'];
                          $id_periodo = $res_busc_cur_doc['id_periodo_acad'];
                          $id_ud = $res_busc_cur_doc['id_unidad_didactica'];
                          $id_docente = $res_busc_cur_doc['id_docente'];
                          //buscamos los datos por id
                          //periodo academico
                          $busc_per_acad= "SELECT * FROM periodo_academico WHERE id='$id_periodo'";
                          $e_b_per_acad = mysqli_query($conexion, $busc_per_acad);
                          $res_b_per_acad = mysqli_fetch_array($e_b_per_acad);
                          //docente
                          $busc_doc= "SELECT * FROM docentes WHERE id='$id_docente'";
                          $e_b_doc= mysqli_query($conexion, $busc_doc);
                          $res_b_doc = mysqli_fetch_array($e_b_doc);
                          //unidad didactica
                          $busc_ud= "SELECT * FROM unidades_didacticas WHERE id='$id_ud'";
                          $e_b_ud= mysqli_query($conexion, $busc_ud);
                          $res_b_ud = mysqli_fetch_array($e_b_ud);
                          $id_carrera = $res_b_ud['id_carrera'];
                          $id_semestre = $res_b_ud['id_semestre'];
                          //carrera
                          $busc_car= "SELECT * FROM carrera_profesional WHERE id='$id_carrera'";
                          $e_b_car= mysqli_query($conexion, $busc_car);
                          $res_b_car = mysqli_fetch_array($e_b_car);
                          //semestre
                          $busc_sem= "SELECT * FROM semestre WHERE id='$id_semestre'";
                          $e_b_sem= mysqli_query($conexion, $busc_sem);
                          $res_b_sem = mysqli_fetch_array($e_b_sem);
                        ?>
                        <tr>
                          <td><?php echo $res_busc_cur_doc['id']; ?></td>
                          <td><?php echo $res_b_per_acad['periodo']; ?></td>
                          <td><?php echo $res_b_ud['unidad_didactica']; ?></td>
                          <td><?php echo $res_b_car['nombre']; ?></td>
                          <td><?php echo $res_b_sem['semestre'];?></td>
                          <td><?php echo $res_b_doc['apellidos_nombre']; ?></td>
                          <td>
                            <a class="btn btn-success" href="editar_pc.php?id=<?php echo $res_busc_cur_doc['id']; ?>"><i class="fa fa-pencil-square-o"></i> Editar</a></td>
                        </tr>  
                        <?php
                         //include('include/acciones_periodo_academico.php');
                          };
                        ?>

                      </tbody>
                    </table>
                    

                    <!--MODAL REGISTRAR-->
  <div class="modal fade registrar" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel" align="center">Datos de la Programación de Clases</h4>
                        </div>
                        <div class="modal-body">
                          <!--INICIO CONTENIDO DE MODAL-->
                  <div class="x_panel">
                    
                  <div class="" align="center">
                    <h2 ></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form role="form" action="operaciones/registrar_curso_docente.php" class="form-horizontal form-label-left input_mask" method="POST" >
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Periodo Académico : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="periodo" value="" required="required" disabled>
                            <option></option>
                          <?php 
                            $busc_per= "SELECT * FROM periodo_academico";
                            $ejec_busc_per = mysqli_query($conexion, $busc_per);
                            while ($res__busc_per = mysqli_fetch_array($ejec_busc_per)) {
                              $id_per = $res__busc_per['id'];
                              $per = $res__busc_per['periodo'];
                              ?>
                              <option value="<?php echo $id_per;
                              ?>"<?php if ($id_per == $id_periodo_actual):
                                echo 'selected="selected"';
                              endif ?>><?php echo $per; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Carrera Profesional : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control"  id="carrera" name="carrera" value="" required="required">
                            <option></option>
                          <?php 
                            $busc_carr= "SELECT * FROM carrera_profesional";
                            $ejec_busc_carr = mysqli_query($conexion, $busc_carr);
                            while ($res__busc_carr = mysqli_fetch_array($ejec_busc_carr)) {
                              $id_carr = $res__busc_carr['id'];
                              $carr = $res__busc_carr['nombre'];
                              ?>
                              <option value="<?php echo $id_carr;
                              ?>"><?php echo $carr; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Semestre : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" id="semestre" name="semestre" value="" required="required">
                            <option></option>
                          <?php 
                            $busc_sem= "SELECT * FROM semestre";
                            $ejec_busc_sem = mysqli_query($conexion, $busc_sem);
                            while ($res_busc_sem = mysqli_fetch_array($ejec_busc_sem)) {
                              $id_sem = $res_busc_sem['id'];
                              $sem = $res_busc_sem['semestre'];
                              ?>
                              <option value="<?php echo $id_sem;
                              ?>"><?php echo $sem; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unidad Didáctica : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" id="ud" name="ud" value="" required="required">
                            <option></option>
                          </select>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Docente : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="docente" value="" required="required">
                            <option></option>
                          <?php 
                            $busc_doc_r= "SELECT * FROM docentes";
                            $ejec_busc_doc_r = mysqli_query($conexion, $busc_doc_r);
                            while ($res_busc_doc_r = mysqli_fetch_array($ejec_busc_doc_r)) {
                              $id_doc_r = $res_busc_doc_r['id'];
                              $doc_r = $res_busc_doc_r['apellidos_nombre'];
                              ?>
                              <option value="<?php echo $id_doc_r;
                              ?>"><?php echo $doc_r; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <br><br>
                        </div>
                      </div>
                      
                      <div align="center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          
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

<!-- FIN MODAL REGISTRAR-->

                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- /page content -->

        <!-- footer content 
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
         /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../Gentella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../Gentella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../Gentella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../Gentella/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../Gentella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../Gentella/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../Gentella/vendors/moment/min/moment.min.js"></script>
    <script src="../Gentella/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../Gentella/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../Gentella/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../Gentella/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../Gentella/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../Gentella/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../Gentella/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../Gentella/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../Gentella/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../Gentella/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../Gentella/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../Gentella/build/js/custom.min.js"></script>


	  <!--prueba tabla-->
    
    <script src="../include/tabla/jquery.dataTables.min.js"></script>
    <script src="../include/tabla/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
    $('#example').DataTable({
      "language":{
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
      }
    });

    } );
    </script>
    </script>
    <!--script para obtener las unidades didacticas, dependiendo de la carrera y semestre seleccionado-->
    <script type="text/javascript">
      $(document).ready(function(){
        recargarlista();
        $('#semestre').change(function(){
          recargarlista();
        }),
        $('#carrera').change(function(){
          recargarlista();
        });
      })
    </script>
    <script type="text/javascript">
     function recargarlista(){
      var carr = $('#carrera').val();
      var sem = $('#semestre').val();
      $.ajax({
        type:"POST",
        url:"operaciones/obtener_ud.php",
        data: {carr: carr, sem: sem},
          success:function(r){
            $('#ud').html(r);
          }
      });
     }
     

    </script>
     <?php mysqli_close($conexion); ?>
  </body>
</html>
