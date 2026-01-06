<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff - Complaint #{{ $complaint->id }}</title>
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
            cursor: pointer;
        }

        .btn-link:hover {
            background: #f3f4f6;
        }

        .logout-form { margin: 0; }

        .page {
            padding: 40px;
        }

        .container {
            max-width: 900px;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            margin: auto;
        }

        h1 { margin: 0 0 16px 0; }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .field {
            margin-bottom: 14px;
        }

        .label {
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
        }

        .input, .select, .textarea {
            width: 100%;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 10px 12px;
            background: #f9fafb;
            outline: none;
        }

        .textarea {
            min-height: 70px;
            resize: vertical;
        }

        .row-actions {
            margin-top: 18px;
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .btn-primary {
            padding: 10px 14px;
            border-radius: 6px;
            border: 1px solid #2563eb;
            background: #2563eb;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary:hover {
            filter: brightness(0.95);
        }

        .success {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            padding: 12px 14px;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        .error {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 12px 14px;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        @media (max-width: 820px) {
            .grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="topbar">
    <div class="brand">Complaint Management System (Staff)</div>

    <div class="topbar-right">
        <a class="btn-link" href="{{ route('staff.complaints.index') }}">Back to Complaints</a>

        <form class="logout-form" method="POST" action="{{ route('staff.logout') }}">
            @csrf
            <button class="btn-link" type="submit">Logout</button>
        </form>
    </div>
</div>

<div class="page">
    <div class="container">
        <h1>Complaint #{{ $complaint->id }}</h1>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="error">
                <strong>Fix this:</strong>
                <ul style="margin: 8px 0 0 18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid">
            <div class="field">
                <span class="label">Name</span>
                <input class="input" type="text" value="{{ $complaint->name }}" readonly>
            </div>

            <div class="field">
                <span class="label">Email</span>
                <input class="input" type="text" value="{{ $complaint->email }}" readonly>
            </div>
        </div>

        <div class="field">
            <span class="label">Subject</span>
            <input class="input" type="text" value="{{ $complaint->subject }}" readonly>
        </div>

        <div class="field">
            <span class="label">Description</span>
            <textarea class="textarea" readonly>{{ $complaint->description }}</textarea>
        </div>

        <div class="grid">
            <div class="field">
                <span class="label">Submitted At</span>
                <input class="input" type="text" value="{{ $complaint->created_at }}" readonly>
            </div>

            <div class="field">
                <span class="label">Status</span>

                <form method="POST" action="{{ route('staff.complaints.updateStatus', $complaint->id) }}">
                    @csrf
                    @method('PATCH')

                    <select class="select" name="status">
                        @foreach(['New', 'In Progress', 'Resolved', 'Closed'] as $status)
                            <option value="{{ $status }}" @selected($complaint->status === $status)>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>

                    <div class="row-actions">
                        <button class="btn-primary" type="submit">Save Status</button>
                        <a class="btn-link" href="{{ route('staff.complaints.index') }}">← Back to list</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

</body>
</html>
