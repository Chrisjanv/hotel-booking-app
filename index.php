<?php
// Start or resume a session
session_start();

// Include the necessary classes and configurations
require_once 'config.php'; // Database configuration
require_once 'models/Customer.php';
require_once 'models/Hotel.php';

// Check if the user is logged in
$loggedIn = isset($_SESSION['customer_id']);

// Retrieve a list of hotels
$hotels = Hotel::getAllHotels(); // You'll need to implement this method in your Hotel class

?>

<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">
        <h1>Hotel Booking</h1>

        <?php if (!$loggedIn): ?>
            <a href="login.php" class="btn btn-primary">Login</a>
        <?php else: ?>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        <?php endif; ?>

        <div class="row mt-4">
            <?php foreach ($hotels as $hotel): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="<?php echo $hotel->getImageUrl(); ?>" class="card-img-top" alt="Hotel Image">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $hotel->getName(); ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $hotel->getDescription(); ?>
                            </p>
                            <a href="view_hotel.php?id=<?php echo $hotel->getId(); ?>" class="btn btn-primary">View
                                Hotel</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>