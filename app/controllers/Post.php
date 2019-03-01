<?php 

    class PostController extends Controller {
        public function __construct() {
            //Define All required models here
            $this->user = $this->model('Users');
            $this->post = $this->model('Posts');
            // $this->comments = $this->model('Comments');
            $this->tag = $this->model('Tags');
        }

        public function id($id) {
            $singlePost = $this->post->getPost($id);
            $allComments = $this->comments->fetchComments($id);
            $authorData = $this->user->getUserData($id);

            $data['post'] = $singlePost;
            $data['authorData'] = $authorData;

            $data['title'] = 'Post';
            $this->view('index', $data);
        }

        public function create() {
            $data = [
                'postMessage' => '',
                'tags' => ''
            ];

            if(Request::get()->has_post()) {
                $formData = Request::get()->post();
                // var_dump($formData);
                // die();
                //Testing out the $formData variable
                // App::debug($formData);
                // var_dump($formData);

                $result = $this->post->publish_post($formData);
                
                // var_dump($result);
                // App::debug($result, true);
             
                if ($result) {
                    $data['postMessage'] = 'success';
                    $this->view('create', $data);
                } else {
                    $data['postMessage'] = 'error';
                    
                    $this->view('create', $data);
                }
            } else{
                $data['tags'] = $this->tag->getTags();

                $this->view('create', $data);
            }
        }
    }
