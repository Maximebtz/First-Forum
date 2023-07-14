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
            

                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                date_default_timezone_set('Europe/Paris');
                $inscriptionDate = date('Y-m-d');
                
                
                if($username && $email && $password && $password2 && $inscriptionDate) {

                    $userManager = new UserManager();

                    $user = $userManager->findUserByUsername($username);
                    
                    var_dump($user);
                    if($user){
                        // header("Location: index.php?ctrl=security&action=displaySignUp");
                        echo "<p>Cette utilisateur existe déjà !</p>";
                    } else {
                        if($password == $password2 && strlen($password) >= 8) {
                            $userManager->add([
                                "username" => $username,
                                "email" => $email,
                                "image" => $image,
                                "password" => password_hash($password, PASSWORD_DEFAULT),
                                "inscriptionDate" => $inscriptionDate
                            ]);
                            header('Location: index.php?ctrl=security&action=displayLogIn'); exit;
                            
                        } else {
                            echo "<p>Les mots de passe ne sont pas identiques</p>";
                        }
                    }
                }
    
                return [
                    "view" => VIEW_DIR."security/signup.php",
                    ];
            }


            public function logIn() {

                if(isset($_SESSION['user'])){
                        header("Location: index.php?ctrl=security&action=displayLogIn");
                }

                $userManager= new UserManager();
                $session = new Session();

                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                $user = $userManager->findUserByUsername($username);

                


                if($username && $password && $user) {
                    
                    // echo "<pre>";
                    // var_dump($user);
                    // echo "</pre>";
                    $hash = $user->getPassword();
                    if(password_verify($password, $hash)) {

                        $session->setUser($user);
                        header("Location: index.php");
                        return [
                            "view" => VIEW_DIR."index.php?ctrl=security&action=displayLogIn",
                        ];
                        
                    } else {
                        
                        header("Location: index.php?ctrl=security&displayLogIn"); exit;
                    }
                }
                
                
                
                
            // } else {

            // }

            return [
                "view" => VIEW_DIR."security/login.php",
                ];
        }

        public function logOut() {
            
            unset($_SESSION['user']);

            header('Location: index.php'); exit;

        }
    }