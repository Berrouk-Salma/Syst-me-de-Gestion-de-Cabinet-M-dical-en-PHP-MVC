<?php
namespace app\Controllers;

use app\Core\Controller;
use app\Models\UserModel;

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByUsername($username);
            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user'] = $user;
                header('Location: /');
            } else {
                echo "Invalid username or password!";
            }
        } else {
            $this->view('auth/login');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /');
    }
}