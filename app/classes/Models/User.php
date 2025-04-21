<?php

namespace App\Models;

class User {
  private $id;
  private $username;
  private $first_name;
  private $last_name;
  private $email;
  private $password;
  private $created_at;
  private $updated_at;
  private $bio;
  private $role;
  public function __construct($id, $username, $first_name, $last_name, $email, $password, $created_at, $updated_at, $bio, $role) {
    $this->id = $id;
    $this->username = $username;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->email = $email;
    $this->password = password_hash($password, PASSWORD_BCRYPT);
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
    $this->bio = $bio;
    $this->role = $role;
  }

  public function getId() {
    return $this->id;
  }
  public function getUsername() {
    return $this->username;
  }
  public function getFirstName() {
    return $this->first_name;
  }

  private function createUser($username, $email, $password) {
    
    $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
    return $stmt->execute();
  }


}
