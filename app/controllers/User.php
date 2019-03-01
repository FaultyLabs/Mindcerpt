<?php 

class UserController extends Controller {
    public function __construct(){
        //Define All required models here
        $this->user = $this->model('users');
        $this->mailer = $this->model('mailer');
        $this->friendModel = $this->model('Friends_relationship');
    }

    public function index() {

    }

    public function requestFriend() {
        $this->friendModel->sendFriendRequest(); 

        $this->redirect('profile');
    }

    public function profile () {
        // App::debug($this->friendModel->getFriendStatus($id), true);
        $result = $this->friendModel->getFriendStatus();
        // var_dump($result);
        // die();
        
        $data['friend_status'] = 'Add Friend';

        if (!empty($result)) {
            $relationship_type = $result->relationship_status;

            switch($relationship_type){
                case 'pending_first_second':
                    $data['friend_status'] = 'Request Pending Approval';
                break;
                case 'pending_second_first':
                    $data['friend_status'] = 'Accept Request';
                break;
                case 'friends':
                    $data['friend_status'] = 'Friends';
                break;
                case 'block_first_second':
                    $data['friend_status'] = 'User blocked you';
                break;
                case 'block_second_first':
                    $data['friend_status'] = 'You blocked this user';
                break;
                case 'block_both':
                    $data['friend_status'] = 'Mutual Block';
                break;

                default:
                    break;
            }
        } else {
            $data['friend_status'] = 'Add Friend';
        }
                    
        // $data['loginError'] = '';

        $this->view('profile', $data);
    }

    public function explore () {
        $this->user->getUsersExceptMe();

        $this->view('explore');
    }

    public function myProfile () {

    }

    public function register() {
        $data = [
            'results'         => '',
            'formData'        => '',
            'registerSuccess' => ''
        ];
        if (Request::get()->has_post()) {
            $formData = Request::get()->post();
            $result = $this->user->register($formData);

            if ($result === true) {
                $data['registerSuccess'] = 'Registration completed';
                $this->redirect('register',$data);
                $this->mailer->sendMail($formData['email']);
            } else {
                $data['results'] = $result;
                $data['formData'] = (object)$formData;
                $this->redirect('register',$data);
            }
        } else{
            $this->view('register', $data);
        }
    }

    public function login() {
        $data = [
            'result'         => '',
            'formData'        => '',
            'registerSuccess' => ''
        ];

        if (Request::get()->has_post()) {
            $formData = Request::get()->post();
            $result = $this->user->login($formData);

            if (is_string($result)) {
                $data['result'] = $result;
                $data['formData'] = $formData['email'];
                $this->redirect('login',$data);
            } else {
                $this->redirect(URL_ROOT . './home/index');
            }
        } else {
            $this->view('login', $data);
        }
    }

    public function logout() {
        session_end('userId');
        $this->redirect(URL_ROOT . './home/index');
    }
}