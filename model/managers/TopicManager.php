<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\UserManager;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }

        public function findAllTopicsByCategory($id, $order = null){
            $orderQuery = ($order) ? "ORDER BY ".$order[0]. " ".$order[1] : "";

            $sql = "SELECT *
                    FROM ".$this->tableName." t
                    WHERE t.category_id = :id
                    ".$orderQuery;

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }

        public function addNewTopic($data){

            $keys = array_keys($data);

            $values = array_values($data);
            
            $sql = "INSERT INTO ".$this->tableName."
                    (".implode(',', $keys).") 
                    VALUES
                    ('".implode("','",$values)."')";
            try{
                return DAO::insert($sql);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }
        }
    }