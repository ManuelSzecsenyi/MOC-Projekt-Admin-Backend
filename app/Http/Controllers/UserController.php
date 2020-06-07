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

    public function index(String $uid){

        $user = $this->auth->getUser($uid);

        // Return to index view
        return view("user.index", compact('user'));
    }

    public function delete(String $uid){

        // Delete with given UID
        $this->auth->deleteUser($uid);

        // Return to users
        return redirect('/users');
    }


}
