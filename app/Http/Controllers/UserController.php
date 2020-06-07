<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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


        // Return to index view
        return view("user.index");
    }


}
