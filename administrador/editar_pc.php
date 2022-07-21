<?php
$conexion = mysqli_connect('localhost','root','','sisacad22');

$id_prog_clase = $_GET['id'];
$busc_pc = "SELECT * FROM cursos_docentes WHERE id='$id_prog_clase'";
$ejec_busc_pc = mysqli_query($conexion, $busc_pc); 
$res_busc_pc=mysqli_fetch_array($ejec_busc_pc);
$id_ud = $res_busc_pc['id_unidad_didactica'];
$id_d = $res_busc_pc['id_docente'];
$id_p = $res_busc_pc['id_periodo_acad'];
$cant_califi = $res_busc_pc['cant_calificaciones'];

//buscamos los datos por id
//periodo academico
$busc_per_acad= "SELECT * FROM periodo_academico WHERE id='$id_p'";
$e_b_per_acad = mysqli_query($conexion, $busc_per_acad);
$res_b_per_acad = mysqli_fetch_array($e_b_per_acad);
//docente
$busc_doc= "SELECT * FROM docentes WHERE id='$id_d'";
$e_b_doc= mysqli_query($conexion, $busc_doc);
$res_b_doc = mysqli_fetch_array($e_b_doc);
//unidad didactica
$busc_ud= "SELECT * FROM unidades_didacticas WHERE id='$id_ud'";
$e_b_ud= mysqli_query($conexion, $busc_ud);
$res_b_ud = mysqli_fetch_array($e_b_ud);
$id_carrera = $res_b_ud['id_carrera'];
$id_semestre = $res_b_ud['id_semestre'];

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
	  
    <title>Editar<?php include ("../include/header_title.php"); ?></title>
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
    <!-- Script obtenido desde CDN jquery -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

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
                    <h2 align="center">Editar Datos de Programación de Clases</h2>
                   

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    
                    
                  <div class="x_panel">
                    
                  
                  <div class="x_content">
                    <br />
                    <form role="form" action="operaciones/actualizar_curso_docente.php" class="form-horizontal form-label-left input_mask" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $id_prog_clase; ?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Periodo Académico : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="periodo" value="<?php echo $id_p;?>" required="required" disabled>
                            <option></option>
                          <?php 
                            $busc_per= "SELECT * FROM periodo_academico";
                            $ejec_busc_per = mysqli_query($conexion, $busc_per);
                            while ($res__busc_per = mysqli_fetch_array($ejec_busc_per)) {
                              $id_per = $res__busc_per['id'];
                              $per = $res__busc_per['periodo'];
                              ?>
                              <option value="<?php echo $id_per;
                              ?>"<?php if ($id_per == $id_p):
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
                          <select class="form-control"  id="carrera" name="carrera" value="<?php echo $id_carrera;?>" required="required">
                            <option></option>
                          <?php 
                            $busc_carr= "SELECT * FROM carrera_profesional";
                            $ejec_busc_carr = mysqli_query($conexion, $busc_carr);
                            while ($res__busc_carr = mysqli_fetch_array($ejec_busc_carr)) {
                              $id_carr = $res__busc_carr['id'];
                              $carr = $res__busc_carr['nombre'];
                              ?>
                              <option value="<?php echo $id_carr;
                              ?>" <?php if ($id_carr == $id_carrera):
                                echo 'selected="selected"';
                              endif ?>><?php echo $carr; ?></option>
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
                          <select class="form-control" id="semestre" name="semestre" value="<?php echo $id_semestre;?>" required="required">
                            <option></option>
                          <?php 
                            $busc_sem= "SELECT * FROM semestre";
                            $ejec_busc_sem = mysqli_query($conexion, $busc_sem);
                            while ($res_busc_sem = mysqli_fetch_array($ejec_busc_sem)) {
                              $id_sem = $res_busc_sem['id'];
                              $sem = $res_busc_sem['semestre'];
                              ?>
                              <option value="<?php echo $id_sem;
                              ?>" <?php if ($id_sem == $id_semestre):
                                echo 'selected="selected"';
                              endif ?>><?php echo $sem; ?></option>
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
                          <select class="form-control" id="ud" name="ud" value="<?php echo $id_ud;?>" required="required">
                            <option></option>
                            <?php 
                            $busc_ud= "SELECT * FROM unidades_didacticas WHERE id_carrera = '$id_carrera' AND id_semestre= '$id_semestre' ORDER BY id";
                            $ejec_busc_ud = mysqli_query($conexion, $busc_ud);
                            while ($res_busc_ud = mysqli_fetch_array($ejec_busc_ud)) {
                              $id_udi = $res_busc_ud['id'];
                              $udi = $res_busc_ud['unidad_didactica'];
                              ?>
                              <option value="<?php echo $id_udi;
                              ?>" <?php if ($id_udi == $id_semestre):
                                echo 'selected="selected"';
                              endif ?>><?php echo $udi; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Docente : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="docente" value="<?php echo $id_d;?>" required="required">
                            <option></option>
                          <?php 
                            $busc_doc_r= "SELECT * FROM docentes";
                            $ejec_busc_doc_r = mysqli_query($conexion, $busc_doc_r);
                            while ($res_busc_doc_r = mysqli_fetch_array($ejec_busc_doc_r)) {
                              $id_doc_r = $res_busc_doc_r['id'];
                              $doc_r = $res_busc_doc_r['apellidos_nombre'];
                              ?>
                              <option value="<?php echo $id_doc_r;
                              ?>" <?php if ($id_doc_r == $id_d):
                                echo 'selected="selected"';
                              endif ?>><?php echo $doc_r; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <br><br>
                        </div>
                      </div>

                      
                      <div align="center">
                        
                          <a href="javascript:history.back(-1);" class="btn btn-primary">Cancelar</a>
                          <button type="submit" class="btn btn-primary">Guardar</button>
                      </div>
                    </form>
                  </div>
                </div>
                          <!--FIN DE CONTENIDO DE MODAL-->
                 
            


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
    <!--script para obtener las unidades didacticas, dependiendo de la carrera y semestre seleccionado-->
    <script type="text/javascript">
      $(document).ready(function(){
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
