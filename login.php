
<?php
session_start();
include 'db.php';

//  If user is already logged in, redirect to dashboard
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}

// Show logout success message
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
 echo "<script>
                alert('Room booked successfully!');
              </script>";

    // echo "<p style='color: green; text-align: center;'>You have been logged out successfully.</p>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hotel Management Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

</head>
<body>
    <nav class="navbar bg-primary" data-bs-theme="dark">
  <div class="container justify-content-center">
    <h1 class="text-center mb-0">Hotel Management System - Login</h1>
  </div>
</nav>

    <form  action="" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login" style="background-color: #0984e3;color: black;">
    </form>
    <br>
 <br>
    <p>Don't have an account? <a href="register.php">Register here</a></p>

<?php




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    //   check for existing email
   
    $user = $res->fetch_assoc();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials ";
    }
}


?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>