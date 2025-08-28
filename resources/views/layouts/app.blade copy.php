<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Plagiarism Checker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
  <style>
    body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; background:#f6f7fb;}
    .container{max-width:1000px;margin:30px auto;padding:0 16px;}
    .card{background:#fff;border-radius:14px;box-shadow:0 6px 20px rgba(0,0,0,.06);padding:18px;}
    .btn{display:inline-block;background:#111;color:#fff;padding:10px 14px;border-radius:10px;text-decoration:none}
    .btn.secondary{background:#5865f2}
    .btn.warning{background:#eab308}
    .muted{color:#6b7280}
    table{width:100%;border-collapse:collapse}
    th,td{padding:10px;border-bottom:1px solid #eee;text-align:left}
  </style>
</head>
<body>
  <div class="container">
    <h2>📚 Plagiarism Checker</h2>
    @if(session('ok')) <div class="card" style="border-left:6px solid #22c55e">{{ session('ok') }}</div> @endif
    @if(session('err'))<div class="card" style="border-left:6px solid #ef4444">{{ session('err') }}</div> @endif
    @yield('content')
  </div>
</body>
</html>
