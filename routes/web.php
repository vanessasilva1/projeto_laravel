<?php

use App\Http\Controllers\JogosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/home', function () {
//    return view('welcome');
//});

//Route::view('/jogos','jogos');

//Route::get('/jogos', function() {
//    return "Curso de Laravel";
//});

//Route::view('/jogos', 'jogos', ['name' => 'Vanessa']); // Enviando parâmetro estático

//Route::get('/jogos/{name?}', function($name = null) {
//    return view('jogos', ['nomeJogo'=>$name]);
//})->where('name', '[A-Za-z]+'); // apenas recebe parâmetros do tipo texto

//Route::get('/jogos/{id?}', function($id = null) {
//   return view('jogos', ['idJogo'=>$id]);
//})->where('id', '[0-9]+'); // apenas recebe parâmetros do tipo número

//Route::get('/jogos/{id?}/{name?}', function($id = null, $name = null) {
//    return view('jogos', ['idJogo'=>$id, 'nomeJogo'=>$name]);
//})->where(['id' => '[0-9]+', 'name' => '[a-z]+']); // recebe tanto números, quanto textos. Primeiro tem que ser um número, depois um nome. Nomes com letras minúsculas
 

//--------------------------------------------------------------------------

//Quando clicar em um botão, é para redirecionar para outra rota

//Route::get('/jogos', function() {
//   return view('jogos');
//});

//Route::get('/casa', function () {
//    return view('welcome');
//})->name('home-index');

//--------------------------------------------------------------------------

//Qualquer erro que der nas rotas, vai cair nessa rota

//Route::fallback(function() {
//    return "Erro!";
//});

//--------------------------------------------------------------------------

//Route::get('/jogos', [JogosController::class, 'index']);

//Route::get('/casa', function () {
//    return view('welcome');
//})->name('home-index');
 
Route::prefix('jogos')->group(function(){ //todas as rotas criadas dentro desse grupo de rotas, teram um mesmo prefixo (rotas)
    Route::get('/', [JogosController::class, 'index'])->name('jogos-index'); //Listagem de registros
    Route::get('/create', [JogosController::class, 'create'])->name('jogos-create'); //Criar registros
    Route::post('/', [JogosController::class, 'store'])->name('jogos-store'); //Postar/salvar registros. Não causa conflito com o get '/', pois cada um tem um verbo diferente.
    Route::get('/{id}/edit', [JogosController::class, 'edit'])->where('id', '[0-9]+')->name('jogos-edit'); //Editar registros
    Route::put('/{id}', [JogosController::class, 'update'])->where('id', '[0-9]+')->name('jogos-update'); //Salvar EDIÇÕES registros
    Route::delete('/{id}', [JogosController::class, 'destroy'])->where('id', '[0-9]+')->name('jogos-destroy'); //Deletando registros
});

Route::fallback(function() {
    return "Erro!";
}