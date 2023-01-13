<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

$task = $_GET['task'];

// per leggere il contenuto del file, usare "file_get_contents()" che restituisce una stringa
$jsonTodoList = file_get_contents("todo.json");
// tradurre una stringa da formato json in variabile PHP
$todoList = json_decode($jsonTodoList);

// aggiungere elemento all'array (come array.push in JS)
$todoList[] = [
    "text" => $task,
    "completed" => false
];

// trasformare dati PHP in dati JSON, leggibili quindi da JS
$jsonTodoList = json_encode($todoList);
// scrivere i dati traformati da "json_encode" nel file "todo.json"
file_put_contents("todo.json", $jsonTodoList);