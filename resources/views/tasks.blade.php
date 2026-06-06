@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0"><i class="bi bi-plus-circle"></i> إضافة مهمة جديدة</h5>
                </div>
                <div class="card-body p-4">
                    <form action="/tasks/create" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">اسم المهمة:</label>
                            <input type="text" name="name" class="form-control" placeholder="أدخل تفاصيل المهمة" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2"><i class="bi bi-check-circle"></i> حفظ المهمة</button>
                    </form>
                    @if ($errors->any())
    <div class="alert alert-danger mt-2 py-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="card-title mb-0"><i class="bi bi-table"></i> قائمة المهام الحالية</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="px-4">الرقم</th>
                                    <th>اسم المهمة</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td class="px-4 fw-bold text-secondary">#{{ $task->id }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td class="text-center">
                                            <a href="/tasks/edit/{{ $task->id }}" class="btn btn-outline-info btn-sm me-1"><i class="bi bi-pencil"></i> تعديل</a>

                                            <form action="/tasks/delete/{{ $task->id }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
