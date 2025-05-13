<?php

namespace App\Controllers;

require_once 'app/helpers/auth.php';

class AdminController
{
  public function dashboard()
  {
    if (!isAdmin()) {
      header('Location: /boutique-en-ligne/login');
      exit;
    }

    require_once 'app/views/admin/dashboard.php';
  }
}
