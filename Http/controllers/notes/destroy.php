<?php

use Core\App;
use Core\Database;
$db = App::resolve(Database::class);

$currentUserID = 21;

//form was submitted, delete the current note
$note = $db->query('select * from notes where  notes_id = :id', [
    ':id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserID);

$db->query('delete from notes where notes_id = :id', [
    'id' => $_POST['id']
]);
header('location: /notes'); //redirect to notes section after deleting the note
exit();



