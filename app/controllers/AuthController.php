<?php

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $email = $_POST['email'];
          $password = $_POST['password'];
  
          $user = $this->userModel->findByEmail($email);
  
          if ($user && password_verify($password, $user['password'])) {
              session_start();
              $_SESSION['user_id'] = $user['id'];
              $_SESSION['user_name'] = $user['name'];
              $_SESSION['is_admin'] = $user['is_admin'];
  
              // Redirection
              if ($user['is_admin']) {
                  header('Location: /admin/dashboard');
              } else {
                  header('Location: /user/dashboard');
              }
              exit;
          } else {
              $error = "Email ou mot de passe incorrect.";
              require_once '../app/views/auth/login.php';
          }
  
      } else {
          require_once '../app/views/auth/login.php';
      }
  }
  

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
