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


        public function listCategories(){
          

            $categoryManager = new CategoryManager();

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll()
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
                    // "topics" => $topicManager->findAll(["creationDate", "DESC"])
                    ]
                ];
        }
        


        public function addTopic($idCategory){

            
            $title = filter_input(INPUT_POST, 'title',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date = date('Y-m-d H:i:s');

            
            $topicManager = new TopicManager();

            var_dump($topicManager);
            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topic" => $topicManager->add(['title' => $title, 'description' => $description, 'creationDate' => $date, 'category_id' => $idCategory]),
                    "topics" => $topicManager->findAllTopicsByCategory($idCategory, ["creationDate", "DESC"])
                    ]
                ];
        }


        public function addCategory(){

            $categoryManager = new categoryManager();

            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "category" => $categoryManager->add(["name" => $name, "description" => $description]),
                    "categories" => $categoryManager->findAll()
                    // "topics" => $topicManager->findAll(["creationDate", "DESC"])
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
    }
