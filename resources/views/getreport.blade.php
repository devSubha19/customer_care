<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/facebox.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .panel-primary {
            border-color: #337ab7;
        }
        .panel-heading {
            background-color: #337ab7;
            color: #fff;
        }
        .panel-body {
            padding: 15px;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
        .btn-info {
            background-color: #5bc0de;
            border-color: #46b8da;
        }
        .btn-info:hover,
        .btn-info:focus,
        .btn-info:active,
        .btn-info.active,
        .open .dropdown-toggle.btn-info {
            background-color: #46b8da;
            border-color: #5bc0de;
        }
        .fa-download {
            margin-right: 5px;
        }
        .fa-hand-pointer {
            color: #5bc0de;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6 text-left">Download Report</div>
                    <div class="col-xs-6 text-right">
                        <a href="download" class="btn btn-info">Download <i class="fas fa-download"></i></a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Emp name</th>
                            <th>Calling Number</th>
                            <th>Registered Number</th>
                            <th>Call Type</th>
                            <th>Issue</th>
                            <th>Remark</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="src/facebox.js"></script>
</body>
</html>
