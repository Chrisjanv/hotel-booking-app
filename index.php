<?php
session_start();

require_once 'src/php/config.php';

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
    <h1 id="">Dre's Stays</h1>
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
            echo '<a href="#" class="btn btn-primary">View Hotel</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

</body>

</html>