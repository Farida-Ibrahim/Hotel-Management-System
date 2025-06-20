

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
       exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>

body {
background-image: url('img.jpg');
 background-size: cover;           /* 🔁 Scales the image to cover the whole screen */
    background-repeat: no-repeat;     /* ❌ Prevents tiling */
    background-position: center;
    font-family: Arial, sans-serif;
    /* background: #f5f6fa; */
    margin: 0;
    padding: 20px;
    color: #2f3640;
}

.custom-container {
    background: #ffffff;
    padding: 30px;
    margin: 40px auto;
    max-width: 800px;
    border-radius: 10px;
    box-shadow: 0 0 10px #0003;
    text-align: center;
}

.custom-container h1 {
    color: #0984e3;
    margin-bottom: 20px;
}

.custom-container p {
    font-size: 1.1em;
    margin-bottom: 15px;
}

.custom-container a {
    display: block;
    margin-bottom: 10px;
    text-decoration: none;
    color: #0984e3;
    padding: 10px 20px;
    border: 1px solid #0984e3;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.custom-container a:hover {
    background: #0984e3;
    color: #ffffff;
}
</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>
<body>
  
<nav class="navbar bg-primary" data-bs-theme="dark">
<!-- <nav class="navbar navbar-dark bg-dark fixed-top"> -->
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h1>Hotel Management System<h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-primary" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"></h4>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php"><h1 style=" font-size: 1.5rem;">Home<h1></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view_rooms.php"><h1 style="font-size: 1.5rem;">View_rooms<h1></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_room.php"><h1 style="font-size: 1.5rem;">Add_room<h1></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="logout.php"><h1 style="font-size: 1.5rem;">Logout<h1></a>
          </li>
          
        </ul>

      </div>
    </div>
  </div>
</nav>



    <div class="custom-container">
        <h1>HOTELPORTAL</h1>
        <p>Welcome, <?= $_SESSION['user']['name']; ?> </p>
        <p>Role: <?= $_SESSION['user']['role']; ?> </p>

        <?php if ($_SESSION['user']['role'] == 'Admin'): ?>
            <a href='add_room.php'>Add Room</a>
        <?php endif; ?>
        <a href='view_rooms.php'>View Rooms</a>
        <a href='logout.php'>Logout</a>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>
