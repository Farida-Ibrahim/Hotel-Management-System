
<!-- session_start();
include 'db.php';
$room_id = $_GET['room_id'];
$user_id = $_SESSION['user']['id'];

$conn->query("INSERT INTO bookings (user_id, room_id, booking_date, status) VALUES ($user_id, $room_id, CURDATE(), 'Pending')");
echo "Room booked successfully!"; -->

<?php
session_start();
include 'db.php';

if (isset($_GET['room_id'])) {
    $room_id = (int)$_GET['room_id']; // Cast to int for safety
    $user_id = $_SESSION['user']['id'];

    $conn->query("INSERT INTO bookings (user_id, room_id, booking_date, status) VALUES ($user_id, $room_id, CURDATE(), 'Pending')");
    echo "<script>
                alert('Room booked successfully!');
                window.location.href = 'dashboard.php'; // redirect back to dashboard or any page
              </script>";
   
    echo "Room booked successfully!";
} else {
    echo "Error: No room specified.";
}
?>


<!-- session_start();
include 'db.php';

if (isset($_GET['room_id']) && isset($_SESSION['user']['id'])) {
    $room_id = (int)$_GET['room_id'];
    $user_id = $_SESSION['user']['id'];

    $stmt = $conn->prepare("INSERT INTO bookings (user_id, room_id, booking_date, status) VALUES (?, ?, CURDATE(), 'Pending')");
    $stmt->bind_param("ii", $user_id, $room_id);

    if ($stmt->execute()) {
        echo "Room booked successfully!";
    } else {
        echo "Booking failed: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: No room specified or user not logged in.";
} -->
