<?php
namespace App\Controllers;

class AccountController
{
  public function showProfile()
  {
    // Fetch user data and render the profile page
    include __DIR__ . '/../../pages/account/profile.php';
  }
}

