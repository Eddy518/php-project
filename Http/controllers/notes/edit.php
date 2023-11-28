<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserID = 21;

$note = $db->query('select * from notes where  notes_id = :id', [
    ':id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserID);

view('notes/edit',[
    'heading'=>'Edit note',
    'errors'=>[],
    'note'=>$note
]);
