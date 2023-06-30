<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    // use Model\Managers\PostManager;

    class PostManager extends Manager{

        protected $className = "Model\Entities\Post";
        protected $tableName = "post";


        public function __construct(){
            parent::connect();
        }

        public function findAllPostsByTopics($id, $order = null){
            $orderQuery = ($order) ? "ORDER BY ".$order[0]. " ".$order[1] : "";

            $sql = "SELECT *
                    FROM ".$this->tableName." p
                    WHERE p.topic_id = :id
                    ".$orderQuery;

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }

    }