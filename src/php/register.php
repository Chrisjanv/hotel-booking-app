<?php
require_once 'config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $email = $_POST['email'];

    try {
        $query = "INSERT INTO users (username, fullname, address, password, email) 
                  VALUES (:username, :fullname, :address, :password, :email)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Set a session variable to indicate successful registration
        $_SESSION['registrationSuccess'] = true;

        // Redirect to index.php
        header('Location: ../../index.php');
        exit();
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Include any necessary CSS here -->
</head>

<body>
    <h1>Register</h1>

    <?php echo $message; ?>

    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <button type="submit">Register</button>
    </form>
</body>

</html>