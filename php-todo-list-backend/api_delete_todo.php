<?php
include('header.php');


$ind = $_GET['ind'];


// DA JSON A PHP
$jsonTodoList = file_get_contents("todo.json");
$todoList = json_decode($jsonTodoList);


// rimuovere elemento dall'array
array_splice($todoList, $ind, 1);


// DA PHP A JSON
$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);