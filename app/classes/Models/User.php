<?php

namespace App\Models;
use App\Core\Database;

/**
 * Class User
 *
 * This class represents a user in the application.
 * It provides methods for user-related operations such as creating *and retrieving users.
 *
 * @package App\Models
 */

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
  private $db;

  public function __construct(array $userData, Database $db)
  {
    $this->db = $db;
    $this->id = $userData['id'] ?? null;
    $this->username = $userData['username'] ?? null;
    $this->first_name = $userData['first_name'] ?? null;
    $this->last_name = $userData['last_name'] ?? null;
    $this->email = $userData['email'] ?? null;
    $this->password = isset($userData['password']) ? password_hash($userData['password'], PASSWORD_BCRYPT) : null;
    $this->created_at = $userData['created_at'] ?? null;
    $this->updated_at = $userData['updated_at'] ?? null;
    $this->bio = $userData['bio'] ?? null;
    $this->role = $userData['role'] ?? null;
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

  public function createUser($username, $email, $password)
  {
    $stmt = $this->db->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
    $stmt->execute();
    return $this->db->getLastInsertId();
  }

  public static function find($id, $db)
  {
    $stmt = $db->prepare("SELECT id, username, first_name, last_name, email, password, created_at, updated_at, bio, role FROM user WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);

    if ($user) {
      return new self($user, $db);
    }

    return null;
  }

  public function updateUser($id, $username, $email, $bio)
  {
    $stmt = $this->db->prepare("UPDATE user SET email = :email WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
  }

  public function updateBio($id, $bio)
  {
    $stmt = $this->db->prepare("UPDATE user SET bio = :bio WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':bio', $bio);
    return $stmt->execute();
  }

  public function updatePassword($id, $password)
  {
    $stmt = $this->db->prepare("UPDATE user SET password = :password WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
    return $stmt->execute();
  }

  public function deleteUser($id)
  {
    $stmt = $this->db->prepare("DELETE FROM user WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }
}
