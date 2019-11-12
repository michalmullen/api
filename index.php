<?php
session_start();
require 'flight/Flight.php';

// How to set global variables
// Flight::set('root', 'http://myapp.com');
// Flight::get('root');

Flight::path(__DIR__ . '/app');
Flight::register('user', 'User');
Flight::register('item', 'Item');

//authentication
//use -> Flight::auth();
Flight::map('auth', function () {
    // user is not authenticated
    if (!array_key_exists('id', $_SESSION)) {
        session_destroy();
        Flight::json(['User is not logged in.'], $code = 401);
        exit();
    } else {
        return $_SESSION['id'];
    }
});


// routes
Flight::route('/', function () {
    echo 'hello world!';
});


//login routs!!!

Flight::route('POST /login', function () {
    $data = Flight::request()->data->getData();
    $count = Flight::user()->loginUser($data['email'], $data['password'], False);
    if ($count == 1) {
        $user = Flight::user()->loginUser($data['email'], $data['password'], True);
        $_SESSION["id"] = $user['id'];
        Flight::json([$_SESSION["id"]]);
    } else {
        session_destroy();
        Flight::json(['Username or password do not match.'], $code = 401);
    }
});

Flight::route('GET /logout', function () {
    Flight::auth();
    session_destroy();
    Flight::json(['logout route']);
});


//user routs!!!

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
    Flight::auth();
    Flight::user()->deleteUser((int) $id);
});


//item routs!!!

//creates item
Flight::route('POST /item/save', function () {
    $data = Flight::request()->data->getData();
    Flight::item()->saveItem($data['title'], $data['image'], $data['description']);
    Flight::json($data['title']);
});

Flight::start();
