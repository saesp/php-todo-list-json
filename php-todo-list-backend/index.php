<?php
// dati
$todoList = [
    [
        "text" => 'spesa',
        "done" => false
    ],
    [
        "text" => 'studiare',
        "done" => true
    ],
    [
        "text" => 'integratore',
        "done" => false
    ],
];

// trasformare dati PHP in dati JSON, leggibili quindi da JS
$jsonTodoList = json_encode($todoList);

// scrivere i dati traformati da "json_encode" nel file "todo.json"
file_put_contents("todo.json", $jsonTodoList);