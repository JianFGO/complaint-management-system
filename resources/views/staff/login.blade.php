<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Staff Login</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        /* ✅ MATCHED TOP BAR (same style as your other pages) */
        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 14px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar .title {
            font-weight: 700;
            color: #111827;
        }
        .topbar .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .btn-link {
            display: inline-block;
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            background: #ffffff;
            color: #111827;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
        }
        .btn-link:hover {
            background: #f9fafb;
        }

        .container {
            max-width: 520px;
            margin: 60px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            padding: 28px;
        }

        h1 {
            margin: 0 0 6px 0;
            font-size: 32px;
        }

        .sub {
            margin: 0 0 20px 0;
            color: #6b7280;
            font-size: 14px;
        }

        label {
            display: block;
            margin: 14px 0 6px 0;
            font-weight: 700;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn {
            width: 100%;
            margin-top: 18px;
            padding: 11px 12px;
            background: #111827;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-weight: 700;
            cursor: pointer;
        }
        .btn:hover { opacity: 0.95; }

        .hint {
            margin-top: 12px;
            color: #6b7280;
            font-size: 12px;
        }

        .alert {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 10px 12px;
            border-radius: 6px;
            margin-bottom: 12px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="topbar">
        <div class="title">Complaint Management System</div>
        <div class="actions">
            <a class="btn-link" href="{{ route('complaints.create') }}">Back to Submit Complaint</a>
        </div>
    </div>

    <div class="container">
        <h1>Staff Login</h1>
        <p class="sub">Enter staff credentials to access the dashboard.</p>

        @if (session('error'))
            <div class="alert">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('staff.login.submit') }}">
            @csrf

            <label for="username">Username</label>
            <input id="username" name="username" type="text" value="{{ old('username') }}" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>

            <button class="btn" type="submit">Login</button>
        </form>

        <div class="hint">
            PoC credentials: <strong>staff</strong> / <strong>password123</strong>
        </div>
    </div>

</body>
</html>
