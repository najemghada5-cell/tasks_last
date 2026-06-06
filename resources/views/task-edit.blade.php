@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-info text-white py-3">
                        <h5 class="card-title mb-0"><i class="bi bi-pencil-square"></i> تعديل اسم المهمة</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="/tasks/update/{{ $task->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">الاسم الحالي للمهمة:</label>
                                <input type="text" name="name" class="form-control" value="{{ $task->name }}" required>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-info text-white flex-grow-1 py-2"><i class="bi bi-arrow-clockwise"></i> تحديث التغييرات</button>
                                <a href="/tasks" class="btn btn-secondary py-2">إلغاء</a>
                            </div>
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
        </div>
    </div>
@endsection
