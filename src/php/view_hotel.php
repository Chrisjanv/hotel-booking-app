<?php
// Include the database configuration
require_once 'config.php';

// Get the hotel ID from the query parameter
if (isset($_GET['hotel_id'])) {
    $hotelId = $_GET['hotel_id'];
} else {
    // Handle error, such as redirecting to an error page
    die("Hotel ID not provided.");
}

// Retrieve hotel details based on the hotel ID
try {
    $query = "SELECT * FROM hotels WHERE id = :hotelId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':hotelId', $hotelId, PDO::PARAM_INT);
    $stmt->execute();
    $hotel = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error retrieving hotel details: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dre's Hotels</title>

    <link rel="stylesheet" href="src/style/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-4">
        <h1>Hotel Details</h1>
        <?php
        // Display hotel details
        echo '<h2>' . $hotel["name"] . '</h2>';
        echo '<img src="' . $hotel["image_url"] . '" alt="' . $hotel["name"] . '">';
        echo '<p>' . $hotel["description"] . '</p>';
        echo '<a href="../../index.php" class="btn btn-primary">Home</a>';
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>