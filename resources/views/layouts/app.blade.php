<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم الاحترافية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #212529; color: white; }
        .sidebar a { color: rgba(255,255,255,0.75); text-decoration: none; padding: 12px 20px; display: block; }
        .sidebar a:hover, .sidebar a.active { color: white; background-color: #0d6efd; }
        .navbar { background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        footer { background-color: white; border-top: 1px solid #dee2e6; padding: 15px 0; text-align: center; margin-top: auto; }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 px-0 sidebar d-flex flex-column">
                <div class="p-3 text-center border-bottom border-secondary">
                    <h5 class="m-0 text-info"><i class="bi bi-laptop"></i> أنظمة حاسوب</h5>
                </div>
                <div class="py-3 flex-grow-1">
                    <a href="/tasks" class="nav-link"><i class="bi bi-list-task"></i> إدارة المهام (Tasks)</a>
                    <a href="/users" class="nav-link"><i class="bi bi-people"></i> إدارة المستخدمين (Users)</a>
                </div>
            </div>

            <div class="col-md-9 col-lg-10 d-flex flex-column px-0">
                <nav class="navbar navbar-expand-lg px-4 py-3">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1 text-primary">لوحة إدارة النظام الديناميكية</span>
                        <span class="text-secondary fw-bold">المهندسة غادة </span>
                    </div>
                </nav>

                <div class="p-4 flex-grow-1">
                    @yield('content')
                </div>

                <footer>
                    <p class="mb-0 text-muted">جميع الحقوق محفوظة © 2026 | تطوير طالبات هندسة أنظمة الحاسوب</p>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
