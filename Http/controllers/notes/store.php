<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

//require base_path("Validator.php");

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "The body needs to be less than 1000 characters and more than 1 character";
}
if (!empty($errors)) {
    return view('notes/create', [
        'heading' => 'Create a note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body,user_id) VALUES (:body,:user_id)', [
    ':body' => $_POST['body'],
    ':user_id' => 21
]);

header('location: /notes');
die();