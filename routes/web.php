<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

// استدعاء المتحكمات القياسية الثلاثة للمشروع في الأعلى
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController; // ⚠️ الكنترولر الجديد للواجب

/*
|--------------------------------------------------------------------------
| 1. إعدادات النظام وقاعدة البيانات
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

// رابط التثبيت وضخ البيانات يظل هنا للتسهيل عند تشغيله لمرة واحدة
// رابط إنشاء كافة جداول المشروع وضخ البيانات دفعة واحدة
Route::get('/install-db', function () {
    // 1. حذف الجداول القديمة أولاً لمنع التعارض
    Schema::dropIfExists('orders');
    Schema::dropIfExists('products');
    Schema::dropIfExists('tasks');
    Schema::dropIfExists('users');

    // 2. إنشاء جدول المنتجات (Products)
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->double('price');
        $table->timestamps();
    });

    // 3. إنشاء جدول الطلبات (Orders)
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->integer('product_id');
        $table->integer('quantity');
        $table->timestamps();
    });

    // 4. 🛠️ إنشاء جدول المهام (Tasks) الذي تسبب بالخطأ الأول
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });

    // 5. 🛠️ إنشاء جدول المستخدمين (Users)
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('password');
        $table->timestamps();
    });

    // 6. ضخ بيانات تجريبية أولية للواجب
    DB::table('products')->insert(['id' => 1, 'name' => 'iPhone 15 Pro', 'price' => 1200]);
    DB::table('orders')->insert(['id' => 1, 'product_id' => 1, 'quantity' => 2]);

    // ضخ مهمة تجريبية ومستخدم تجريبي للتأكد من عمل النظام
    DB::table('tasks')->insert(['name' => 'مهمة تجريبية أولى']);
    DB::table('users')->insert([
        'name' => 'Ghada Mahmoud',
        'email' => 'ghada@example.com',
        'password' => password_hash('123456', PASSWORD_DEFAULT)
    ]);

    return "تم إنشاء جميع الجداول (Tasks, Users, Products, Orders) وحقن البيانات بنجاح في Wamp!";
});

/*
|--------------------------------------------------------------------------
| 2. مسارات إدارة المهام (Tasks CRUD)
|--------------------------------------------------------------------------
*/
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks/delete/{id}', [TaskController::class, 'destroy']);
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit']);
Route::post('/tasks/update/{id}', [TaskController::class, 'update']);

/*
|--------------------------------------------------------------------------
| 3. مسارات إدارة المستخدمين (Users CRUD)
|--------------------------------------------------------------------------
*/
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/create', [UserController::class, 'create']);
Route::post('/users/delete/{id}', [UserController::class, 'destroy']);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/update/{id}', [UserController::class, 'update']);

/*
|--------------------------------------------------------------------------
| 4. مسار حساب الطلبات والـ JSON للدكتور (Orders)
|--------------------------------------------------------------------------
*/
Route::get('/web-orders/{id}', [OrderController::class, 'calculateInvoice']);
