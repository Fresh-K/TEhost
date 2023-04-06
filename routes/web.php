<?php

use Illuminate\Support\Facades\Route;
use App\Exports\LineinspectorExport;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/export', function () {
    return Excel::download(new LineinspectorExport, 'lineinspectors.xlsx');
});

Route::get('/', function () {
    return view('welcome');
});
///////////inspector
Route::get('/inspector/login', [App\Http\Controllers\LineinspectorController::class, 'login_page']);
Route::post('/inspector/login_inspectore', [App\Http\Controllers\LineinspectorController::class, 'inspector_login'])->name('inspector_login');
Route::post('/inspector/logout', [App\Http\Controllers\LineinspectorController::class, 'logout'])->name('inspector_logout');
Route::get('/inspector/home', [App\Http\Controllers\LineinspectorController::class, 'index']);
Route::get('/inspector/po/add', [App\Http\Controllers\LineinspectorController::class, 'createpo']);
Route::post('/inspector/po/store', [App\Http\Controllers\LineinspectorController::class, 'storepo'])->name('po-add');
Route::get('/inspector/po/{po}/piece/add', [App\Http\Controllers\LineinspectorController::class, 'createpiece']);
Route::post('/inspector/piece/store', [App\Http\Controllers\LineinspectorController::class, 'storepiece'])->name('piece-add');
Route::get('/inspector/{id}/po', [App\Http\Controllers\LineinspectorController::class, 'show'])->name('showpo');
Route::get('/inspector/po/{id}/validation', [App\Http\Controllers\LineinspectorController::class, 'showvalidation']);
Route::get('/search', [App\Http\Controllers\LineinspectorController::class, 'search']);
Route::get('/inspector/audit/add', [App\Http\Controllers\LineinspectorController::class, 'createaudit']);
Route::post('/inspector/audit/store', [App\Http\Controllers\LineinspectorController::class, 'storeaudit'])->name('audit-add');
Route::get('/inspector/audit/show', [App\Http\Controllers\LineinspectorController::class, 'showaudit']);
Route::get('/inspector/audit/{id}', [App\Http\Controllers\LineinspectorController::class, 'showspecificaudit'])->name('showspecaud');
//////////admin
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login_page']);
Route::post('/admin/login_admin', [App\Http\Controllers\AdminController::class, 'admin_login'])->name('admin_login');
Route::post('/admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin_logout');
Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
Route::get('/admin/index', [App\Http\Controllers\AdminController::class, 'home']);
Route::get('/admin/pos', [App\Http\Controllers\AdminController::class, 'showallPo'])->name('showpos');
Route::get('/admin/po/{id}/validation', [App\Http\Controllers\AdminController::class, 'showvalidationpo']);
Route::get('/admin/inspectors', [App\Http\Controllers\AdminController::class, 'showallinspectors']);
Route::get('/admin/inspector/{id}/po', [App\Http\Controllers\AdminController::class, 'showinspo']);
Route::get('/admin/po/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit']);
Route::post('/admin/po/{id}/update', [App\Http\Controllers\AdminController::class, 'update'])->name('update-po');
Route::delete('/admin/po/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroypo'])->name('delete-po');
Route::get('/admin/validation/edit/{id}', [App\Http\Controllers\AdminController::class, 'editpn']);
Route::post('/admin/validation/{id}/update', [App\Http\Controllers\AdminController::class, 'updatepn'])->name('update-pn');
Route::delete('/admin/validation/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('delete-pn');
Route::get('/chart', [App\Http\Controllers\AdminController::class, 'showChart'])->name('chart');
Route::get('/admin/search', [App\Http\Controllers\AdminController::class, 'search']);
Route::get('/admin/search/inspectors', [App\Http\Controllers\AdminController::class, 'search2']);
Route::get('/chart2', [App\Http\Controllers\AdminController::class, 'showInspectorChart'])->name('chart2');
Route::get('/chart5', [App\Http\Controllers\AdminController::class, 'showInspectorVal'])->name('chart5');
Route::get('/admin/inspector/add', [App\Http\Controllers\AdminController::class, 'create']);
Route::post('/admin/inspector/store', [App\Http\Controllers\AdminController::class, 'store'])->name('insp-add');
Route::delete('/admin/inspector/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroyinsp'])->name('delete-insp');
Route::get('/admin/export', [App\Http\Controllers\AdminController::class, 'exporttoexcel']);
