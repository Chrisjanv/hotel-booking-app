<?php
session_start();

require_once 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Retrieve user details based on the user ID
try {
    $userId = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id = :userId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error retrieving user details: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="src/style/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <header class="text-center m-5">
    <h1>User Profile</h1>
    </header>

    <main class="text-center">
    <p><strong>Username:</strong>
        <?php echo $user["username"]; ?>
    </p>
    <p><strong>Full Name:</strong>
        <?php echo $user["fullname"]; ?>
    </p>
    <p><strong>Address:</strong>
        <?php echo $user["address"]; ?>
    </p>
    <p><strong>Email:</strong>
        <?php echo $user["email"]; ?>
    </p>

    <a href="../../index.php" class="btn btn-primary">Home</a>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>