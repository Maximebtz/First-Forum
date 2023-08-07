<?php
    namespace Model\Entities;

    use App\Entity;

    final class Post extends Entity{

        private $id;
        private $user;
        private $text;
        private $creationDate;
        private $topic;

        
        public function __construct($data){         
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

        
        public function getText()
        {
                return $this->text;
        }

        public function setText($text)
        {
                $this->text = $text;

                return $this;
        }

        public function getCreationDate(){
            $formattedDate = $this->creationDate->format("d-m-Y, H:i:s");
            return $formattedDate;
            var_dump();
        }

        public function setCreationDate($date){
            $this->creationDate = new \DateTime($date);
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

        
        public function getTopic()
        {
                return $this->topic;
        }

        
        public function setTopic($topic)
        {
                $this->topic = $topic;

                return $this;
        }
    }