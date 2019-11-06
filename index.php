<?php
session_start();
require 'flight/Flight.php';

// How to set global variables
// Flight::set('root', 'http://myapp.com');
// Flight::get('root');

Flight::path(__DIR__ . '/app');
Flight::register('user', 'User');

Flight::map('auth', function () {
    // user is not authenticated
    if (!array_key_exists('id', $_SESSION)) {
        session_destroy();
        Flight::redirect('/');
        exit();
    } else {
        return $_SESSION['id'];
    }
});


// routes
Flight::route('/', function () {
    echo 'hello world!';
});


// with id of user gives email and password
Flight::route('GET /user/@id', function ($id) {
    Flight::auth();
    $data = Flight::user()->getUser($id);
    Flight::json($data);
});

//creates user
Flight::route('POST /user/save', function () {
    $data = Flight::request()->data->getData();
    Flight::user()->saveUser($data['email'], $data['password']);
    Flight::json($data['email']);
});

//updates user email
Flight::route('POST /user/@id/email', function ($id) {
    //Flight::auth();
    $data = Flight::request()->data->getData();
    $user = Flight::user()->updateUserEmail((int) $id, $data['email']);
    Flight::json($user);
});

Flight::route('DELETE /user/@id', function ($id) {
    //$user = Flight::auth();
    Flight::user()->deleteUser((int) $id);
});

//user login
Flight::route('POST /login', function () {
    $data = Flight::request()->data->getData();
    $count = Flight::user()->loginUser($data['email'], $data['password'], False);
    if ($count == 1) {
        $user = Flight::user()->loginUser($data['email'], $data['password'], True);
        $_SESSION["id"] = $user['id'];
        Flight::json($_SESSION["id"]);
    } else {
        session_destroy();
        Flight::json('Username or password do not match.');
    }
});

//user logout
Fight::route('GET /logout', function () {
    session_destroy();
});



//not working
Flight::route('PUT /save', function () {
    $data = Flight::request()->data->getData();
    print_r($data);
});

Flight::start();
