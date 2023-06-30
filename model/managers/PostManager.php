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

            $sql = "SELECT *, u.username, u.image
                    FROM ".$this->tableName." p
                    JOIN user u ON p.user_id = u.id_user
                    WHERE p.topic_id = :id
                    ".$orderQuery;

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );

            foreach ($results as $result) {
                $result->setUsername($result['username']);
                $result->setImage($result['image']);
            }
        
            return $results;
        }

    }