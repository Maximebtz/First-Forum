<?php 

namespace Model\Entities;

    use App\Entity;

    final class Category extends Entity{

        private $id;
        private $name;

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }
    }
    
?>