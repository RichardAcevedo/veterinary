<?php
  
    class MessageVO{

        public $id_message;
        public $name_origin;
        public $id_destination;
        public $description;
        public $date;
        
        
        public function __construct($id_message, $name_origin, $id_destination, $description, $date) {
            $this->id_message = $id_message;
            $this->name_origin = $name_origin;
            $this->id_destination = $id_destination;
            $this->description = $description;
            $this->date = $date;
        }
        public function getId_message() {
            return $this->id_message;
        }

        public function getName_origin() {
            return $this->name_origin;
        }

        public function getId_destination() {
            return $this->id_destination;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getDate() {
            return $this->date;
        }

        public function setId_message($id_message) {
            $this->id_message = $id_message;
        }

        public function setName_origin($name_origin) {
            $this->name_origin = $name_origin;
        }

        public function setId_destination($id_destination) {
            $this->id_destination = $id_destination;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function setDate($date) {
            $this->date = $date;
        }


        

    }

?>