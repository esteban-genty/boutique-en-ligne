<?php
namespace App\Controllers; 

require_once 'app/helpers/auth.php';

class ProfileController
{
  public function show()
  {
    if (!isLoggedIn()) {
      header('Location: /boutique-en-ligne/login');
      exit;
    }

    $data = [
      'user' => [
        'name' => $_SESSION['user_name'] ?? 'N/A',
        'email' => $_SESSION['user_email'] ?? 'N/A',
        'is_admin' => $_SESSION['is_admin'] ?? false
      ]
    ];

    
    // var_dump($data['user']);

    $this->render('profile', $data);
  }

  private function render($view, $data = [])
  {
    extract($data);

    require_once "app/views/$view.php";
  }
}