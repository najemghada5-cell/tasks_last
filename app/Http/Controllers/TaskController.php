<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    // عرض جميع المهام
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('tasks'));
    }

    // إضافة مهمة جديدة
    public function create()
    {
        $taskName = $_POST['name'] ?? null;
        if ($taskName) {
            DB::table('tasks')->insert(['name' => $taskName]);
        }
        return redirect()->back();
    }

    // حذف مهمة
    public function destroy($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect()->back();
    }

    // عرض صفحة التعديل (إذا لم يتوفر لها view مستقل حالياً يمكنك استخدام هذا الكود)
    public function edit($id)
{
    $task = DB::table('tasks')->where('id', $id)->first();

    // 🛠️ قمنا بتغيير الرابط هنا ليشير إلى الملف الجديد لتجنب خطأ المصفوفة المفقودة
    return view('task-edit', compact('task'));
}

    // تحديث بيانات المهمة
    public function update($id)
    {
        $updatedName = $_POST['name'] ?? null;
        if ($updatedName) {
            DB::table('tasks')->where('id', $id)->update(['name' => $updatedName]);
        }
        return redirect('/tasks');
    }
}
