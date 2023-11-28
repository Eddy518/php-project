<?php

use Core\App;
use Core\Database;
use Core\Validator;

//find the corresponding note

$db = App::resolve(Database::class);

$currentUserID = 21;

$note = $db->query('select * from notes where  notes_id = :id', [
    ':id' => $_POST['id']
])->findOrFail();

//authorize that current user can edit the note

authorize($note['user_id'] === $currentUserID);

//validate the form
$errors = [];
if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "The body needs to be less than 1000 characters and more than 1 character";
}
//if no validation errors, update notes in the database table
if (count($errors)){
    return view('notes/edit',[
        'heading'=>'Edit note',
        'errors'=>[],
        'note'=>$note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE notes_id = :id',[
    'id'=> $_POST['id'],
    'body'=>$_POST['body']
]);

//redirect the user
header('location: /notes');
die();
