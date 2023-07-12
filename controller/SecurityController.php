<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;


    class SecurityController extends AbstractController implements ControllerInterface{
        

        public function index() {
            
            return [
                "view" => VIEW_DIR."forum/home.php"
                ];
        }

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


        public function register() {
            
            
            // if($_POST['submit']){

                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                date_default_timezone_set('Europe/Paris');
                $inscriptionDate = date('Y-m-d');
                
                
                if($username && $email && $password && $password2 && $inscriptionDate) {
                    $userManager = new UserManager();
                    // if($userManager->findOneByUsername($username)){
                        if($password == $password2 && strlen($password) >= 8) {
                            $userManager->add([
                                "username" => $username,
                                "email" => $email,
                                "password" => password_hash($password, PASSWORD_DEFAULT),
                                "inscriptionDate" => $inscriptionDate
                            ]);
                            // header('Location: index.php?ctrl=security&action=displayLogIn'); exit;
                            
                        } else {
                            echo "<p>Les mots de passe ne sont pas identiques</p>";
                        }
                        // }
                        
                    }
                    var_dump($userManager);
            // } else {
            //     header('Location: index.php?ctrl=home&action=index'); exit;
            // }
    
                return [
                    "view" => VIEW_DIR."security/signup.php",
                    ];
            }


            public function logIn() {

                // if($_POST['submit']){
                    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    if($username && $password) {
                        // $user = ;
                        
                        // if($user){
                            $hash = $user['password'];
                            if(password_verify($password, $hash)) {
                                $_SESSION["user"] = $user;
                                header("Location : index.php");
                            } else {
                                header("Location : index.php?ctrl=security&action=displayLogIn"); exit;
                            }
                        // }
                    }
                // } else {

                // }
                
                return [
                    "view" => VIEW_DIR."security/login.php",
                    ];
            }

            public function logOut() {
                
                unset($_SESSION['user']);
                header('Location: exo-forum/First-Forum/'); exit;

            }
    }