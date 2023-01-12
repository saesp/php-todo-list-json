<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    // autorizzare il nostro server ad accettare richieste provenienti anche dal nostro progetto Vue
    header("Access-Control-Allow-Origin: http://127.0.0.1:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");


    // dati
    $toDoList = [
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
    header('Content-Type: application/json');
    echo json_encode($toDoList);

    // per leggere il contenuto del file, usare file_get_contents() che restituisce una stringa
    $jsonTodoList = file_get_contents("todo.json");
    // tradurre una stringa da formato json in variabile PHP
    $todoList = json_decode($jsonTodoList, true);

    // scrivere i dati traformati da json_encode nel file todo.json
    file_put_contents("todo.json", json_encode($toDoList));

    ?>
</head>

<body>

    <?php


    ?>


</body>

</html>