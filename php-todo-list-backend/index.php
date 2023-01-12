<!-- Nello svolgere l’esercizio seguite un approccio graduale. Prima assicuratevi che la comunicazione tra *front-end* e *back-end* avvenga correttamente con il passaggio di parametri.

Lo step successivo è quello di “testare" l'invio di un *nuovo task*, sapendo che manca comunque la persistenza lato server (ancora non memorizzate i dati da nessuna parte).

Solo a questo punto sarà utile passare alla *lettura/scrittura* della lista da un file `JSON` in modo da garantire la *persistenza*. -->


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

    $newTodo = $_GET['newTodo'];

    // per leggere il contenuto del file, usare file_get_contents() che restituisce una stringa
    $jsonTodoList = file_get_contents("todo.json");
    // tradurre una stringa da formato json in variabile PHP
    $todoList = json_decode($jsonTodoList, true);

    $todoList[] = [
        "text" => $newTodo,
        "completed" => false
    ];

    // scrivere i dati traformati da json_encode nel file todo.json
    file_put_contents("todo.json", json_encode($toDoList));

    ?>
</head>

<body>

    <?php


    ?>


</body>

</html>