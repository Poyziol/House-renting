<?php

namespace app\controllers;

use app\models\UserModel;
use Flight\Engine;
use Flight;

class LoginController
{
	protected $user_model;

	//create an instance of the attribute with static db as parameter on the constructor(doesn t work work on some PC if you don t add)
	public function __construct()
	{
		$this->user_model = new UserModel(Flight::db()); //optionnal
	}

	//send to login.php and replace $page with user
	public function user()
	{
		$data = ['page' => "signin_user"];
		Flight::render('auth/body', $data);
	}

	//send to login.php and replace $page with admin
	public function admin()
	{
		$data = ['page' => "signin_admin"];
		Flight::render('auth/body', $data);
	}

	//send to login.php and replace $page with sign-up
	public function sign_up()
	{
		$data = ['page' => "signup_user"];
		Flight::render('auth/body', $data);
	}

	//Authentificate username and password of an user
	public function login_user()
	{
		$data = Flight::request()->data;

		$email = $data->email;
		$password = $data->password;

		$result = $this->user_model->check_user($email ,$password);

		if ($result['message'] == 'success') {
			// Made session start at bootstrap.php file
			$_SESSION['user'] = $result['user'];
			Flight::redirect('/main');
		} else {
			$data = ['page' => 'user', 'message' => "Invalid username or password."];
			// $data = ['page' => 'user', 'message' => $result['message']]; // Used for debugging 
			Flight::render('auth/body', $data);
		}
	}

	public function login_admin()
	{
		$data = Flight::request()->data;

		$username = $data->username;
		$password = $data->password;

		$result = $this->user_model->check_admin($username, $password);

		if ($result['message'] == 'success') {
			$_SESSION['user'] = $result['user'];
			Flight::redirect('/admin');
		} else {
			$data = ['page' => 'signin_admin', 'message' => "Invalid username or password."];
			Flight::render('auth/body', $data);
		}

	}

	public function login_sign() {
        $data = Flight::request()->data;

        $username = $data->username;
        $email = $data->email;
        $tel = $data->tel;
        $password = $data->password;

        try {
            // Add user
            $result = $this->user_model->login_sign($email, $username, $password, $tel);

            if ($result['status'] === 'success') {
                $data = ['page' => 'signin_user', 'message' => 'User created.'];
                Flight::render('auth/body', $data);
            } else {
                $data = ['page' => 'signup_user', 'message' => $result['message']];
                Flight::render('auth/body', $data);
            }
        } catch (\Exception $e) {
            Flight::render('error', ['message' => "AuthController->signup_user(): " . $e-> getMessage()]);
        }
    }

	public function logout() {
        session_destroy();
        Flight::redirect('/');
    }
}