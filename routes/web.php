<?php

use Illuminate\Support\Facades\Input as input;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/api', function() {
    return view('services');
});

Route::get('/mudasenha', function() {
    return view('auth.change_password');
});

Route::post('change/password', function() {
    $user = User::find(Auth::user()->id);

    if(Hash::check(Input::get('passwordold'), $user['password']) && Input::get('password') == Input::get('password_confirmation')){
        $user->password = bcrypt(Input::get('password'));
        $user->save();
        return back()->with('success', 'Senha mudada com sucesso!');
    }
    else {
        return back()->with('error', 'A senha não pode ser mudada!');
    }
});
