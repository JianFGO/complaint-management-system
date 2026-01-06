<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit a Complaint</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 14px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-weight: bold;
            color: #111827;
        }

        .topbar-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-link {
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            color: #111827;
            background: #fff;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-link:hover {
            background: #f3f4f6;
        }

        .page {
            padding: 40px;
        }

        .container {
            max-width: 600px;
            background: #ffffff;
            padding: 25px;
            border-radius: 6px;
            margin: auto;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
            font-size: 14px;
        }

        textarea { resize: vertical; }

        button {
            margin-top: 20px;
            padding: 12px;
            width: 100%;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover { background: #1e4fd6; }

        .success {
            background: #dcfce7;
            padding: 10px;
            margin-bottom: 15px;
            color: #166534;
            border-radius: 4px;
        }

        .error {
            background: #fee2e2;
            padding: 10px;
            margin-bottom: 15px;
            color: #b91c1c;
            border-radius: 4px;
            font-size: 14px;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>

<div class="topbar">
    <div class="brand">Complaint Management System</div>

    <div class="topbar-right">
        <a class="btn-link" href="{{ route('staff.login') }}">Staff Login</a>
    </div>
</div>

<div class="page">
    <div class="container">
        <h1>Submit a Complaint</h1>

        {{-- Success message --}}
        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('complaints.store') }}">
            @csrf

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">

            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}">

            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>

            <button type="submit">Submit Complaint</button>
        </form>
    </div>
</div>

</body>
</html>
