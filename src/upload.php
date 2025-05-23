<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Please <a href='login.php'>log in</a> first.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    if ($_FILES["image"]["error"] === UPLOAD_ERR_INI_SIZE) {
        switch ($_FILES['image']['error']) {
            case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    echo "Error: File too large (max 2MB).";
                    break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "No file uploaded.";
                        break;
                        case "File was only partially uploaded.";
                        break;
                        default:
                        echo "Upload failed with error code: " . $_FILES['image']['error'];
                    }
                    exit;
                }

                $userId = $_SESSION['user_id'];
                $file = $_FILES['image'];
                $name = basename($file['name']);
                $tmpPath = $file['tmp_name'];
                $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];

                //Validate
                if (!in_array($ext, $allowed)) {
    echo "Error: Only JPG, PNG, GIF allowed.";
    exit;
  }
  if ($file['size'] > 2_000_000) {
    echo "Error: File too large (max 2MB).";
    exit;
  }

  // Paths
  $newName  = uniqid("img{$userId}_") . ".$ext";
  $origPath = "uploads/$newName";
  $thumbPath= "uploads/thumbs/$newName";

  // Move original
  if (move_uploaded_file($tmpPath, $origPath)) {
    // Create thumbnail
    list($w, $h) = getimagesize($origPath);
    $thumbW = 150;
    $thumbH = intval($h * ($thumbW / $w));
    $srcImg = match($ext) {
      'jpg','jpeg' => imagecreatefromjpeg($origPath),
      'png'       => imagecreatefrompng($origPath),
      'gif'       => imagecreatefromgif($origPath),
    };
    $dstImg = imagecreatetruecolor($thumbW, $thumbH);
    imagecopyresampled($dstImg, $srcImg, 0,0, 0,0, $thumbW, $thumbH, $w, $h);
    match($ext) {
      'jpg','jpeg' => imagejpeg($dstImg, $thumbPath),
      'png'       => imagepng($dstImg, $thumbPath),
      'gif'       => imagegif($dstImg, $thumbPath),
    };
    imagedestroy($srcImg);
    imagedestroy($dstImg);

    // Save record to database
    $conn = new mysqli("localhost", "jd99", "102499", "qawebapp");
    $stmt = $conn->prepare(
      "INSERT INTO images (filename, thumbnail, user_id) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("ssi", $newName, $newName, $userId);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Upload & thumbnail created. <a href='gallery.php'>View gallery</a>";
  } else {
    echo "Upload failed.";
  }
}
?>

<h2>Upload Image</h2>
<form method="POST" enctype="multipart/form-data">
  <input type="file" name="image" required><br><br>
  <button type="submit">Upload</button>
</form>