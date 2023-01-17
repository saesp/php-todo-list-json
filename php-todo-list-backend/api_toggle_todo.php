<?php
include('header.php');


$ind = $_GET['ind'];


// DA JSON A PHP
$jsonTodoList = file_get_contents("todo.json");
$todoList = json_decode($jsonTodoList);


// cambiare stato di un elemento dell'array
if ($todoList[$ind]->completed === true) {
    $todoList[$ind]->completed = false;
} else {
    $todoList[$ind]->completed = true;
}

// DA PHP A JSON
$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);