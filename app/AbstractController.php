<?php
    namespace App;

    // Classe abstraite représentant un contrôleur abstrait
    abstract class AbstractController{

        // Méthode par défaut du contrôleur
        public function index(){}

        // Méthode pour rediriger vers une autre page
        public function redirectTo($ctrl = null, $action = null, $id = null){

            // Vérification si le contrôleur n'est pas "home"
            if($ctrl != "home"){
                // Construction de l'URL en ajoutant les parties spécifiées (contrôleur, action, ID)
                $url = $ctrl ? "/".$ctrl : "";
                $url.= $action ? "/".$action : "";
                $url.= $id ? "/".$id : "";
                $url.= ".html";
            }
            else{
                // Si le contrôleur est "home", l'URL est simplement "/"
                $url = "/";
            }
            
            // Redirection vers l'URL spécifiée
            header("Location: $url");
            die(); // Arrêt de l'exécution du script

        }

        // Méthode pour restreindre l'accès en fonction du rôle
        public function restrictTo($role){
            
            // Vérification si l'utilisateur n'est pas connecté ou n'a pas le rôle spécifié
            if(!Session::getUser() || !Session::getUser()->hasRole($role)){
                // Redirection vers la page de connexion du module "security"
                $this->redirectTo("security", "login");
            }
            return;
        }

    }
    
?>