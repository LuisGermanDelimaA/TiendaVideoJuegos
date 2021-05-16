<?php
  error_reporting(E_ERROR);
  require_once "modelos/Videojuego.php";
  $obj_videoj=new Videojuego();
  $id=empty($_GET['id']) ? '0' : $_GET['id'];
  $param=array('vector');
  if (!empty($id)) $param['where']=" t0.id=$id";
  $regVideoj=array();
  if(!empty($id))
    $regVideoj=$obj_videoj->listar($param);
  echo '<script> var regVideoj='.json_encode($regVideoj).' </script>';

  require_once "modelos/Categorias.php";
  $obj_cate=new Categorias();
  require_once "modelos/Tecnologia.php";
  $obj_tec=new Tecnologia();

  $lisCate=$obj_cate->listar([]);
  $lisTec=$obj_tec->listar([]);

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

        <form method="POST" action="modulos/CrudVideojuego.php" accept-charset="UTF-8" id="editarForm" enctype="multipart/form-data" onsubmit="return validarFormulario()">
            
            <?php 
              if (empty($id)) echo '<input type="hidden" name="crud" value="create">';
              else            echo '<input type="hidden" name="crud" value="update">';
            ?>
            <input type="hidden" name="id" value="<?php echo $id ?>">



          <div class="row mb-1">
              <div class="col-md-12">
                <div class="col-md-12">

                  <h5 class="m-0 font-weight-bold text-primary"> Editar Video juegos </h5>

                </div>
              </div>
          </div>

          <div class="animated fadeIn">

            
        
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                      <strong class="card-title text-primary">Datos del video juego</strong>
                  </div>
                  <div class="card-body">
                    
                    <div class="row"> 
                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="titulo" class="control-label">Titulo</label>
                            <input class="form-control required" name="titulo" type="text" id="titulo" value="<?php echo $regVideoj['titulo'] ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="protagonista" class="control-label">Protagonista</label>
                            <input class="form-control required" name="protagonista" type="text" id="protagonista" value="<?php echo $regVideoj['protagonista'] ?>">
                          </div>
                        </div>
                      </div>
                    </div> 
                   
                    <div class="row"> 
                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="categoria_id" class="control-label">Categoria</label>
                            <select name="categoria_id" id="categoria_id" class="form-control required">
                              <?php 
                                foreach ($lisCate as $key => $val) {
                                  echo '<option value="'.$val['id'].'">'.$val['nombre'].'</option>';
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="tecnologia_id" class="control-label">Tecnologia</label>
                            <select name="tecnologia_id" id="tecnologia_id" class="form-control required">
                            <?php 
                                foreach ($lisTec as $key => $val) {
                                  echo '<option value="'.$val['id'].'">'.$val['nombre'].'</option>';
                                }
                              ?>
                            </select>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row"> 
                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="director" class="control-label">Director</label>
                            <input class="form-control " name="director" type="text" id="director" value="<?php echo $regVideoj['director'] ?>">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="productor" class="control-label">Productor</label>
                            <input class="form-control " name="productor" type="text" id="productor" value="<?php echo $regVideoj['productor'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row"> 
                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="anio" class="control-label">Año</label>
                            <input class="form-control " name="anio" type="text" id="anio" value="<?php echo $regVideoj['anio'] ?>">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="precio" class="control-label">Precio</label>
                            <input class="form-control required" name="precio" type="text" id="precio" value="<?php echo $regVideoj['precio'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row"> 
                      <div class="col-md-12 nopadding">
                        <div class="form-group label-floating is-empty">
                          <div class="col-sm-12">
                            <label for="descripcion" class="control-label">Descripcion</label>

                            <textarea  class="form-control " name="descripcion" id="descripcion" cols="30" rows="5"><?php echo $regVideoj['descripcion'] ?></textarea>
                          </div>
                        </div>
                      </div>

                    </div>

                </div>
              </div>
            </div>
          </div>


          



    </div>


    <div class="row mb-1 mt-4 mb-4">
        <div class="col-md-12">
          <div class="col-md-12">

            <h5 class="m-0 font-weight-bold text-primary"> Inventario del Video juegos </h5>

          </div>
        </div>
    </div>

    <div class="animated fadeIn">
            <div class="row"> 
              <div class="col-md-6 nopadding">
                <div class="form-group label-floating is-empty">
                  <div class="col-sm-12">
                    <label for="stock" class="control-label">Stock</label>
                    <input class="form-control " name="stock" type="text" id="stock" value="<?php echo $regVideoj['stock'] ?>">
                  </div>
                </div>
              </div>

             
            </div>    

            <div class="row"> 
              <div class="col-md-6 nopadding">
                <div class="form-group label-floating is-empty">
                  <div class="col-sm-12">
                    <label for="alquilados" class="control-label">Alquilados: </label>
                    <span><?php echo $regVideoj['alquilados'] ?></span>
                    
                  </div>
                </div>
              </div>

              <div class="col-md-6 nopadding">
                <div class="form-group label-floating is-empty">
                  <div class="col-sm-12">
                    <label for="disponibilidad" class="control-label">Disponibilidad: </label>
                    <span><?php echo $regVideoj['disponibilidad'] ?></span>
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
                  
                  <a style="border: 1px solid rgba(0,0,0,0.4); " class="btn btn-default btn-raised" id="btn_cancelar" href="videojuego_listar.php">
                  Cancelar</a>

              </div>
          </div>
        </div>                    
    </form>

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
  <script src="js/videojuego_editar.js"></script>

</body>

</html>
