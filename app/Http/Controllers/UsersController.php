<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Sodium\add;

class UsersController extends Controller
{

    private $auth;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        // Auth to firebase
        $this->auth = app("firebase.auth");
    }

    public function index(){

        // Fetch 1.000 users
        $users = $this->auth->listUsers($defaultMaxResults = 1000, $defaultBatchSize = 1000);

        // Return to index view
        return view("users.index", ['users' => $users ]);
    }
}
