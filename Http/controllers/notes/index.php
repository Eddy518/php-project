<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('select * from notes where user_id = 21;')
            ->get();

view('notes/index',[
    'heading'=>'My Notes',
    'notes' => $notes
]);
