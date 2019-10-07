<?php 
  
  session_start();
  error_reporting(0);
  $name = $_SESSION['name'];
  date_default_timezone_set('America/Bogota');
  $dateToday = date('Y-m-d');
  if($name == NULL || $name == ''){
    header("location: ../../");
    die();
  }

  require_once '../../bd/Database.php';
  $db = new Database();
  $con = $db->getConnection();

  $query = "select count(*) from patient ";
  $qresult = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($qresult);
  $cantPets = $row["count(*)"];

  $query2 = "select count(*) from appointment where dateAppointment = '$dateToday' ";
  $qresult2 = mysqli_query($con, $query2);
  $row2 = mysqli_fetch_assoc($qresult2);
  $cantsAppointment = $row2["count(*)"];
 
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Custom styles for this template-->
  <link href="../../css/cssPanel/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        <?php include('navVeterinary.php'); ?>
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
            <h1 class="h3 mb-0 text-gray-800">Pagina Principal </h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mascotas Registradas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo "$cantPets"; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cat fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Historico de Mensajes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($messages); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Citas para Hoy</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <center><div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $cantsAppointment; ?></div></center>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Fecha de Registro</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">12-05-2019</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-paw fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ultimas Noticias</h6>
                  
                </div>
                <!-- Card Body -->
                <div >

                  <br>
                  <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">El especialista en dermatología para animales, Belisario Roncallo destaca el crecimiento del sector de mascota en Barranquilla.</h6>
                  <br>
                  <center><img src="../../img/news/noticia1.jpg" style="width: 400px; height: 300px; border: silver 8px solid;"></center>
                  <br>
                    <h6 class="m-0 font-weight-bold text-secundary" style="text-align: center;">04 de Junio de 2019 - 10:48 || POR: DANIELA PASTORI</h6>
                 
                   
                   <br>
                   <h6  class="m-0 font-weight-bold text-secundary" style="text-align: center;">El 2000, año en el que la comercialización de productos para el mercado animal representaba una oportunidad de negocios para el veterinario Belisario Roncallo: “Fue por ahí, por esa puerta, que entré al mercado de animales de compañía”.<br><br> 

                    Belisario Roncallo es oriundo de El Banco, Magdalena, y cuenta que llegó a suelo barranquillero por “presión social”. “Las cosas se complicaron en el pueblo y nos tocó salir  a mi y a toda la familia del pueblo”.<br><br>

                    Una vez ya radicado en la ciudad de Barranquilla, específicamente en el año 1991,  es vinculado a una firma multinacional como ser representante de venta; cuyo cargo lo ocupó por 8 años, pues en 1999 decide retirarse de la empresa multinacional  y emprender un rumbo hacia su profesión en el mundo animal. </h6>


                  
                  <h1 style="text-align: center;">--------------------</h1>
                  
                  <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">El tamaño del mercado de mascotas en Barranquilla tiene como referencia una  población de animales que, de acuerdo a la Secretaría de Salud  Pública, es de 136.940 perros y 49.298 gatos.</h6>
                  <br>
                  <center><img src="../../img/news/noticia2.jpg" style="width: 400px; height: 300px; border: silver 8px solid;"></center>
                  <br>
                    <h6 class="m-0 font-weight-bold text-secundary" style="text-align: center;">04 de Junio de 2019 - 09:58 || POR: NILSON ROMO MENDOZA</h6>
                 
                   

                   
                   <br>
                   <h6 class="m-0 font-weight-bold text-secundary" style="text-align: center;">El mercado de servicios de salud y servicios para mascotas en Barranquilla está expandiéndose. Una medida para medirlo es la población de animales que, de acuerdo a la Secretaría de Salud  Pública, es de 136.940 perros y 49.298 gatos, el número de sociedades y personas con actividades veterinarias registradas en la Cámara de Comercio: 172, de las cuales 135 (78%) son personas naturales, y el gasto total promedio de la unidad de gasto en Barranquilla, que es de $2.273.000 según el Dane, y es el quinto más alto del país.<br><br> 

                  Tres veterinarios consultados por la revista +negocios (+n) destacan que el mercado tiene a favor lo que ha ocurrido en la última década con el concepto de tener responsabilidad con las mascotas, las modificaciones de hábitos del hogar y las especializaciones de los servicios médicos en animales. </h6>
                  <br>
                  <br>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Nuestros Veterinarios</h6>
                  
                </div>
                <!-- Card Body -->
                <div >
                 
                  <br>
                  <div style=" background-color: #D4E6F1; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);  max-width: 300px;  margin: auto;  text-align: center;">
                    <br>
                    <img src="../../img/imgVeterinarys/vetWomenStandar.jpg"  style="width:90%; border: silver 5px solid;">
                    <br>
                    <br>
                    <h1 style="color:black; font-weight: bold;">Andrea Bermudez</h1>
                    <p style=" font-size: 18px;">Veterinaria Profesional</p>
                    <center><p>Tarjeta Profesional N° 4165165</p> </center>
                    <p>Harvard University</p>
                    <a href="#" style=" text-decoration: none;  font-size: 22px;  color: black;"><i class="fa fa-dribbble"></i></a> 
                    <a href="#" style=" text-decoration: none;  font-size: 22px;  color: black;"><i class="fa fa-twitter"></i></a> 
                    <a href="#" style=" text-decoration: none;  font-size: 22px;  color: black;"><i class="fa fa-linkedin"></i></a> 
                    <a href="#" style=" text-decoration: none;  font-size: 22px;  color: black;"><i class="fa fa-facebook"></i></a> 
                    
                  </div>
                 
                  <br>
                  
                  <div style=" background-color: #D4E6F1; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);  max-width: 300px;  margin: auto;  text-align: center;">
                    <br>
                    <img src="../../img/imgVeterinarys/vetMenStandar.jpg"  style="width:90%; border: silver 5px solid;">
                    <br>
                    <br>
                    <h1 style="color:black; font-weight: bold;">Jorge Mojica</h1>
                    <p style=" font-size: 18px; ">Veterinario Profesional</p>
                    <center><p>Tarjeta Profesional N° 9846577</p> </center>
                    <p>Colombia National University</p>
                    <a href="#" style=" text-decoration: none;  font-size: 22px;  color: black;"><i class="fa fa-dribbble"></i></a> 
                    <a href="#" style=" text-decoration: none;  font-size: 22px;  color: black;"><i class="fa fa-twitter"></i></a> 
                    <a href="#" style=" text-decoration: none;  font-size: 22px;  color: black;"><i class="fa fa-linkedin"></i></a> 
                    <a href="#" style=" text-decoration: none;  font-size: 22px;  color: black;"><i class="fa fa-facebook"></i></a> 
                    
                  </div>
                  <br>
                  <br>
                  
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
