<?php
// autorizzare il nostro server ad accettare richieste provenienti anche dal nostro progetto Vue
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

// trasformare dati PHP in dati JSON, leggibili quindi da JS
header('Content-Type: application/json');