<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Visit History</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Visit History</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Name</th>
                <th>Company</th>
                <th>Phone</th>
                <th>Employee</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visits as $visit)
                <tr>
                    <td>{{ format_date($visit->date) }}</td>
                    <td>{{ format_time($visit->time) }}</td>
                    <td>{{ $visit->time_out ?? '-' }}</td>
                    <td>{{ $visit->name }}</td>
                    <td>{{ $visit->company }}</td>
                    <td>{{ $visit->phone }}</td>
                    <td>{{ $visit->employee->name }}</td>
                    <td>{{ $visit->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>