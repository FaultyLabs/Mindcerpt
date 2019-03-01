<?php 
  // namespace app\models;
  // require app\base\Model;

  use Rakit\Validation\Validator;

  class Users extends Model {
    public function getUserData($id) {
      return $this->findbyid($id);
    }

    // read data from users table except current user
    public function getUsersExceptMe() {
      $columns = ['*'];
      $where = ['id' => session('userId')];
      // , 'password' => password_verify ($formData['password'], PASSWORD_DEFAULT) 

      // readexcept() simply negates the equals sign of the read() function
      $data = $this->readexcept($columns, $where);
      var_dump($data);
      die();
    }

    public function login($formData) {
        $columns = ['*'];
        $where = ['email' => $formData['email']];
        // , 'password' => password_verify ($formData['password'], PASSWORD_DEFAULT) 
      
        $data = $this->read($columns, $where);
        
 
        if($data) {
          if (password_verify($formData['password'], $data[0]->password))  {
            session('userId', $data[0]->id);
            
            return true;
          } else {
            return 'Incorrect password, please try again.';
          }
        } else {
          return 'Oops! We do not recognize this email.';
        }
    }

    public function register($formData) {
      $validator = new Validator;

      // make it
      $validation = $validator->make($formData, [
          'firstname'             => 'required',
          'lastname'              => 'required',
          'email'                 => 'required|email',
          'password'              => 'required|min:6',
          'confirm_password'      => 'required|same:password'
      ]);
      
      // then validate
      $validation->validate();
      
      if ($validation->fails()) {
          // handling errors
          $errors = $validation->errors();
          return $errors->all('<li class="list-group-item list-group-item-danger">:message</li>');
      } else {

        $columns = ['*'];
        $where = ['email' => $formData['email']];
        // , 'password' => password_verify ($formData['password'], PASSWORD_DEFAULT) 
      
        $data = $this->read($columns, $where);
        
 
        if($data) {
          return array('<li class="list-group-item list-group-item-danger">
                             Email already exists.
                        </li>');
        } else {
            $this->surname = $formData['lastname'];
            $this->firstname = $formData['firstname'];
            $this->email =  $formData['email'];
            $this->password = password_hash($formData['password'], PASSWORD_DEFAULT);

            if ($this->save()) {
              return true;
            } else {
              return array('<li class="list-group-item list-group-item-danger">
                                  Oops! Something went wrong, Please try again.
                            </li>');
            }
          }
      }
    } 
  }
