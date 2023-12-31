<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\CategoryManager;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    
    class ForumController extends AbstractController implements ControllerInterface{


        public function index() {

            return $this->listCategories();

        }


/********** Lists**********/ 

        public function listCategories(){
          

            $categoryManager = new CategoryManager();

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll(['name', 'ASC'])
                    ]
                ];
        }

            

        public function listTopics($idCategory){

            $idCategory = filter_var($idCategory, FILTER_VALIDATE_INT);

            $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAllTopicsByCategory($idCategory, ["creationDate", "DESC"])
                    ]
                ];
        }
        


        public function listPosts($idTopic){

            $idTopic = filter_var($idTopic, FILTER_VALIDATE_INT);

            $postManager = new PostManager();
        
            return [
                "view" => VIEW_DIR."forum/listPosts.php",
                "data" => [
                    "posts" => $postManager->findAllPostsByTopics($idTopic, ["creationDate", "ASC"])
                ]
            ];
        }




/********** Adds **********/ 

        public function addCategory(){

            $categoryManager = new categoryManager();

            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $categoryManager->add(["name" => $name, 
                                "description" => $description]);
            
            header('Location: index.php?ctrl=forum&action=listCategories');


            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll()
                    ]
                ];
        }



        public function addTopic($idCategory){

            
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            date_default_timezone_set('Europe/Paris');
            $date = date('Y-m-d H:i:s');
            $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            
            $topicManager = new TopicManager();
            $postManager = new PostManager();
            
            $idTopic = $topicManager->add(['title' => $title, 
                                            'description' => $description, 
                                            'creationDate' => $date, 
                                            'category_id' => $idCategory]);
                                                        
                        $postManager->add(['text' => $text, 
                                            'creationDate' => $date,
                                            'topic_id' => $idTopic]);

            header('Location: index.php?ctrl=forum&action=listTopics&id=' . $idCategory .'');
            
            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAllTopicsByCategory($idCategory, ["creationDate", "DESC"])
                    ]
                ];

        }



        public function addPost($idTopic)
        {   
            if(isset($_SESSION['user'])){
                $postManager = new PostManager();
                
                $post = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                date_default_timezone_set('Europe/Paris');
                $date = date('Y-m-d H:i:s');
                
                // Insérer le nouveau message dans la base de données
                $postManager->add(['text' => $post, 
                                'creationDate' => $date, 
                                'topic_id' => $idTopic, 
                                'user_id' => $_SESSION['user']->getId()]);
                
                header('Location: index.php?ctrl=forum&action=listPosts&id=' . $idTopic);
                
                // Données à retourner
                return [
                    "view" => VIEW_DIR . "forum/listPosts.php",
                    "data" => [
                        "posts" => $postManager->findAllPostsByTopics($idTopic, ["creationDate", "ASC"])
                    ],
                ];
            } else {
                header('Location: index.php?ctrl=forum&action=displayLogIn');
            }
        }
    


/********** Delete **********/ 

    public function deleteCategory($idCategory){

        $categoryManager = new categoryManager();

        $categoryManager->delete($idCategory);

        header('Location: index.php?ctrl=forum&action=listCategories');

        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "data" => [
                "categories" => $categoryManager->findAll()
                ]
            ];
    }



    public function deleteTopic($idTopic){

        $topicManager = new topicManager();

        $topicManager->delete($idTopic);

        header('Location: index.php?ctrl=forum&action=listTopic&id=' . $idTopic .'');

        return [
            "view" => VIEW_DIR."forum/listTopic.php",
            "data" => [
                "topics" => $topicManager->findAll()
                ]
            ];
    }



/********** Update **********/ 

    public function updateCategory($idCategory){
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $categoryManager = new CategoryManager();


        $categoryManager->update([
                                'name' => $name,
                                'description' => $description
                                ], 
                                $idCategory);

        return [
            "view" => VIEW_DIR . "forum/listCategories.php",
            "data" => [
                "categories" => $categoryManager->findAll()
            ]
        ];
    }
}