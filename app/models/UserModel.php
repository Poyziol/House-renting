<?php

namespace app\models;

use PDO;
use Flight;

class UserModel
{
    private $db;

    //Need db of type PDO
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    //Verify username and password of an user
    function check_user($email, $password)
    {   
        // TODO: Understand why the named placeholder binding (:name) doesn't work
        $query = "SELECT * FROM house_user WHERE email = ? LIMIT 1";
        $data = $this->db->prepare($query); // PDOStatement object
        $data->execute([$email]);

        $user = $data->fetch(PDO::FETCH_ASSOC); // Using fetch because we are only fetching ONE ROW (we use fetchAll if it's all the rows we wanna fetch)
        if (!$user) {
            return ['message' => 'User not found'];
        }
        if ($user['password'] !== $password) {
            return ['message' => 'Invalid password'];
        }

        return ['message' => 'success', 'user' => $user];
    }

    //Verify username and password of an admin
    function check_admin($name, $password)
    {
        // Does same things as the check_user so I just called it here
        $result = $this->check_user($name, $password);
        if (!$result['message'] !== 'success') 
            return $result;
        
        $user = $result['user'];
        if ($user['is_admin'] != 1) {
            return ['message' => 'You are not amin'];
        }

        return ['message' => 'success', 'user' => $user];
    }

    //add an user with his new name and password
    public function login_sign($email, $username, $tel, $password) {
        // Check if that user already exist
        $query = "SELECT * FROM house_user WHERE email = ? LIMIT 1";
        $STH = $this->db->prepare($query);
        $STH->execute([$username]);
        
        if ($STH->fetch(PDO::FETCH_ASSOC)) 
            return ['status' => 'error', 'message' => 'Username already exists'];

        // Insert 
        $query = "INSERT INTO house_user (email, username, password, tel) VALUES (?, ?, ?, ?)"; // role is by default client
        $STH = $this->db->prepare($query);

        if ($STH->execute([$email, $username, $password, $tel])) 
            return ['status' => 'success', 'message' => 'New user registered'];

        return ['status' => 'error', 'message' => 'Failed to register user'];
    }
}
