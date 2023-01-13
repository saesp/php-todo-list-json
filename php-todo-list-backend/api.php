<?php
// autorizzare il nostro server ad accettare richieste provenienti anche dal nostro progetto Vue
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

// trasformare dati PHP in dati JSON, leggibili quindi da JS
header('Content-Type: application/json');

// per leggere il contenuto del file, usare "file_get_contents()" che restituisce una stringa
$jsonTodoList = file_get_contents("todo.json");

echo $jsonTodoList;