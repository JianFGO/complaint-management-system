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
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            background: #fff;
            padding: 25px;
            border-radius: 6px;
            margin: auto;
        }

        h1 {
            margin-bottom: 15px;
        }

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

        .actions a {
            text-decoration: none;
            color: #2563eb;
            font-weight: bold;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .empty {
            padding: 15px;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-radius: 6px;
            color: #9a3412;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Staff Dashboard - Complaints</h1>
    <div class="sub">Showing all submitted complaints (newest first).</div>

    @if($complaints->count() === 0)
        <div class="empty">
            No complaints have been submitted yet.
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Submitted By</th>
                    <th>Status</th>
                    <th>Submitted At</th>
                    <th class="actions">Action</th>
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
                        <td class="actions">
                            <!-- Detail page comes next -->
                            <a href="#">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>

</body>
</html>
