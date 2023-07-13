<?php
    namespace App;

    abstract class Manager{


        protected function connect(){
            DAO::connect();
        }

        
        public function findAll($order = null){

            $orderQuery = ($order) ?                 
                "ORDER BY ".$order[0]. " ".$order[1] :
                "";

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    ".$orderQuery;

            return $this->getMultipleResults(
                DAO::select($sql), 
                $this->className
            );
        }

        public function findAllByID($id, $order = null){
            $orderQuery = ($order) ? "ORDER BY ".$order[0]. " ".$order[1] : "";

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.".$this->tableName."_id = :id
                    ".$orderQuery;

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }

        

        public function findOneById($id){

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.id_".$this->tableName." = :id
                    ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false), 
                $this->className
            );
        }

        public function findAllByColumnAndValue($value, $column, $order = null){
            $orderQuery = ($order) ? "ORDER BY ".$order[0]. " ".$order[1] : "";
        
            $sql = "SELECT *
                    FROM ".$this->tableName." t
                    WHERE t.".$column." = :value
                    ".$orderQuery;
        
            return $this->getMultipleResults(
                DAO::select($sql, ['value' => $value]),
                $this->className
            );
        }

        //$data = ['username' => 'Squalli', 'password' => 'dfsyfshfbzeifbqefbq', 'email' => 'sql@gmail.com'];

        public function add($data){
            //$keys = ['username' , 'password', 'email']
            $keys = array_keys($data);
            //$values = ['Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com']
            $values = array_values($data);
            //"username,password,email"
            $sql = "INSERT INTO ".$this->tableName."
                    (".implode(',', $keys).") 
                    VALUES
                    ('".implode("','",$values)."')";
                    //"'Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com'"
            /*
                INSERT INTO user (username,password,email) VALUES ('Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com') 
            */
            try{
                return DAO::insert($sql);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }
        }

        
        public function update($data, $id){
            // Récupérer les clés et les valeurs du tableau $data
            $columns = array_keys($data);
            $values = array_values($data);

            // Construire la clause SET de la requête SQL
            $setClause = '';
            for ($i = 0; $i < count($columns); $i++) {
                $setClause .= $columns[$i] . " = ?"; // Ajouter chaque colonne avec un marqueur de paramètre
                if ($i < count($columns) - 1) {
                    $setClause .= ", "; // Ajouter une virgule entre les colonnes
                }
            }

            // Construire la requête SQL complète
            $sql = "UPDATE " . $this->tableName . " SET " . $setClause . " WHERE id_" . $this->tableName . " = ?";

            // Ajouter l'ID à la liste des valeurs
            $values[] = $id;

            try {
                // Appeler la méthode d'exécution de requête de mise à jour dans le DAO avec la requête SQL et les valeurs
                return DAO::update($sql, $values);
            } catch (\PDOException $e) {
                echo $e->getMessage();
                die();
            }
        }



        public function addWithDepTable($data1, $data2) {
            $keys1 = array_keys($data1);
            $values1 = array_values($data1);
            $sql1 = "INSERT INTO ".$this->tableName."
                     (".implode(',', $keys1).") 
                     VALUES
                     ('".implode("','",$values1)."')";
         
            $keys2 = array_keys($data2);
            $values2 = array_values($data2);
            $sql2 = "INSERT INTO ".$this->tableDep."
                     (".implode(',', $keys2).") 
                     VALUES
                     ('".implode("','",$values2)."')";
         
            try {
               $result1 = DAO::insert($sql1);
               $result2 = DAO::insert($sql2);
               return [$result1, $result2]; // Retournez les résultats des deux insertions
            } catch(\PDOException $e) {
               echo $e->getMessage();
               die();
            }
         }
         


        public function addById($id, $data){
            //$keys = ['username' , 'password', 'email']
            $keys = array_keys($data);
            //$values = ['Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com']
            $values = array_values($data);
            //"username,password,email"
            $sql = "INSERT INTO ".$this->tableName."
                    (".implode(',', $keys).") 
                    VALUES
                    ('".implode("','",$values)."')";
                    //"'Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com'"
            /*
                INSERT INTO user (username,password,email) VALUES ('Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com') 
            */
            try{
                return DAO::insert($sql);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }
        }
        
        public function delete($id){
            $sql = "DELETE FROM ".$this->tableName."
                    WHERE id_".$this->tableName." = :id
                    ";

            return DAO::delete($sql, ['id' => $id]); 
        }

        private function generate($rows, $class){
            foreach($rows as $row){
                yield new $class($row);
            }
        }
        
        protected function getMultipleResults($rows, $class){

            if(is_iterable($rows)){
                return $this->generate($rows, $class);
            }
            else return null;
        }

        protected function getOneOrNullResult($row, $class){

            if($row != null){
                return new $class($row);
            }
            return false;
        }

        protected function getSingleScalarResult($row){

            if($row != null){
                $value = array_values($row);
                return $value[0];
            }
            return false;
        }
    
    }