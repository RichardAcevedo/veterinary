<?php
                require '../../model/ClientModel/ClientDAO.php';
                $daoC = new ClientDAO();
                $messages = $daoC->viewMessages($_SESSION['id']);
                if($messages != NULL){
                  for($i = 0; $i < count($messages); ++$i) {
                      $id = $messages[$i]->getId_message();
                      $nameOrigin = $messages[$i]->getName_origin();
                      $idDestination = $messages[$i]->getId_destination();
                      $description = $messages[$i]->getDescription();
                      $date = $messages[$i]->getDate();

                      echo "<a class='dropdown-item d-flex align-items-center' >
                              <div class='ropdown-list-image mr-3'>
                                <img class='rounded-circle' style='heigth:60px; width:60px;' src='../../img/other/chat.png' alt=''>
                                <div class='status-indicator bg-success'></div>
                              </div>
                              <div class='font-weight-bold'>
                                <div class='text-truncate'>".$description."</div>
                                <div class='small text-gray-500'>".$nameOrigin." · ".$date."</div>
                                <form action='viewMessage.php' method='post'>
                                <button type='submit' class='btn btn-primary' name='idMessage' value='".$id."''>Ver Mensaje</button>
                              
                                </form>
                              </div>
                            </a>
                            ";
                    }
                 } 
                   
                ?>