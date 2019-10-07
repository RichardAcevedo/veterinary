<?php 
  date_default_timezone_set('America/Bogota');
  session_start();
  //error_reporting(0);
  $name = $_SESSION['name'];
  $dateAppointment = $_POST['date'];
  if($name == NULL || $name == ''){
    header("location: ../../");
    die();
  }
  // require '../../bd/Database.php';
  // $db = new Database();
  // $con = $db->getConnection();

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
            <h1 class="h3 mb-0 text-gray-800">Citas para el dia :  <?php echo $dateAppointment; ?></h1> 
            <form action="index.php">
                        <div>
                  <button type="submit" class="btn btn-primary" name="edit" value="<? echo $_SESSION['id']; ?>">Regresar</button>
                </div>
                
                
                <br>
              </form>
            
          </div>

          <!-- Content Row -->
          

          <!-- Content Row -->

          <div class="row">

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Citas Programadas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php
    
    require '../../model/VeterinaryModel/VeterinaryDAO.php';
    $daoV = new VeterinaryDAO();
    $appointments = $daoV->listAppointment($dateAppointment);
    if($appointments != NULL){

    echo "<table class='table table-bordered' id='dataTable' width='100%'' cellspacing='0'>
        <thead>
          <tr>
            <th><center>Numero de Cita</th>
            <th><center>Identificacion del Cliente</th>
            <th><center>Identificacion de la Mascota</th>
            <th><center>Fecha de la Cita</th>
            <th><center>Hora de la Cita</th>
            <th><center>Estado</th>
            <th>Opciones</center></th>
          </tr>
        </thead>
        <tbody>";

                            for($i = 0; $i < count($appointments); ++$i) {
                                
                                $id = $appointments[$i]->getId();
                                echo "<td><center>" . $appointments[$i]->getId() . "</td>";
                                  echo "<td><center>" . $appointments[$i]->getId_client() . "</td>";
                                  echo "<td><center>" . $appointments[$i]->getId_patient() . "</td>";
                                  echo "<td><center>" . $appointments[$i]->getDateAppointment() . "</td>";
                                  echo "<td><center>" . $appointments[$i]->getHour() . "</td>";
                                  echo "<td><center>" . $appointments[$i]->getState() . "</td>";
                                  echo "<td><form action='../../controller/administratorController/administratorController.php' method='post'><input type='hidden' name='dateAppointment' value='".$appointments[$i]->getDateAppointment()."'/> <input type='hidden' name='idClient' value='".$appointments[$i]->getId_client()."'/> <input type='hidden' name='hourAppointment' value='".$appointments[$i]->getHour()."'/> <input type='hidden' name='idAppointment' value='". $appointments[$i]->getId()."'/><center> <button type='submit' value='sendReminder' name='action' class='btn btn-info' style='width:110px; height:35px'>Recordar</button> </center></form></td></tr>";
                                  
                                 
                            }
                            echo "<div class='col-xl-12 col-lg-7'>
                                    <div class='card shadow mb-4'>
                                      <!-- Card Header - Dropdown -->
                                       <div class='card-header py-3 d-flex flex-row align-items-center center-content-between'>
                                            <form action = 'downloadAppointmentByDate/' method = 'POST' target='_blank'>
                                              <input type='hidden' name='date' value='". $dateAppointment."'>
                                              
                                              <button type='submit'  class='btn btn-success' >Descargar Citas para este Dia</button>
                                              </form></div>
                                    </div>
                                  </div>";
                            
                          }else{
                            echo "<h2>No Hay Citas para la Fecha Seleccionada</h2>";
                          }

                      ?>    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

            <!-- Historia Clinica -->
            <!-- <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4"> -->
                <!-- Card Header - Dropdown -->
                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary" >Atencion No° -- </h6>
                   -->
               <!--  </div> -->
                <!-- Contenido -->
                <!-- <div class="card-body">
                  <div class="col-lg-12">
                    <div class="p-2">
                      <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Detalles de la Atención</h1>
                      </div>
                      
                      <form action="../../controller/clientController/ClientController.php" method="POST" enctype="multipart/form-data">

                        <div class="input-group input-group-sm mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">&nbsp&nbsp&nbsp&nbspIdentificación Dueño  :</span>
                          </div>

                          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="id" readonly>

                        </div>
                        <br>
                        
                        <center><button type="submit" name = "action" value="editPicture" class="btn btn-primary" >Cargar Imagen</button></center>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
         
            <!-- Fin Historia Clinica -->


            
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