<?php
     class PatientVO{

        public $id;
        public $name;
        public $type;
        public $sex;
        public $breed;
        public $age;
        public $picture;
        
        public function __construct($id, $name, $type, $sex, $breed, $age, $picture) {
            $this->id = $id;
            $this->name = $name;
            $this->type = $type;
            $this->sex = $sex;
            $this->breed = $breed;
            $this->age = $age;
            $this->picture = $picture;
        }

        public function getName() {
            return $this->name;
        }

        public function getType() {
            return $this->type;
        }

        public function getSex() {
            return $this->sex;
        }

        public function getBreed() {
            return $this->breed;
        }

        public function getAge() {
            return $this->age;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function setSex($sex) {
            $this->sex = $sex;
        }

        public function setBreed($breed) {
            $this->breed = $breed;
        }

        public function setAge($age) {
            $this->age = $age;
        }

        function getPicture() {
                return $this->picture;
            }

        function setPicture($picture) {
            $this->picture = $picture;
        }

        function getId() {
                return $this->id;
            }

        function setId($id) {
            $this->id = $id;
        }

    }
?>