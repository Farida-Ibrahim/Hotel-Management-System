
<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body style="background-image: url('room.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <!-- ✅ Room Form -->
<h1 style="text-align: center; color:white">Add New Room</h1>
<form method="post" style="max-width: 500px; margin: 0 auto; background: rgba(255, 255, 255, 0.9); padding: 50px; border-radius: 10px; box-shadow: 0 0 10px #00000033;">
  <h3>Room :<h3> <input class="add" name="room_number" required style=" width:400px; padding: 10px; border-radius: 5px; "; ><br><br>
  <h3>Type:<h3> <input class="add" name="type" required  style=" width:400px; padding: 10px; border-radius: 5px; ";  ><br><br>
  <h3>Price: <h3><input class="add" name="price" required  style=" width:400px; padding: 10px; border-radius: 5px; " ; ><br><br>
  <button class="add" type="submit"   style=" padding: 10px; border-radius: 5px; " ;>Add Room</button>
</form>

<?php


// ✅ Check if user is logged in and is Admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Admin') {
    die("Access denied");
}

// ✅ Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_number = $_POST['room_number'];
    $type = $_POST['type'];
    $price = $_POST['price'];

    // Simple validation
    if (!empty($room_number) && !empty($type) && !empty($price)) {
        $sql = "INSERT INTO rooms (room_number, type, price) VALUES ('$room_number', '$type', '$price')";
        if ($conn->query($sql)) {
            echo "Room added.";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}
?>
</body>
</html>
<?php


