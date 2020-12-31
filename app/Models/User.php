<?php

namespace Socks\Models;

use Socks\Utils\Database;
use PDO;

class User extends CoreModel
{
    private $lastname;
    private $email;
    private $password;
    private $role;

    /**
     * Find 1 user by his id
     *
     * @param integer $id
     * @return self
     */
    public static function find(int $id)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `user` WHERE `id` = :id ;";

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id);
        $pdoStatement->execute();

        $user = $pdoStatement->fetchObject(User::class);

        if ($user == false) {
            return null;
        }

        return $user;
    }

    /**
     * Find all users
     *
     * @return self []
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `user`;";

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute();

        $users = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $users;
    }

    /**
     * Find an user by his email
     *
     * @param string $email
     * @return self
     */
    public static function findByEmail(string $email)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `user` WHERE `email`= :email ;";

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':email', $email);
        $pdoStatement->execute();

        $user = $pdoStatement->fetchObject(User::class);

        if ($user == false) {
            return null;
        }

        return $user;
    }

    /**
     * Insert a new user
     */
    public function insert()
    {
        // Request to insert a new user
        $sql = 'INSERT INTO `user` (name, lastname, email, password, role)
                VALUES (:name, :lastname, :email, :password, :role)';
        // Connexion to DB
        $pdo = Database::getPDO();
        // Prepare
        $pdoStatement = $pdo->prepare($sql);
        // Set parameters
        $pdoStatement->bindValue(':name', $this->name);
        $pdoStatement->bindValue(':lastname', $this->lastname);
        $pdoStatement->bindValue(':email', $this->email);
        $pdoStatement->bindValue(':password', $this->password);
        $pdoStatement->bindValue(':role', $this->role);
        // Execute
        $result = $pdoStatement->execute();
        // If it is ok, it will be added after the last ID
        if ($result) {
            $this->id = $pdo->lastInsertId();
        }

        return $result;
    }

    /**
     * Edit an user
     */
    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "UPDATE `user`
                SET
                    `name` = :name,
                    `lastname` =  :lastname,
                    `email` = :email,
                    `password` = :password,
                    `role` = :role
                WHERE `id` = :id
                ;";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':name', $this->name);
        $pdoStatement->bindValue(':lastname', $this->lastname);
        $pdoStatement->bindValue(':email', $this->email);
        $pdoStatement->bindValue(':password', $this->password);
        $pdoStatement->bindValue(':role', $this->role);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        $pdoStatement->execute();

        return($pdoStatement->rowCount() > 0);
    }

    /**
     * Delete an user
     */
    public function delete(int $id)
    {
        // Request to delete an user
        $sql = 'DELETE FROM `user` WHERE `id` = :id';
        // Connexion to DB
        $pdo = Database::getPDO();
        // Prepare
        $pdoStatement = $pdo->prepare($sql);
        // Set parameters
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        // Execute
        $pdoStatement->execute();

        return ($pdoStatement->rowCount() == 1);
    }

    /**
     * Insert the token to reset password
     */
    public static function tokenResetPassword($email, $token)
    {
        // dump($email);
        // dump($token);

        // Request to insert a new token
        $sql = "INSERT INTO `password_reset` (email, token)
                VALUES (:email, :token)
                ";
        // Connexion to DB
        $pdo = Database::getPDO();
        // Prepare
        $pdoStatement = $pdo->prepare($sql);
        // Set parameters
        $pdoStatement->bindValue(':email', $email);
        $pdoStatement->bindValue(':token', $token);

        // Execute
        $result = $pdoStatement->execute();

        return $result;
    }

    /**
     * Retrieve the user email from the password_reset table
     */
    public static function findByToken($token)
    {
        // dump($token);

        // Request to find the user
        $sql = "SELECT * FROM `password_reset`
                JOIN `user` ON user.email = password_reset.email
                WHERE `token`= :token ;";
        // Connexion to DB
        $pdo = Database::getPDO();
        // Prepare
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':token', $token);
        $pdoStatement->execute();

        $user = $pdoStatement->fetchObject(User::class);

        if ($user == false) {
            return null;
        }

        return $user;
    }

    public static function saveByToken($email, $password)
    {
        $pdo = Database::getPDO();

        $sql = "UPDATE `user`
                SET
                    `password` = :password
                WHERE `email` = :email
                ;";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':email', $email);
        $pdoStatement->bindValue(':password', $password);

        $pdoStatement->execute();

        return($pdoStatement->rowCount() > 0);
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }
}
