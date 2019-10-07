<?php 
  
  session_start();
  error_reporting(0);
  $name = $_SESSION['name'];
  
  if($name == NULL || $name == ''){
    header("location: ../../");
    die();
  }


?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Panel de Control || CentralPet</title>

  <!-- Custom fonts for this template-->
  <link href="../../css/cssPanel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/cssPanel/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        <?php include('navManager.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            
            <!-- Nav Item - Alerts -->
           

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">new</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Centro de Mensajes
                </h6>
                 <?php include('message.php'); ?>
                
                <a class="dropdown-item text-center small text-gray-500" href="#">Ver mas Mensajes</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
                <img class="img-profile rounded-circle" src="../../img/imgPets/canStandar.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="viewProfile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ver Perfil
                </a>
                <a class="dropdown-item" href="viewProfile.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Herramientas
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesion
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Agregar Veterinario</h1> 
            <form action="index.php">
                        <div>
                  <button type="submit" class="btn btn-primary" name="edit" value="<? echo $_SESSION['id']; ?>">Regresar</button>
                </div>
                
                
                <br>
              </form>
            
          </div>

          <!-- Content Row -->
          

          <!-- Content Row -->

          
            <!-- Area Chart -->
            


            <!-- Pie Chart -->
            <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Datos del Veterinario</h1>
              </div>
              <form action="../../controller/administratorController/administratorController.php" method='post' enctype="multipart/form-data"> 

                      
                      <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIdentificación :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Identificación : "  placeholder="Identificación : " value="" name="id">
                      </div>

                      <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp&nbsp&nbsp&nbspNombre Completo :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nombre" value="" name="name">
                      </div>

                      
                       <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApellidos  :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Apellido : " value="" name="lastName">
                      </div>

                       <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSexo :</label>
                      </div>
                      <select class="custom-select" id="inputGroupSelect01" name="sex">

                          <option>Tipo</option>

                          <option value = "Masculino">Masculino</option>

                          <option value = "Femenino">Femenino</option>

                        </select>
                    </div>

                        <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTelefono  :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Telefono : " value="" name="phone">
                      </div>      

                          <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp&nbsp&nbsp&nbspTarjeta Profesional :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Tarjeta Profesional : " value="" name="cardProfessional">
                      </div>      


                     <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Pregunta Secreta :</label>
                      </div>
                      <select class="custom-select" id="inputGroupSelect01" name="secretQuestion">

                          <option>Tipo</option>

                          <option value = "Nombre Primer Perro">¿ Nombre del Primer Perro ?</option>

                          <option value = "Ciudad de Nacimiento">¿ Ciudad de Nacimiento ?</option>

                          <option value = "Color Favorito">¿ Color Favorito ?</option>

                        </select>
                    </div>

                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp&nbsp&nbsp&nbspRespuesta Secreta :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Respuesta Secreta : " value="" name="secretAnswer">
                      </div>      

                          <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp&nbsp&nbsp&nbsp&nbspCorreo Electronico  :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Correo Electronico" value="" name="mail">
                      </div>   

                        <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspContraseña :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Contraseña : " value="" name="password">
                      </div>         

                      <br>

                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Agregar Foto</h1>
                      </div>
                      
                      <center>
                        <div> 
                        <input type="file" placeholder="Foto" name="file">
                      </div>
                      </center>

                      <br>

                                           
                    <br>
                    
                      <div>
                        <center><button type="submit" class="btn btn-primary" name="action" value="addVeterinary">Añadir Veterinario</button></center>
                      </div>
                      

                </form>
              
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
          

          <!-- Content Row -->
         

        </div>
        <!-- /.container-fluid -->

      </div>

                   
      <!-- Footer -->
        <?php include('footer.php'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmar Cierre de Sesión</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">¿Esta Seguro que desea Salir de la Sesión?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../../">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../css/cssPanel/vendor/jquery/jquery.min.js"></script>
  <script src="../../css/cssPanel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../css/cssPanel/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../css/cssPanel/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../css/cssPanel/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../css/cssPanel/js/demo/chart-area-demo.js"></script>
  <script src="../../css/cssPanel/js/demo/chart-pie-demo.js"></script>

</body>

</html>
