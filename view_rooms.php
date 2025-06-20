
<?php

session_start();
include 'db.php';
$result = $conn->query("SELECT * FROM rooms");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Available Rooms</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    background-image: url('room.jpg');
       background-size: cover; 
             background-repeat: no-repeat; 
             background-position: center;
    margin: 0;
      padding: 20px;
      color: while;
    }
    .rooms-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }
    .room-card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 16px;
      width: 220px;
      text-align: center;
      transition: transform 0.2s;
    }
    .room-card:hover {
      transform: translateY(-4px);
    }
    .room-number {
      font-size: 1.2em;
      margin-bottom: 8px;
      color: #0984e3;
    }
    .room-type {
      margin-bottom: 8px;
      font-weight: bold;
    }
    .room-price {
      margin-bottom: 12px;
      font-size: 1.1em;
    }
    .book-btn {
      display: inline-block;
      text-decoration: none;
      padding: 8px 12px;
      border: 1px solid #0984e3;
      border-radius: 4px;
      color: #0984e3;
      transition: background 0.2s, color 0.2s;
    }
    .book-btn:hover {
      background: #0984e3;
      color: #fff;
    }
  </style>
</head>
<body>
<h1 style="color: white; text-align: center;">Available Rooms</h1>
  <div class="rooms-container">
    <?php while ($room = $result->fetch_assoc()): ?>
      <div class="room-card">
        <div class="room-number">Room #<?= htmlspecialchars($room['room_number']) ?></div>
        <div class="room-type"><?= htmlspecialchars($room['type']) ?></div>
        <div class="room-price">$<?= htmlspecialchars($room['price']) ?></div>
        <a class="book-btn" href="book_room.php?room_id=<?= $room['id'] ?>">Book</a>
      </div>
    <?php endwhile; ?>
  </div>
</body>
</html>
