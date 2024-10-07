<?php

namespace App\Class;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Throwable;

class LoginWithFirebase
{
    public $auth;

    public function __construct()
    {
        $this->auth = Firebase::auth();
    }

    public function login($email, $password)
    {
        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($email, $password);
            if ($signInResult) {
                $firebaseUser = $signInResult->data();

                return $firebaseUser ? $firebaseUser : false;
            } else {
                return false;
            }
        } catch (Throwable $th) {
            // Log::error($th);
            return false;
        }

        // try {
        //     $signInResult = $auth->signInWithEmailAndPassword('user@example.com', 'password');
        //     // Sign-in successful
        // } catch (\Kreait\Firebase\Exception\AuthException $e) {
        //     // Handle sign-in error
        //     echo 'Failed to sign in: '.$e->getMessage();
        // }

    }

    public function getAll()
    {
        $users = $this->auth->listUsers($defaultMaxResults = 4000, $defaultBatchSize = 4000);

        return $users;
    }

    public function createUser($firebaseUser)
    {

        $user = User::create([
            'name' => $firebaseUser['displayName'],
            'email' => $firebaseUser['email'],
            'password' => Hash::make(request('password')),
        ]);

        return $user;
    }
}
