<?php

    var_dump($_POST);

    $service = $_POST["service"];
    $idUser = $_POST["id_user"];
    $task_name = $_POST["task_name"];
    $type_task = $_POST["type_task"];


    switch($service) {
        case 'add_task':
            DB::table('tasks')->insert(['id_user' => $idUser, 'name_task' => $task_name, 'type_task' => $type_task]);
            break;
        case 'delete_task':
            DB::table('tasks')->where('name_task', '=', $task_name)->delete();
            break;
        default:
            break;
            
    }