<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  die("Please <a href='login.php'>log in</a> first.");
}
$conn = new mysqli("localhost", "jd99", "102499", "qawebapp");
if ($conn->connect_error) {
  die("Connection failed: " . $conn_connect_error);
}

$userId = $_SESSION['user_id'];
$stmt = $conn->prepare(
  "SELECT filename, thumbnail FROM images WHERE user_id = ? ORDER BY id DESC"
);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->store_result(); //Store result to count rows

echo "<h2>Your Gallery</h2>";
echo "<a href='upload.php'>Upload more</a><br><br>";

if ($stmt->num_rows === 0) {
  echo "<p> To view a thumbnail, first upload a valid image file. </p>";
} else {
  $stmt->bind_result($file, $thumb);
  while ($stmt->fetch()) {
    echo "<a href = 'uploads/{$file}' target = '_blank'><img src='uploads/thumbs/{$thumb}' style='margin:5px;border:1px solid #ccc;'>
        </a>";
  }
}

$stmt->close();
$conn->close();
?>

