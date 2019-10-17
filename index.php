<?php
session_start();
require 'flight/Flight.php';

//Flight::register('db', 'mysqli', array('localhost', 'root', 'root', 'my_dbname'));

// How to set global variables
// Flight::set('root', 'http://myapp.com');
// Flight::get('root');

Flight::path(__DIR__ . '/app');
Flight::register('student', 'Student');

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

Flight::route('GET /', function () {
    echo 'hello get world!';
});

Flight::route('POST /', function () {
    Flight::json(array('id' => 123, 'name' => 'david'));
});

Flight::route('GET /@user(/(@id))', function ($user, $id) {
    echo "hello, $user with an id if of $id!";
});

Flight::route('POST /save', function () {
    $data = Flight::request()->data->getData();
    print_r($data);
});

Flight::route('POST /student(/(@id))', function ($id) {
    $user = Flight::auth();
    $student = Flight::student();
    $data = $student->getStudent($id);
    Flight::json($data);
});

//not working
Flight::route('PUT /save', function () {
    $data = Flight::request()->data->getData();
    print_r($data);
});

Flight::start();
