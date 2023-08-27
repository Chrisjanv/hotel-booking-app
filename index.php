<?php
session_start();

require_once 'src/php/config.php';

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

// Check for successful registration and clear the session variable
if (isset($_SESSION['registration_success'])) {
    $registrationSuccess = true;
    unset($_SESSION['registration_success']);
} else {
    $registrationSuccess = false;
}

// Retrieve data from the "hotels" table
try {
    $query = "SELECT * FROM hotels";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error retrieving hotels: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dre's Stays</title>

    <link rel="stylesheet" href="src/style/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <header>
        <h1>Dre's Stays</h1>
        <?php
        // Display different buttons based on login status and registration success
        if ($registrationSuccess) {
            echo '<a href="src/php/bookings.php" class="btn btn-primary">Bookings</a>';
            echo '<a href="src/php/profile.php" class="btn btn-primary">Profile</a>';
        } else {
            echo '<a href="src/php/register.php" class="btn btn-primary">Register</a>';
        }
        ?>
    </header>

    <div class="container mt-4">
        <div class="row mt-4">
            <?php
            // Display hotel data
            foreach ($hotels as $hotel) {
                echo '<div class="col-md-4 mb-3">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $hotel["name"] . '</h5>';
                echo '<p class="card-text">' . $hotel["features"] . '</p>';
                echo '<a href="src/php/view_hotel.php?hotel_id=' . $hotel["id"] . '" class="btn btn-primary">View Hotel</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>

</body>

</html>