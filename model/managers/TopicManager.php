<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\TopicManager;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }


        // public function findAllTopics($order = null){

        //     $orderQuery = ($order) ?                 
        //         "ORDER BY ".$order[0]. " ".$order[1] :
        //         "";

        //     $sql = "SELECT *
        //             FROM ".$this->tableName." t
        //             ".$orderQuery;

        //     return $this->getMultipleResults(
        //         DAO::select($sql), 
        //         $this->className
        //     );
        // }

    }