<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    // use Model\Managers\CategoryManager;

    class CategoryManager extends Manager{

        protected $className = "Model\Entities\Category";
        protected $tableName = "category";


        public function __construct(){
            parent::connect();
        }

        public function listTopicByCategory($id){
            $sql = "SELECT *
            FROM ".$this->tableName." c
            WHERE c.id_".$this->tableName." = :id
            ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false), 
                $this->className
            );
        }

        // public function findAllTopicsByCategory($id, $order = null){
        //     $orderQuery = ($order) ? "ORDER BY ".$order[0]. " ".$order[1] : "";

        //     $sql = "SELECT *
        //             FROM ".$this->tableName." t
        //             WHERE t.".$this->tableName."_id = :id
        //             ".$orderQuery;

        //     return $this->getMultipleResults(
        //         DAO::select($sql, ['id' => $id]),
        //         $this->className
        //     );
        // }
    }