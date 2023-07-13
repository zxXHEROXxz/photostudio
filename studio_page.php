<!DOCTYPE html>
<html>
<head>
    <title>Studio Page</title>
    <link rel="stylesheet" href="assets/css/studio_page.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Studio Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Studio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Photo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Payment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Order Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Make a Reservation</h5>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="reservation-date">Reservation Date:</label>
                        <input type="text" class="form-control datepicker" id="reservation-date" placeholder="Select Date" required>
                    </div>
                    <div class="form-group">
                        <label for="studio">Studio:</label>
                        <select class="form-control" id="studio" required>
                            <option value="">Select Studio</option>
                            <option value="studio1">Studio 1 (Available)</option>
                            <option value="studio2">Studio 2 (Not Available)</option>
                            <option value="studio3">Studio 3 (Available)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time-slot">Time Slot:</label>
                        <select class="form-control" id="time-slot" required>
                            <option value="">Select Time Slot</option>
                            <option value="slot1">Slot 1 (Available)</option>
                            <option value="slot2">Slot 2 (Not Available)</option>
                            <option value="slot3">Slot 3 (Available)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="package">Package:</label>
                        <select class="form-control" id="package" required>
                            <option value="">Select Package</option>
                            <option value="package1">Package 1 (Available) - LKR.2000</option>
                            <option value="package2" disabled>Package 2 (Not Available) - LKR.2500</option>
                            <option value="package3">Package 3 (Available) - LKR.3000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Advance Payment Price:</label>
                        <input type="number" class="form-control" id="price" placeholder="Enter Advance Payment Price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Make Reservation</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
</body>
</html>
