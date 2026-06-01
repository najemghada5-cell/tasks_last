@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0"><i class="bi bi-person-plus"></i> إضافة مستخدم جديد</h5>
                </div>
                <div class="card-body p-4">
                    <form action="/users/create" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">اسم المستخدم:</label>
                            <input type="text" name="name" class="form-control" placeholder="أدخل الاسم الكامل" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">البريد الإلكتروني:</label>
                            <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">كلمة المرور:</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 py-2"><i class="bi bi-check-circle"></i> حفظ المستخدم</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0"><i class="bi bi-table"></i> قائمة المستخدمين المسجلين</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="px-4">الرقم المعرف</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-4 fw-bold text-secondary">#{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><span class="badge bg-light text-dark border">{{ $user->email }}</span></td>
                                        <td class="text-center">
                                            <a href="/users/edit/{{ $user->id }}" class="btn btn-outline-info btn-sm me-1"><i class="bi bi-pencil"></i> تعديل</a>

                                            <form action="/users/delete/{{ $user->id }}" method="POST" style="display:inline;">
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
