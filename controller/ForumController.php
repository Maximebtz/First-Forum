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


            
        public function listTopics(){

            $id = $_GET['id'];

            $topicManager = new TopicManager();
            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAllTopicsByCategory($id, ["creationDate", "DESC"])
                    // "topics" => $topicManager->findAll(["creationDate", "DESC"])
                    ]
                ];
        }
        


        public function listPosts(){

            $id = $_GET['id'];
            $postManager = new PostManager();
            return [
                "view" => VIEW_DIR."forum/listPosts.php",
                "data" => [
                    "posts" => $postManager->findAllPostsByTopics($id, ["creationDate", "DESC"])
                    // "topics" => $topicManager->findAll(["creationDate", "DESC"])
                    ]
                ];
        }
    }
