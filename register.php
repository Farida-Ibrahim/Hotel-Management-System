<?php
include 'db.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Hotel Management Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<!-- <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark"> -->
  <!-- Navbar content -->
<!-- </nav> -->
<!-- <nav class="navbar bg-primary" data-bs-theme="dark"> -->
  <!-- Navbar content -->
   <!-- <div class="container"> -->
  <!-- <nav class="navbar navbar-expand-lg bs-primary-bg-subtle">
    <div class="container-fluid">
      <h1 s>Hotel Management System - Registration</h1>
    </div>
  </nav>
</div>
</nav> -->

<nav class="navbar bg-primary" data-bs-theme="dark">
  <div class="container justify-content-center">
    <h1 class="text-center mb-0">Hotel Management System - Registration</h1>
  </div>
</nav>


   
    <form action="" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="role">Role:</label><br>
        <select id="role" name="role" required>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select><br><br>
     <input type="submit"  value="Register"   style="background-color: #0984e3;color: black;">

    </form>
    <br>
        <p>Already have an account? <a href= "login.php">Login here</a></p>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //   check for existing email

         $res = $conn->query("SELECT id FROM users WHERE email='$email'");
    if ($res->num_rows > 0) {
        // duplicate → alert and go back
        echo "<script>
                alert('Email already registered. Please use a different one.');
                window.history.back();
              </script>";
        exit;
    }

        // $role = 'role';
    $role = $_POST['role']; // ✅ Correct

        $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        $conn->query($sql);
        echo "Registration successful";
}
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
