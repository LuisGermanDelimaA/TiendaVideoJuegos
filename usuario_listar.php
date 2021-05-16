<?php
  error_reporting(E_ERROR);
  require_once "modelos/Usuarios.php";;
  $obj_pers=new Usuarios();
  $lisPers=$obj_pers->buscar();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/global.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <?php 
    include "partial/menu.php";
   ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php 
          include "partial/top.php";
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">



    <div class="row">
      <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-2" style="display: inline-flex">
              <div class="page-title">
                  <h5 class="m-0 font-weight-bold text-primary"> Listado de Usuarios </h5>
              </div>
              <div class="lista_btn">
                
                  <a id="btn_crear_nuevo" class="btn btn-secundario " href="persona_editar.php" title="Crear Nuevo">
                    <i class="fa fa-edit"> </i> Nuevo
                  </a>
                
                  <button style="width:43px; " id="btn_listar_eliminar" name="accion" value="eliminar" onclick="eliminar_selec()" type="button" class="btn btn-danger" title="Eliminar seleccionados">
                    <i class="fa fa-trash"></i>
                  </button>
                

                  <input type="hidden" name="accion" id="accion">
                
              </div>

            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-12 ">
                    <div  class=" table-responsive " style="overflow: auto; padding: 2px; width:98%">
                          <table class="table table-bordered table-striped table-hover dataTable" id="tabla_personas" style="width:100%">
                              <thead>
                                  <tr role="row">
                                      <th></th>
                                      <th>ID</th>
                                      <th>Usuario</th>
                                      <th>Persona</th>
                                  </tr>
                              </thead>
                              <tbody id="">
                                <?php 
                                  foreach ($lisPers as $key => $val) {
                                ?>
                                <tr role="row">
                                      <td>
                                        <label> <input type="checkbox" class="selec_id" name="selec_id[]" id="selec_id" value="<?php echo $val['id'] ?>"> <span class="label-text"></span> 
                                        </label>
                                      </td>
                                      <td class="center"><a class="btn btn-link" href="persona_editar.php?id=<?php echo $val['id'] ?>"><?php echo $val['usuario_id'] ?></a></td>
                                      <td><?php echo $val['usuario'] ?></td>
                                      <td><?php echo $val['nombres'].' '.$val['apellidos'] ?></td>
                                  </tr>
                                <?php 
                                  }
                                ?>

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            </div>
          </div>
      </div>
  </div>




          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/persona_listar.js"></script>

</body>

</html>
