<?php
    class VeterinaryVO{

        public $id;
        public $name;
        public $lastName;
        public $sex;
        public $phone;
        public $cardProfessional;
        public $secretQuestion;
        public $secretAnswer;
        public $mail;
        public $password;
        public $picture;

        public function __construct($id, $name, $lastName, $sex, $phone, $cardProfessional, $secretQuestion, $secretAnswer, $mail, $password, $picture) {
            $this->id = $id;
            $this->name = $name;
            $this->lastName = $lastName;
            $this->sex = $sex;
            $this->phone = $phone;
            $this->cardProfessional = $cardProfessional;
            $this->secretQuestion = $secretQuestion;
            $this->secretAnswer = $secretAnswer;
            $this->mail = $mail;
            $this->password = $password;
            $this->picture = $picture;
        }
        
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function getSex() {
            return $this->sex;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function getSecretQuestion() {
            return $this->secretQuestion;
        }

        public function getSecretAnswer() {
            return $this->secretAnswer;
        }

        public function getMail() {
            return $this->mail;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setLastName($lastName) {
            $this->lastName = $lastName;
        }

        public function setSex($sex) {
            $this->sex = $sex;
        }

        public function setPhone($phone) {
            $this->phone = $phone;
        }

        public function setSecretQuestion($secretQuestion) {
            $this->secretQuestion = $secretQuestion;
        }

        public function setSecretAnswer($secretAnswer) {
            $this->secretAnswer = $secretAnswer;
        }

        public function setMail($mail) {
            $this->mail = $mail;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function getPicture() {
                return $this->picture;
            }

        public function setPicture($picture) {
            $this->picture = $picture;
        }

        public function getCardProfessional() {
                return $this->cardProfessional;
            }

        public function setCardProfessional($cardProfessional) {
            $this->cardProfessional = $cardProfessional;
        }
    }
?>