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
	  
    <title>unidades didácticas<?php include ("../include/header_title.php"); ?></title>
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
                    <h2 align="center">Unidades Didácticas</h2>
                    <button class="btn btn-success" data-toggle="modal" data-target=".registrar"><i class="fa fa-plus-square"></i> Nuevo</button>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Identificador</th>
                          <th>Unidad Didactica</th>
                          <th>Carrera Profesional</th>
                          <th>Módulo</th>
                          <th>Semestre</th>
                          <th>Créditos</th>
                          <th>Horas</th>
                          <th>Curricular</th>
                          <th>Orden</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $busc_ud = "SELECT * FROM unidades_didacticas";
                          $ejec_busc_ud = mysqli_query($conexion, $busc_ud); 
                          while ($res_busc_ud=mysqli_fetch_array($ejec_busc_ud)){
                        ?>
                        <tr>
                          <td><?php echo $res_busc_ud['id']; ?></td>
                          <td><?php echo $res_busc_ud['unidad_didactica']; ?></td>
                          <?php 
                          $id_carrera = $res_busc_ud['id_carrera'];
                          $busc_carrera = "SELECT * FROM carrera_profesional WHERE id='$id_carrera'";
                          $ejec_busc_carrera = mysqli_query($conexion, $busc_carrera);
                          $res_busc_carrera =mysqli_fetch_array($ejec_busc_carrera);
                          ?>
                          <td><?php echo $res_busc_carrera['nombre']; ?></td>
                          <?php 
                          $id_modulo = $res_busc_ud['id_modulo'];
                          $busc_modulo = "SELECT * FROM modulo_formativo WHERE id='$id_modulo'";
                          $ejec_busc_modulo = mysqli_query($conexion, $busc_modulo);
                          $res_busc_modulo =mysqli_fetch_array($ejec_busc_modulo);
                          ?>
                          <td><?php echo $res_busc_modulo['nro_modulo']; ?></td>
                          <?php 
                          $id_semestre = $res_busc_ud['id_semestre'];
                          $busc_semestre = "SELECT * FROM semestre WHERE id='$id_semestre'";
                          $ejec_busc_semestre= mysqli_query($conexion, $busc_semestre);
                          $res_busc_semestre =mysqli_fetch_array($ejec_busc_semestre);
                          ?>
                          <td><?php echo $res_busc_semestre['semestre']; ?></td>
                          <td><?php echo $res_busc_ud['creditos']; ?></td>
                          <td><?php echo $res_busc_ud['horas']; ?></td>
                          <td><?php echo $res_busc_ud['curricular']; ?></td>
                          <td><?php echo $res_busc_ud['orden']; ?></td>
                          <td>
                            <a class="btn btn-success" href="editar_ud.php?id=<?php echo $res_busc_ud['id']; ?>"><i class="fa fa-pencil-square-o"></i> Editar</a></td>
                        </tr>  
                        <?php
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
                          <h4 class="modal-title" id="myModalLabel" align="center">Registrar Unidad Didáctica</h4>
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
                    <form role="form" action="operaciones/registrar_unidad_didactica.php" class="form-horizontal form-label-left input_mask" method="POST" >
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unidad Didáctica : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="ud" required="required" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Carrera Profesional : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" id="carrera_m" name="carrera_m" value="" required="required">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Módulo Formativo : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" id="modulo" name="modulo" value="" required="required">
                            <!--las opciones se cargan con ajax y javascript  dependiendo de la carrera elegida,verificar en la parte final-->
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Créditos : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" name="creditos" required="required">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Horas : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" name="horas" required="required">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Curricular : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="curricular" required="required" value="A" maxlength="1" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <br>
                          <br>
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
    <!--script para obtener los modulos dependiendo de la carrera que seleccione-->
    <script type="text/javascript">
      $(document).ready(function(){
        recargarlista();
        $('#carrera_m').change(function(){
          recargarlista();
        });
      })
    </script>
    <script type="text/javascript">
     function recargarlista(){
      $.ajax({
        type:"POST",
        url:"operaciones/obtener_modulos.php",
        data:"id_carrera="+ $('#carrera_m').val(),
          success:function(r){
            $('#modulo').html(r);
          }
      });
     }
     

    </script>
    
     <?php mysqli_close($conexion); ?>
  </body>
</html>
