<?php
include('header.php');


// per leggere il contenuto del file, usare "file_get_contents()" che restituisce una stringa
$jsonTodoList = file_get_contents("todo.json");

echo $jsonTodoList;