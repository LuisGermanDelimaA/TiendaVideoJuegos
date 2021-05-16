<?php
  error_reporting(E_ERROR);
  require_once "modelos/Cliente.php";;
  $obj_clien=new Cliente();
  $id=empty($_GET['id']) ? '0' : $_GET['id'];
  $param=array('vector');
  if (!empty($id)) $param['where']=" t0.id=$id";
  $regClien=array();
  if(!empty($id))
    $regClien=$obj_clien->listar($param);
  echo '<script> var regClien='.json_encode($regClien).' </script>';
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


        <!-- Begin Page Content -->
        <div class="container-fluid">



          <div class="row mb-1">
              <div class="col-md-12">
                <div class="col-md-12">

                  <h5 class="m-0 font-weight-bold text-primary"> Editar Cliente </h5>

                </div>
              </div>
          </div>

          <div class="animated fadeIn">

            <form method="POST" action="modulos/CrudCliente.php" accept-charset="UTF-8" id="editarForm" enctype="multipart/form-data" onsubmit="return validarFormulario()">
            
            <?php 
              if (empty($id)) echo '<input type="hidden" name="crud" value="create">';
              else            echo '<input type="hidden" name="crud" value="update">';
            ?>
            <input type="hidden" name="id" value="<?php echo $id ?>">
        
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                      <strong class="card-title text-primary">Datos del Cliente</strong>
                  </div>
                  <div class="card-body">
                    
                    <div class="row"> 
                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="nombres" class="control-label">Nombres</label>
                            <input class="form-control required" name="nombre" type="text" id="nombre" value="<?php echo $regClien['nombre'] ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="apellidos" class="control-label">Apellidos</label>
                            <input class="form-control " name="apellido" type="text" id="apellido" value="<?php echo $regClien['apellido'] ?>">
                          </div>
                        </div>
                      </div>
                    </div> 
                   
                    <div class="row"> 
                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="celular" class="control-label">Documento</label>
                            <input class="form-control " name="cedula" type="text" id="cedula" value="<?php echo $regClien['cedula'] ?>">
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="correo" class="control-label">Correo</label>
                            <input class="form-control " name="correo" type="email" id="correo" value="<?php echo $regClien['correo'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row"> 
                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="direccion" class="control-label">Fecha Nacimiento (Y-m-d)</label>
                            <input class="form-control " name="fecha_nac" type="text" id="fecha_nac" value="<?php echo $regClien['fecha_nac'] ?>" placeholder="yyyy-mm-dd">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="direccion" class="control-label">Direccion</label>
                            <input class="form-control " name="direccion" type="text" id="direccion" value="<?php echo $regClien['direccion'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
              </div>
            </div>
          </div>


          <div class="row botones  ">
            <div class="col-md-12 centrarh1">
              <div class="form-group ">

                  <button type="submit" id="btn_guardar" class="btn btn-primary editar_js btn-raised" style="display: inline;">
                    <i class="fa fa-save"> </i> Guardar </button>
                  
                  <a style="border: 1px solid rgba(0,0,0,0.4); " class="btn btn-default btn-raised" id="btn_cancelar" href="index.php">
                  Cancelar</a>

              </div>
          </div>
        </div>

      </form>


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
  <script src="js/editar.js"></script>
  <script src="js/cliente_editar.js"></script>

</body>

</html>
