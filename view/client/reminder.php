<?php 
    
    require_once('../../model/PatientModel/PatientDAO.php');
    $daoP = new PatientDAO();
    $notifys = $daoP->viewNotifys($_SESSION['id']); 

    if($notifys != NULL){
                  for($i = 0; $i < count($notifys); ++$i) {
                      $id = $notifys[$i]->getId();
                      $id_appointment = $notifys[$i]->getId_appointment();
                      $id_client = $notifys[$i]->getId_client();
                      $description = $notifys[$i]->getDescription();
                      
                      echo "<a class='dropdown-item d-flex align-items-center' href='#'>
                            <div class='mr-3'>
                              <div class='icon-circle bg-primary'>
                                <i class='fas fa-file-alt text-white'></i>
                              </div>
                            </div>
                            <div>
                              <div class='small text-gray-500'>Cita Medica No° ".$id_appointment."</div>
                              <span class='font-weight-bold'>".$description."</span>
                            </div>
                          </a>
                            ";
                    }
                 } 

    
?>