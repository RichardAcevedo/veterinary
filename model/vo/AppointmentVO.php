<?php
  
    class AppointmentVO{

        public $id;
        public $id_client;
        public $id_patient;
        public $dateAppointment;
        public $hour;
        public $state;
        
        public function __construct($id, $id_client, $id_patient, $dateAppointment, $hour, $state) {
            $this->id = $id;
            $this->id_client = $id_client;
            $this->id_patient = $id_patient;
            $this->dateAppointment = $dateAppointment;
            $this->hour = $hour;
            $this->state = $state;
        }
        
        public function getId() {
            return $this->id;
        }

        public function getId_client() {
            return $this->id_client;
        }

        public function getId_patient() {
            return $this->id_patient;
        }

        public function getDateAppointment() {
            return $this->dateAppointment;
        }

        public function getHour() {
            return $this->hour;
        }

        public function getState() {
            return $this->state;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setId_client($id_client) {
            $this->id_client = $id_client;
        }

        public function setId_patient($id_patient) {
            $this->id_patient = $id_patient;
        }

        public function setDateAppointment($dateAppointment) {
            $this->dateAppointment = $dateAppointment;
        }

        public function setHour($hour) {
            $this->hour = $hour;
        }

        public function setState($state) {
            $this->state = $state;
        }



    }

?>