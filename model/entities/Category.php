<?php 

namespace Model\Entities;

    use App\Entity;

    final class Category extends Entity{

        private $id;
        private $name;
        private $description;

        public function __construct($data){         
            $this->hydrate($data);       
        }

        
        public function getName()
        {
                return $this->name;
        }

        
        public function setName($name)
        {
                $this->name = $name;

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
    }
    
?>