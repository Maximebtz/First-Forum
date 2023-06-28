<?php
    namespace Model\Entities;

    use App\Entity;

    final class Topic extends Entity{

        private $id;
        private $title;
        private $user;
        private $creationDate;
        private $closed;


        public function __construct($data){         
            $this->hydrate($data);   
            $this->creationDate= new \DateTime;     
            $this->closed= false;     
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

        
        public function getTitle()
        {
                return $this->title;
        }

        
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        
        public function getUser()
        {
                return $this->user;
        }

       
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }


        public function getCreationdate(){
            $formattedDate = $this->creationDate->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setCreationdate($date){
            $this->creationDate = new \DateTime($date);
            return $this;
        }

         
        public function getClosed()
        {
                return $this->closed;
        }
        
        public function setClosed($closed)
        {
                $this->closed = $closed;

                return $this;
        }
    }
