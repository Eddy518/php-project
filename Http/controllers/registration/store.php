<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$email = $_POST['email']; //make the email lowercase
$password = $_POST['password'];

//validate the user email and password
$errors = [];
if (!Validator::email($email)){
    $errors['email']  = 'Please enter a valid email address';
}
if (!Validator::string($password,7,255)){
    $errors['password']  = 'Password needs to be more than 7 characters';
}

if(!empty($errors)){
    return view('registration/create',[
        'errors'=>$errors
    ]);
}
//check if user email already exists
$db = App::resolve(Database::class);
$user = $db->query('SELECT * FROM users where email = :email',[
   'email'=>$email
])->find();
    //if user email exists
        //redirect them to the login page

if ($user){
    header('location: /');
    exit();
}
    // if user email !exists create new account
else{
    $db->query('INSERT INTO users(email,password) VALUES (:email,:password)',[
        'email'=>$email,
        'password'=> password_hash($password,PASSWORD_BCRYPT)
    ]);

    //mark that the user has logged in
    (new Authenticator)->login($user);

    header('location: /');
    exit();
}