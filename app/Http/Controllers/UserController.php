<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $auth;
    private $database;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        // Auth to firebase
        $this->auth = app("firebase.auth");
        $this->database = app('firebase.database');
    }

    public function index(String $uid){

        $user = $this->auth->getUser($uid);

        $reference = $this->database->getReference('likedMovies/'.$uid);
        $likedMovies = $reference->getValue();

        //dd($likedMovies);

        // Return to index view
        return view("user.index", compact('user', "likedMovies"));
    }

    public function delete(String $uid){

        // Delete with given UID
        $this->auth->deleteUser($uid);

        // Return to users
        return redirect('/users');
    }

    public function create(){
        return view("user.create");
    }

    public function store(){

        $data = request()->validate([
            'displayName' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $userProperties = [
            'email' => $data['email'],
            'emailVerified' => false,
            'password' => $data['password'],
            'displayName' => $data['displayName'],
            'disabled' => false,
        ];

        $this->auth->createUser($userProperties);

        // Return to users
        return redirect('/users');

    }


    public function edit(String $uid){

        $user = $this->auth->getUser($uid);
        return view("user.edit", compact('user'));
    }

    public function update(String $uid){

        $data = request()->validate([
            'displayName' => 'required',
            'email' => ['required', 'email'],
        ]);

        $userProperties = [
            'email' => $data['email'],
            'displayName' => $data['displayName'],
        ];

        $user = $this->auth->updateUser($uid, $userProperties);

        return redirect("/user/".$user->uid);
    }

    public function sendPasswordReset(String $uid){

        $user = $this->auth->getUser($uid);

        $this->auth->sendPasswordResetLink($user->email);

        return redirect("/user/".$user->uid);
    }

    public function deleteMovie(String $uid, String $movieID){

        $this->database->getReference('likedMovies/'.$uid.'/'.$movieID)->remove();

        return redirect("/user/".$uid);
    }



}
