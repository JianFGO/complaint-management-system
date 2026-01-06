<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff - Complaints</title>
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
            max-width: 1100px;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            margin: auto;
        }

        h1 { margin: 0 0 10px 0; }

        .sub {
            color: #555;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }

        th {
            background: #f9fafb;
            font-weight: bold;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            border: 1px solid #ddd;
            background: #f3f4f6;
        }

        .empty {
            padding: 15px;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-radius: 6px;
            color: #9a3412;
        }

        .action a {
            text-decoration: none;
            color: #2563eb;
            font-weight: bold;
        }
        .action a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="topbar">
    <div class="brand">Complaint Management System (Staff)</div>

    <div class="topbar-right">
        <a class="btn-link" href="{{ route('complaints.create') }}">Public Form</a>

        <form class="logout-form" method="POST" action="{{ route('staff.logout') }}">
            @csrf
            <button class="btn-link" type="submit">Logout</button>
        </form>
    </div>
</div>

<div class="page">
    <div class="container">
        <h1>Complaints List</h1>
        <div class="sub">All submitted complaints (newest first).</div>

        @if($complaints->count() === 0)
            <div class="empty">No complaints have been submitted yet.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Submitted By</th>
                        <th>Status</th>
                        <th>Submitted At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->id }}</td>
                            <td>{{ $complaint->subject }}</td>
                            <td>
                                {{ $complaint->name }}<br>
                                <small>{{ $complaint->email }}</small>
                            </td>
                            <td><span class="badge">{{ $complaint->status }}</span></td>
                            <td>{{ $complaint->created_at }}</td>
                            <td class="action">
                                <a href="{{ route('staff.complaints.show', $complaint->id) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>

</body>
</html>
