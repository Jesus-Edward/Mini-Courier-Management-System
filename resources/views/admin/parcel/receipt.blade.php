<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Parcel Receipt</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 4px;
            box-shadow: rgba(0, 0, 0, 0.3)
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Parcel Receipt</h1>
    <table>
        <tr>
            <th>Tracking Number</th>
            <td>{{ $parcel->tracking_number }}</td>
        </tr>
        <tr>
            <th>Sender Name</th>
            <td>{{ $parcel->user->name }}</td>
        </tr>
        <tr>
            <th>Receiver Name</th>
            <td>{{ $parcel->receiver_name }}</td>
        </tr>
        <tr>
            <th>Destination</th>
            <td>{{ $parcel->receiver_location }}</td>
        </tr>
        <tr>
            <th>Size</th>
            <td>{{ $parcel->size }}</td>
        </tr>
        <tr>
            <th>Cost</th>
            <td>NGN{{ $parcel->price }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>NGN{{ $parcel->status }}</td>
        </tr>
    </table>
</body>
</html>
