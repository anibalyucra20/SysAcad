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
	  
    <title>Módulo Formativo<?php include ("../include/header_title.php"); ?></title>
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
                    <h2 align="center">Módulos Formativos</h2>
                    <button class="btn btn-success" data-toggle="modal" data-target=".registrar"><i class="fa fa-plus-square"></i> Nuevo</button>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Identificador</th>
                          <th>Carrera Profesional</th>
                          <th>Nro de Módulo</th>
                          <th>Nombre</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $busc_mod = "SELECT * FROM modulo_formativo";
                          $ejec_busc_mod = mysqli_query($conexion, $busc_mod); 
                          while ($res_busc_mod=mysqli_fetch_array($ejec_busc_mod)){
                        ?>
                        <tr>
                          <td><?php echo $res_busc_mod['id']; ?></td>
                          <?php 
                          $id_carrera = $res_busc_mod['id_carrera_profesional'];
                          $busc_carrera= "SELECT * FROM carrera_profesional WHERE id='$id_carrera'";
                          $ejec_busc_carrera = mysqli_query($conexion, $busc_carrera);
                          $res_busc_carrera =mysqli_fetch_array($ejec_busc_carrera);
                          ?>
                          <td><?php echo $res_busc_carrera['nombre']; ?></td>
                          <td><?php echo $res_busc_mod['nro_modulo']; ?></td>
                          <td><?php echo $res_busc_mod['nombre']; ?></td>
                          <td>
                            <button class="btn btn-success" data-toggle="modal" data-target=".edit_<?php echo $res_busc_mod['id']; ?>"><i class="fa fa-pencil-square-o"></i> Editar</button></td>
                        </tr>  
                        <?php
                         include('include/acciones_modulo_formativo.php');
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
                          <h4 class="modal-title" id="myModalLabel" align="center">Registrar Módulo Formativo</h4>
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
                    <form role="form" action="operaciones/registrar_modulo_formativo.php" class="form-horizontal form-label-left input_mask" method="POST" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Carrera Profesional : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="carrera" value="" required="required">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nro de Módulo : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="n_modulo" required="required" maxlength="3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="nombre_mod" required="required" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
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
     <?php mysqli_close($conexion); ?>
  </body>
</html>
