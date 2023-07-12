<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Entities\UserManager;


    class SecurityController extends AbstractController implements ControllerInterface{


        public function displayLogIn() {
            
            return [
                "view" => VIEW_DIR."security/login.php"
                ];
        }

        public function displaySignUp() {
            
            return [
                "view" => VIEW_DIR."security/signup.php"
                ];
        }



    }