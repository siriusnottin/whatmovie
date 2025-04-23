<?php

namespace App\Models;

class User
{
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

  public function __construct($id, $username, $first_name, $last_name, $email, $password, $created_at, $updated_at, $bio, $role)
  {
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

  public function getId()
  {
    return $this->id;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function getFirstName()
  {
    return $this->first_name;
  }
  public function getLastName()
  {
    return $this->last_name;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getCreatedAt()
  {
    return $this->created_at;
  }
  public function getBio()
  {
    return $this->bio;
  }
  public function getRole()
  {
    return $this->role;
  }

  private function createUser($username, $email, $password)
  {
    $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
    return $stmt->execute();
  }

  public static function find($id, $db)
  {
    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);

    if ($user) {
      return new self(
        $user['id'],
        $user['username'],
        $user['first_name'],
        $user['last_name'],
        $user['email'],
        $user['password'],
        $user['created_at'],
        $user['updated_at'],
        $user['bio'],
        $user['role']
      );
    }

    return null;
  }
}
