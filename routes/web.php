<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/install-db', function () {
    Schema::dropIfExists('orders');
    Schema::dropIfExists('products');
    Schema::dropIfExists('tasks');
    Schema::dropIfExists('users');

    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->double('price');
        $table->timestamps();
    });

    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->integer('product_id');
        $table->integer('quantity');
        $table->timestamps();
    });

    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });

    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('password');
        $table->timestamps();
    });

    DB::table('products')->insert(['id' => 1, 'name' => 'iPhone 15 Pro', 'price' => 1200]);
    DB::table('orders')->insert(['id' => 1, 'product_id' => 1, 'quantity' => 2]);

    DB::table('tasks')->insert(['name' => 'مهمة تجريبية أولى']);
    DB::table('users')->insert([
        'name' => 'Ghada Mahmoud',
        'email' => 'ghada@example.com',
        'password' => password_hash('123456', PASSWORD_DEFAULT)
    ]);

    return "تم إنشاء جميع الجداول (Tasks, Users, Products, Orders) وحقن البيانات بنجاح في Wamp!";
});


Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks/delete/{id}', [TaskController::class, 'destroy']);
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit']);
Route::post('/tasks/update/{id}', [TaskController::class, 'update']);


Route::get('/users', [UserController::class, 'index']);
Route::post('/users/create', [UserController::class, 'create']);
Route::post('/users/delete/{id}', [UserController::class, 'destroy']);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/update/{id}', [UserController::class, 'update']);


Route::get('/web-orders/{id}', [OrderController::class, 'calculateInvoice']);
