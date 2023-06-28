<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\CategoryManager;

    class CategoryManager extends Manager{

        protected $className = "Model\Entities\Category";
        protected $tableName = "category";


        public function __construct(){
            parent::connect();
        }

        public function listTopicByCategory($id)
        {
            $sql = "SELECT *
            FROM ".$this->tableName." c
            WHERE c.id_".$this->tableName." = :id
            ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false), 
                $this->className
            );
        }

    }