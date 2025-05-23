<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$conn = new mysqli("localhost", "jd99", "102499", "qawebapp");

if($conn->connect_error){
    die("Connection failed: " . $conn_>connect_error);
}

$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);

try {
    $stmt->execute();
    echo "Registration successful. <a href='login.php'?Login here </a>";
} catch (mysqli_sql_exception $e) {
    if (str_contains($e->getMEssage(), 'Duplicate entry')) {
        echo "Error: Email already registered.";
    } else {
        echo "Error: " . $e->getMessage();
    }
}

$stmt->close();
$conn->close();
}
?>

<h2>Register</h2>
<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>