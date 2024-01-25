<!DOCTYPE html>
<html>

<head>
    <title>Reporte Productos - Laravel Framework</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <div class="card-body">
        <!-- Your table code here -->

        <!-- Button for Downloading PDF -->
        <a href="{{ url('download-pdf') }}" class="btn btn-primary" target="_blank">Download PDF</a>

        <!-- Button for Printing PDF -->
        <button onclick="window.print()" class="btn btn-success">Print PDF</button>

        <!-- Link for Preview PDF -->
        <a href="{{ url('preview-pdf') }}" class="btn btn-info" target="_blank">Preview PDF</a>
    </div>
</body>

</html>
