<?php
    namespace App;

    // Classe abstraite représentant une entité
    abstract class Entity{

        // Méthode utilisée pour peupler les propriétés de l'entité avec des données
        protected function hydrate($data){

            foreach($data as $field => $value){

                // Séparation du nom du champ par le caractère underscore pour obtenir la classe et la propriété associées
                $fieldArray = explode("_", $field);

                // Vérification si le champ représente l'ID d'une entité associée
                if(isset($fieldArray[1]) && $fieldArray[1] == "id"){

                    // Construction du nom de la classe du gestionnaire de l'entité associée
                    $manName = ucfirst($fieldArray[0])."Manager";
                    $FQCName = "Model\Managers".DS.$manName;

                    // Création d'une instance du gestionnaire de l'entité associée
                    $man = new $FQCName();

                    // Récupération de l'entité associée en utilisant la valeur de l'ID
                    $value = $man->findOneById($value);
                }

                // Construction du nom de la méthode setter à appeler (par exemple, setMarque)
                $method = "set".ucfirst($fieldArray[0]);

                // Vérification si la méthode setter existe dans la classe de l'entité courante
                if(method_exists($this, $method)){
                    // Appel de la méthode setter pour définir la valeur de la propriété
                    $this->$method($value);
                }
            }
        }

        // Méthode pour obtenir le nom de classe de l'entité
        public function getClass(){
            return get_class($this);
        }
    }
