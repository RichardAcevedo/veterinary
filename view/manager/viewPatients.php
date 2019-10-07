<?php 

  session_start();
  //error_reporting(0);
  $name = $_SESSION['name'];
  $lastName = $_SESSION['lastName'];
  
  if($name == NULL || $name == ''){
    header("location: ../../");
    die();
  }

  $routeImg = "../../img/imgClients/".$_SESSION['picture']."";
  // require '../../bd/Database.php';
  // $db = new Database();
  // $con = $db->getConnection();

  if($_SESSION['picture'] == "" && $_SESSION['sex'] == "Femenino"){
      $imagen = "clientWomenStandar.jpg";
      $routeImg = "../../img/imgClients/".$imagen."";
    }else if($_SESSION['picture'] == "" && $_SESSION['sex'] == "Masculino"){
      $imagen = "clientMenStandar.jpg";
      $routeImg = "../../img/imgClients/".$imagen."";
    }
    
    require '../../bd/Database.php';
  $db = new Database();
  $con = $db->getConnection();

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
            <h1 class="h3 mb-0 text-gray-800">Pacientes Registrados en CentralPet </h1> 
            <form action="index.php">
                        <div>
                  <button type="submit" class="btn btn-primary" name="edit" value="<? echo $_SESSION['id']; ?>">Regresar</button>
                </div>
                
                
                <br>
              </form>
            
          </div>

          <!-- Content Row -->
          

          <!-- Content Row -->

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pacientes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>Identificacion</th>
                      <th><center>Nombre del <br>Dueño</center></th>
                      <th><center>ID del <br>Dueño</center></th>
                      <th><center>Nombre <br>Mascota</center></th>
                      <th><center>Tipo de Mascota</center></th>
                      <th>Raza</center></th>
                      <th>Sexo</center></th>
                      <th>Edad</center></th>
                      <th>Estado</center></th>
                      <th>Foto</center></th>
                      <th>Opciones</center></th>
                    </tr>
                  </thead>
                  
                  <tbody>
                   <?php
        require '../../model/PatientModel/PatientDAO.php';
        $daoP = new PatientDAO();
        $patients = $daoP->listPatients();
        for($i = 0; $i < count($patients); ++$i) {
            $id = $patients[$i]->getId();
              $imagen = $patients[$i]->getPicture();
              $type = $patients[$i]->getType();

              $query  = "select * from client_patient where id_patient = '$id'";
          $result = mysqli_query($con, $query);
          
          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $id_owner = $row['id_client'];
                $state = $row['state'];
                $query  = "select * from client where id = '$id_owner'";
              $result = mysqli_query($con, $query);
              
              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $name_owner = $row['name'];
                    $lastName_owner = $row['lastName'];
                  }
              }
              }
              
          }

              if($imagen == "" && $type == "Perro"){
                $imagen = "canStandar.jpg";
              }else if($imagen == "" && $type == "Gato"){
                $imagen = "catStandar.jpg";
              }
              $routeImg = "../../img/imgPets/".$imagen."";

              echo "<td><center>" . $patients[$i]->getId() . "</center></td>";
              echo "<td><center>" . $name_owner . " " .$lastName_owner."</center></td>";
              echo "<td><center>" . $id_owner . "</center></td>";
              echo "<td><center>" . $patients[$i]->getName() . "</center></td>";
              echo "<td><center>" . $patients[$i]->getType() . "</center></td>";
              echo "<td><center>" . $patients[$i]->getBreed() . "</center></td>";
              echo "<td><center>" . $patients[$i]->getSex() . "</center></td>";
              echo "<td><center>" . $patients[$i]->getAge() . "</center></td>";
              echo "<td><center>" . $state . "</center></td>";
              echo "<td><center><img style='width:30px; height:30px' src=".$routeImg."></center></td>";
              
              
              echo "<td><form action='viewClinicHistory.php' method='post'><input type='hidden' name='idPatient' value='" . $patients[$i]->getId() . "'/> <input type='hidden' name='namePatient' value='" . $patients[$i]->getName() . "'/> <center> <input type='submit' value='Ver Historia' class='btn btn-info' style='width:110px; height:35px' /> </center></form>
              <form action='../../controller/administratorController/administratorController.php' method='post'><input type='hidden' name='idPatient' value='" . $patients[$i]->getId() . "'/><input type='hidden' name='stateNow' value='" . $state . "'/> <center> <button type='submit' value='altEstado' name='action' class='btn btn-danger' style='width:110px; height:35px'> Alt Estado</button> </center> </form></td></tr>";
              $id = 0;
        }

        echo "<div class='col-xl-12 col-lg-7'>
                                    <div class='card shadow mb-4'>
                                      <!-- Card Header - Dropdown -->
                                       <div class='card-header py-3 d-flex flex-row align-items-center center-content-between'>
                                            <form action = 'downloadPatients/' method = 'POST' target='_blank'>
                                              <button type='submit'  class='btn btn-success' >Descargar Listado de Pacientes</button>
                                              </form></div>
                                    </div>
                                  </div>"; 

      ?>    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
 <br>
                    <br>
                    <br>
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