<?php
session_start();
require 'flight/Flight.php';

// How to set global variables
// Flight::set('root', 'http://myapp.com');
// Flight::get('root');

Flight::path(__DIR__ . '/app');
Flight::register('user', 'User');
Flight::register('item', 'Item');

//authentication!!!

//use -> Flight::auth();
//checks that the user is logged in
Flight::map('auth', function () {
    // user is not authenticated
    if (!array_key_exists('id', $_SESSION)) {
        session_destroy();
        Flight::json(['You are not logged in.'], $code = 401);
        exit();
    } else {
        return $_SESSION['id'];
    }
});

//restricts users from changing other users info
Flight::map('userAuth', function ($id) {
    Flight::auth();
    if ($_SESSION['id'] != $id) {
        Flight::json(['You do not have permission.'], $code = 401);
        exit();
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
Flight::route('POST /user/create', function () {
    $data = Flight::request()->data->getData();
    Flight::user()->saveUser($data['email'], $data['password'], $data['name']);
    Flight::json($data['email']);
});

//updates user email
Flight::route('POST /user/@id/email', function ($id) {
    Flight::userAuth($id);
    $data = Flight::request()->data->getData(); //change this line
    $user = Flight::user()->updateUserEmail((int) $id, $data['email']);
    Flight::json($user);
});

Flight::route('DELETE /user/@id', function ($id) {
    Flight::auth();
    Flight::user()->deleteUser((int) $id);
});


//item routs!!!

//creates item
Flight::route('POST /item/create', function () {
    $data = Flight::request()->data->getData();
    Flight::item()->saveItem($data['title'], $data['image'], $data['description']);
    Flight::json($data['title']);
});

Flight::route('DELETE /item/@id', function ($id) {
    //Flight::auth();
    Flight::item()->deleteItem((int) $id);
});

Flight::start();
