<?php

  class HomeController extends Controller {

    public function __construct(){
      //Define All required models here
      $this->post = $this->model('posts');

    }

    public function index(){
      $posts = (object)$this->post->getAllPosts();

      $data = [
        'title' => 'Home Page',
        'posts' => $posts
      ];
      $this->view('index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Page'
      ];
      
      $this->view('about', $data);
    }

    public function contact(){
      $this->view('contact');
    }

    // public function mail(){
    //   // $this->view('welcome');
    //   $result = $this->mail->sendMail('aninye@ymail.com');
    //   var_dump($result);
    // }
  }