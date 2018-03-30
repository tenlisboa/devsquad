<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = Auth::id();
        $task_todo = DB::table('tasks')->where('id_user', $idUser)->where('type_task', 'todo')->get();
        $task_doing = DB::table('tasks')->where('id_user', $idUser)->where('type_task', 'doing')->get();
        $task_finished = DB::table('tasks')->where('id_user', $idUser)->where('type_task', 'finished')->get();
        
        $data = json_encode(['task_todo' => $task_todo, 'task_doing' => $task_doing, 'task_finished' => $task_finished, 'id_user' => $idUser]);

        return view('home')->with('data_sets', $data );
    }
}
