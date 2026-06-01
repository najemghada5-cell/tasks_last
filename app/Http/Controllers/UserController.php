<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // عرض جدول المستخدمين من مجلد users ملف index
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users.index', compact('users'));
    }

    // إضافة مستخدم جديد
    public function create()
    {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($name && $email && $password) {
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        return redirect()->back();
    }

    // حذف مستخدم
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }

    // صفحة تعديل المستخدم
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('users.edit', compact('user'));
    }

    // تحديث بيانات المستخدم
    public function update($id)
    {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;

        if ($name && $email) {
            DB::table('users')->where('id', $id)->update([
                'name' => $name,
                'email' => $email,
                'updated_at' => now()
            ]);
        }
        return redirect('/users');
    }
}
