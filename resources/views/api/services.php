<?php

    error_reporting(0);

    $service = $_POST["service"];
    $idUser = $_POST["id_user"];
    $idTask = $_POST["id_task"];
    $task_name = $_POST["task_name"];
    $type_task = $_POST["type_task"];


    switch($service) {
        case 'add_todo':
            DB::table('tasks')->insert(['id_user' => $idUser, 'name_task' => $task_name, 'type_task' => $type_task]);
            break;
        case 'delete_task':
            DB::table('tasks')->where('id', '=', $idTask)->delete();
            break;
        default:
            break;
            
    }