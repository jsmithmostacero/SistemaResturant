<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Estadistica2Controller;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EstadisticaController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\ReportManagerController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\UserSettingsController;


// use App\Http\Controllers\UserController;


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
     return view('auth.login');
 });

//   Route::get('/', function () {
//       return view('welcome');
// });


//  Route::get('/welcome',[App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');


Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Route::get('/inicio', [App\Http\Controllers\WelcomeController::class, 'index'])->name('inicio');

Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names('users');
Route::resource('roles', RoleController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])->names('roles');
Route::resource('/categorias', CategoriaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])->names('categorias');
Route::resource('/menus', MenuController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])->names('menus');
Route::resource('/mesas', MesaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])->names('mesas');
Route::resource('/reservaciones', ReservacionController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])->names('reservaciones');
Route::resource('/proveedores', ProveedorController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names('proveedores');
Route::resource('/productos', ProductoController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names('productos');
Route::resource('/pedido', PedidoController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names('pedido');


Route::resource('/consultas', ConsultaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names('consultas');
Route::resource('/ingredientes', IngredienteController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names('ingredientes');
// Route::get('pedido/pdf/{pedido}',[PedidoController::class,'createPDF'] )->name('pedido.pdf')->middleware('auth');

Route::resource('/ventas', VentaController::class)->only(['index'])->names('ventas');
Route::get('ventas/pdf/{pedido}',[VentaController::class,'createPDF'] )->name('ventas.pdf')->middleware('auth');
Route::resource('/compras', CompraController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])->names('compras');

Route::get('pedido/pdf/{pedido}',[PedidoController::class,'createPDF1'] )->name('pedido.pdf')->middleware('auth');

//
 Route::get('/estadisticas',[EstadisticaController::class,'index'])->name('estadisticas')->middleware('auth');
 Route::get('/estadisticas2',[Estadistica2Controller::class,'index'])->name('estadisticas2')->middleware('auth');
 Route::get('/reportManager',[ReportManagerController::class,'index'])->name('reportManager')->middleware('auth');
 Route::get('/reporte/descargar', [ReportManagerController::class, 'descargarReporte'])->name('reporte.descargar');
 Route::get('/excel/descargar', [ReportManagerController::class, 'descargarExcel'])->name('excel.descargar');


Route::get('/NewPassword',  [UserSettingsController::class,'NewPassword'])->name('NewPassword')->middleware('auth');
Route::post('/change/password',  [UserSettingsController::class,'changePassword'])->name('changePassword');

// Route::get('compras/pdf/{pedido}',[CompraController::class,'createPDF'] )->name('compras.pdf')->middleware('auth');
Route::post('/cart-add',    'App\Http\Controllers\CartController@add')->name('cart.add');

Route::get('/cart-checkout','App\Http\Controllers\CartController@cart')->name('cart.checkout');

Route::post('/cart-clear',  'CartController@clear')->name('cart.clear');

Route::post('/cart-removeitem',  'CartController@removeitem')->name('cart.removeitem');
