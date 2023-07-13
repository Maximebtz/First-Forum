<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity{

        private $id;
        private $username;
        private $email;
        private $inscriptionDate;
        private $password; 
        private $image;
        private $status;
        private $description;

        public function __construct($data){     
                // var_dump($data);
            $this->hydrate($data);  
        }

        
        public function getId()
        {
                return $this->id;
        }

        
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

         
        public function getUsername()
        {
                return $this->username;
        }

        
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        
        public function getInscriptiondate(){
            $formattedDate = $this->inscriptionDate->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setInscriptiondate($date){
            $this->inscriptionDate = new \DateTime($date);
            return $this;
        }


        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
         
        
        public function getImage()
        {
                return $this->image;
        }

        
        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }

        
        public function getStatus()
        {
                return $this->status;
        }

        
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }

         
        public function getDescription()
        {
                return $this->description;
        }

        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        
        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }
    }