<!DOCTYPE html>
<html>

<head>
    <title>Studio Page</title>
    <link rel="stylesheet" href="assets/css/packages_page.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">Packages Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <li class="nav-item active">
                    <a class="nav-link">Packages</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center">Select a Package</h2>
                <div class="dropdown-package">
                    <form action="#" method="POST">
                        <select class="form-control" name="package" id="packageSelect">
                            <option value="">Select Package</option>
                            <option value="package1">Package 1: Classic Portrait - $50</option>
                            <option value="package2">Package 2: Family Fun - $100</option>
                            <option value="package3">Package 3: Creative Concept - $250</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="reservation-button">
                    <a href="login_reg_page.php">
                        <button class="btn btn" id="reservationBtn" disabled style="color: #fff;">Make a
                            Reservation</button>
                    </a>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="demo-photo-card">
                    <main id="carousel">
                        <div class="item">
                            <img src="assets/images/studio_dummy.jpg" alt="Image 1" width="300" height="400">
                        </div>
                        <div class="item">
                            <img src="assets/images/studio_dummy2.jpg" alt="Image 2" width="300" height="400">
                        </div>
                        <div class="item">
                            <img src="assets/images/studio_dummy3.jpg" alt="Image 3" width="300" height="400">
                        </div>
                        <div class="item">
                            <img src="assets/images/studio_dummy4.jpg" alt="Image 4" width="300" height="400">
                        </div>
                        <div class="item">
                            <img src="assets/images/studio_dummy5.jpg" alt="Image 5" width="300" height="400">
                        </div>
                    </main>
                    <div class="card-body">
                        <h5 class="card-title">Demo Photo</h5>
                        <p class="card-text">This is a demo photo to showcase the quality of our photography.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card package-details-card">
                    <div class="card-body">
                        <h5 class="card-title">Package Details</h5>
                        <div class="form-group">
                            <label for="number-of-persons"><i class="fas fa-users"></i> Number of Persons:</label>
                            <select class="form-control" id="number-of-persons" disabled>
                                <option value="10">10 persons</option>
                                <option value="15">15 persons</option>
                                <option value="20">20 persons</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="location"><i class="fas fa-map-marker-alt"></i> Location:</label>
                            <select class="form-control" id="location" disabled>
                                <option value="indoor">Indoor</option>
                                <option value="outdoor">Outdoor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number-of-photos"><i class="fas fa-camera"></i> Number of Photos:</label>
                            <select class="form-control" id="number-of-photos" disabled>
                                <option value="10">10 photos</option>
                                <option value="25">25 photos</option>
                                <option value="50">50 photos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price"><i class="fas fa-dollar-sign"></i> Price:</label>
                            <p id="packagePrice">$50</p>
                        </div>
                        <div class="form-group">
                            <label for="additional-price"><i class="fas fa-dollar-sign"></i> Additional Price:</label>
                            <p id="additionalPrice">$0</p>
                        </div>
                        <div class="form-group">
                            <label for="total-price"><i class="fas fa-dollar-sign"></i> Grand Total:</label>
                            <p id="totalPrice">$50</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#packageSelect').change(function () {
                var selectedPackage = $('#packageSelect').val();
                var packagePrice = 0;
                var numberOfPersons = parseInt($('#number-of-persons').val());
                var numberOfPhotos = parseInt($('#number-of-photos').val());

                if (selectedPackage === 'package1') {
                    packagePrice = 50;
                } else if (selectedPackage === 'package2') {
                    packagePrice = 100;
                } else if (selectedPackage === 'package3') {
                    packagePrice = 250;
                }

                $('#packagePrice').text('$' + packagePrice);
                $('#additionalPrice').text('$' + additionalPrice);
                $('#totalPrice').text('$' + totalPrice);

                if (selectedPackage !== '') {
                    $('#number-of-persons').prop('disabled', false);
                    $('#location').prop('disabled', false);
                    $('#number-of-photos').prop('disabled', false);
                    $('#reservationBtn').removeAttr('disabled');
                } else {
                    $('#number-of-persons').prop('disabled', true);
                    $('#location').prop('disabled', true);
                    $('#number-of-photos').prop('disabled', true);
                    $('#reservationBtn').attr('disabled', 'disabled');
                }
            });

            $('#number-of-persons, #number-of-photos').change(function () {
                var numberOfPersons = parseInt($('#number-of-persons').val());
                var numberOfPhotos = parseInt($('#number-of-photos').val());
                var packagePrice = parseInt($('#packagePrice').text().replace('$', ''));

                // var additionalPrice = (numberOfPersons * 10) + (numberOfPhotos * 5);
                // var totalPrice = packagePrice + additionalPrice;

                $('#additionalPrice').text('$' + additionalPrice);
                $('#totalPrice').text('$' + totalPrice);
            });
        });

        // Carousel code
        var carouselItems = Array.from(document.querySelectorAll("#carousel .item"));
        var position = 1;

        function updateCarousel() {
            carouselItems.forEach(item => item.style.setProperty("--position", position));
        }

        function moveToNextImage() {
            position = (position % 5) + 1;
            updateCarousel();
        }

        function moveToPreviousImage() {
            position = (position - 2 + 5) % 5 + 1;
            updateCarousel();
        }

        setInterval(moveToNextImage, 3000);

        updateCarousel();
    </script>
</body>

</html>