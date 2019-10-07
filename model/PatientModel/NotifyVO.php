<?php
  
    class NotifyVO{

        public $id;
        public $id_appointment;
        public $id_client;
        public $description;
        
        
        
        public function __construct($id, $id_appointment, $id_client, $description) {
            $this->id = $id;
            $this->id_appointment = $id_appointment;
            $this->id_client = $id_client;
            $this->description = $description;
            
        }
        public function getId() {
            return $this->id;
        }

        public function getId_appointment() {
            return $this->id_appointment;
        }

        public function getId_client() {
            return $this->id_client;
        }

        public function getDescription(){
             return $this->description;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setId_appointment($id_appointment) {
            $this->id_appointment = $id_appointment;
        }

        public function setId_client($id_client) {
            $this->id_client = $id_client;
        }

        public function setDescription($description) {
            $this->description = $description;
        }
    }

?>